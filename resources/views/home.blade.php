@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body p-5">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="text-center">
                <span class="border border-primary rounded p-3">Total Users <strong>{{ count($users) }}</strong></span>
                <span class="border border-primary rounded p-3">Total Categories <strong>{{ count($categories) }}</strong></span>
                <span class="border border-info rounded p-3">Total Posts <strong>{{ count($posts) }}</strong></span>
                <span class="border border-danger rounded p-3">Total Trashed Item <strong>{{ count($trashed) }}</strong></span>
            </div>
        </div>
    </div>
</div>
@endsection
