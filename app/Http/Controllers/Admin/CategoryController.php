<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Admin.Categories.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('Admin.Categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        Category::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

    public function update(Request $request, Category $category)
    {
       $category->update([
          'title' => $request->title
       ]);
       $category->save();
        return redirect('categories');

    }

    public function destroy(Category $category)
    {
       $category->delete();
        return back();

    }
}
