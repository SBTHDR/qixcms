@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{ isset($post) ? __('Edit Post') : __('Create A Post') }}</strong>
            <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary">Back To Posts</a>
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Give a post title" value="{{ isset($post) ? $post->title : '' }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Post Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Give a post description" value="{{ isset($post) ? $post->description : '' }}">
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Post content</label>                    
                    <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Give post content">{{ isset($post) ? $post->content : '' }}</textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="published_at">Published Date</label>
                    <input type="date" name="published_at" id="published_at" class="form-control" value="{{ isset($post) ? $post->published_at : '' }}">
                    @error('published_at')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="image">Post image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update Post' : 'Save Post' }}</button>
            </form>
        </div>
    </div>
@endsection
