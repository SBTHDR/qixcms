<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $posts = Post::with('category')->orderBy('id', 'desc')->get();
        return view('welcome', compact('posts', 'categories'));
    }
}
