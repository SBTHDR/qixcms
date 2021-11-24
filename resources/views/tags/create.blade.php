@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{ isset($tag) ? __('Edit Tag') : __('Create A Tag') }}</strong>
            <a href="{{ route('tags.index') }}" class="btn btn-sm btn-primary">Back To Tags</a>
        </div>
        <div class="card-body">
            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                @csrf
                @if (isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Give a Tag name" value="{{ isset($tag) ? $tag->name : '' }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($tag) ? 'Update Tag' : 'Save tag' }}</button>
            </form>
        </div>
    </div>
@endsection
