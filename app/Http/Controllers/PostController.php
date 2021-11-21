<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::orderBy('id', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $postImage,
            'published_at' => $request->published_at,
            'category_id' => $request->category
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::orderBy('id', 'desc')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'published_at']);

        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            // unlink("uploads/".$post->image);
            $post->deleteImage();
            $data['image'] = $postImage;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        return back()->with('success', 'Post deleted successfully.');
    }

    /**
     * Show only trashed posts
     *     
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    /**
     * Restore trashed post
     *     
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        return redirect()->route('posts.index')->with('success', 'Post restored successfully.');
    }
}
