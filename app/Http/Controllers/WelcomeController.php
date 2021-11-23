<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(2);
        } else {
            $posts = Post::with('category')->orderBy('id', 'desc')->simplePaginate(2);
        }

        $categories = Category::orderBy('id', 'desc')->get();
        return view('welcome', compact('posts', 'categories'));
    }
}
