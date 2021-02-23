<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->status === 'Published') {
            $articles = Article::query()->where('status', 'Published')->get();
        } elseif ($request->status === 'Draft') {
            $articles = Article::query()->where('status', 'Draft')->get();
        } else {
            $articles = Article::all();
        }
        return view('Admin.Articles.index', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        return view('Admin.Articles.singleArticle', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();
        $articles = Article::all();
        return view('Admin.Articles.create', compact('articles', 'categories'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('Admin.Articles.edit', compact('article', 'categories'));
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->brief = $request->brief;
        $article->body = $request->body;
        $article->status = $request->status;
        $article->user_id = auth()->user()->id;
        $article->tag = $request->tag;
        $article->category_id = $request->category_id;
        $article->published_at = $request->published_at;

        $image = $request->file('image');
        $title = $request->title;
        $extension = $image->getClientOriginalExtension();
        $fileName = $title . '.' . $extension;
        $image->move("images/", $fileName);

        $article->image = $fileName;
        $article->save();

        $img = Image::make(public_path('/images/' . $fileName))->resize('525', '295');
        $img->save();

        return redirect('articles');
    }

    public function update(ArticleRequest $request, Article $article)
    {
        if ($request->image == null) {
            $name = $article->image;
        } else {
            $img = $request->file('image');
            $name = $img->getClientOriginalName();
            $img->move("images/", $name);
        }

        $article->update([
            'title' => $request->title,
            'brief' => $request->brief,
            'body' => $request->body,
            'status' => $request->status,
            'tag' => $request->tag,
            'image' => $name,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
        ]);
        $article->save();

        $img = Image::make(public_path('/images/' . $name))->resize('525', '295');
        $img->save();
        return redirect('articles');

    }

    public function destroy(Article $article)
    {
        $file_img = public_path("/images/{$article->image}");
        File::delete($file_img);
        $article->delete();
        return back();

    }
}
