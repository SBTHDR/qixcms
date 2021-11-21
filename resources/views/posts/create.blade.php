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
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at">Published Date</label>
                    <input type="text" name="published_at" id="published_at" class="form-control" value="{{ isset($post) ? $post->published_at : '' }}">                    
                </div>
                @if (isset($post))
                    <div class="form-group">
                        <img src="{{ asset('uploads/'.$post->image) }}" alt="post_image" width="100%">
                    </div>
                @endif
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

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#published_at', {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    })
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
