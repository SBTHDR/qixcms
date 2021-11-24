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
                <th>Category</th>
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
                        {{ $post->category->name }}
                    </td>
                    <td>
                        {{ $post->description }}
                    </td>
                    <td>
                        <img src="{{ asset('uploads/'.$post->image) }}" width="120px" alt="">                    
                    </td>
                    <td class="d-flex">
                        @if ($post->trashed())
                            <form action="{{ route('restore.update', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-primary">Restore</button>
                            </form>
                        @else
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <h4>Are you sure?</h4>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>
                                    <button type="submit" class="btn btn-sm btn-danger">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>
                                    </div>
                                </div>
                                </div>
                            </div>
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