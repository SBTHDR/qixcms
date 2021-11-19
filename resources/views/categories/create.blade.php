@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{ isset($category) ? __('Edit Category') : __('Create A Category') }}</strong>
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">Back To Categories</a>
        </div>
        <div class="card-body">
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Give a category name" value="{{ isset($category) ? $category->name : '' }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update Category' : 'Save Category' }}</button>
            </form>
        </div>
    </div>
@endsection
