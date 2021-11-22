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
        <strong>{{ __('Users') }}</strong>        
    </div>
    <div class="card-body">
        @if ($users->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        @if (!$user->isAdmin())
                            <button type="submit" class="btn btn-sm btn-primary">Make Admin</button>
                        @else
                            <span class="text-success">{{ $user->role }}</span>
                        @endif                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h5 class="text-center">Users is empty</h5>
        @endif
    </div>
        
@endsection