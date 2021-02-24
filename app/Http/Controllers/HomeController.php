<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $publishedArticles = Article::query()->where('published_at', '<', now())->paginate(9);

        $futureArticles = Article::query()->where('published_at', '>', now())->paginate(9);
        return view('Admin.index', compact('publishedArticles', 'futureArticles'));
    }
}
