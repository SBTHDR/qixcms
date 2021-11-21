@extends('layouts.app')

@section('content')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successful!</strong> {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>{{ __('Posts') }}</strong>
        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">Add Post</a>
    </div>
    <div class="card-body">
        @if ($posts->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->description }}
                    </td>
                    <td>
                        <img src="{{ asset('uploads/'.$post->image) }}" width="120px" alt="">                    
                    </td>
                    <td class="d-flex">
                        @if (!$post->trashed())
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h5 class="text-center">Posts is empty, create a post.</h5>
        @endif
    </div>
        
@endsection