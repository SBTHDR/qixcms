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
        <strong>{{ __('Tags') }}</strong>
        <a href="{{ route('tags.create') }}" class="btn btn-sm btn-primary">Add Tag</a>
    </div>
    <div class="card-body">
        @if ($tags->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                {{-- <th>Posts</th> --}}
                <th>Created at</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>
                        {{ $tag->name }}
                    </td>
                    {{-- <td>
                        {{ $tag->posts->count() }}
                    </td> --}}
                    <td>
                        {{ $tag->created_at->diffForHumans(date('Y-m-d\TH:i:sO')) }}
                    </td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button onclick="deleteMethod({{ $tag->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="POST" id="modalDeletForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure you want to delete?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @else
            <h5 class="text-center">Tags is empty, create a Tag.</h5>
        @endif
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function deleteMethod(id) {
            let modalForm = document.getElementById('modalDeletForm')
            modalForm.action = '/tags/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection