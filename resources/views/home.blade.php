@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div>
                <span class="border border-primary rounded px-3 py-2">Total Categories <strong>{{ count($categories) }}</strong></span>
                <span class="border border-info rounded px-3 py-2">Total Posts <strong>{{ count($posts) }}</strong></span>
                <span class="border border-danger rounded px-3 py-2">Total Trashed Item <strong>{{ count($trashed) }}</strong></span>
            </div>
        </div>
    </div>
</div>
@endsection
