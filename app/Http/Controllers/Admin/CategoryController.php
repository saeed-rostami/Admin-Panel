<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Admin.Categories.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        return view('Admin.Categories.edit', compact('category'));
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $this->authorize('create', $category);
        Category::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);
        $category->update([
            'title' => $request->title
        ]);
        $category->save();
        return redirect('categories');

    }

    public function destroy(Category $category)
    {
        if ($this->authorize('delete', $category)) {
            $category->delete();
            return back();
        } else {
            return back()->with('error', 'مجاز به اینکار نیستید');
        }

    }
}
