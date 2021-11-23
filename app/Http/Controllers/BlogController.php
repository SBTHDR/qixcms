<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show(Post $post)
    {
        return view('blog', compact('post'));
    }
}
