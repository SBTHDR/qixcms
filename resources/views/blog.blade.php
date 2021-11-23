@extends('layouts.main')

@section('content')
<div class="section">
    <div class="container">

      <div class="text-center mt-8">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->user->name }} at {{ $post->published_at }} in <a href="#">{{ $post->category->name }}</a></p>
      </div>
      

      <div class="text-center my-8">
        <img class="rounded-md" src="{{ asset('uploads/'.$post->image) }}" alt="...">
      </div>


      <div class="row">
        <div class="col-lg-8 mx-auto">

          <h5>{{ $post->description }}</h5>

          <hr class="w-100px">

          {!! $post->content !!}

        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="gap-xy-2 mt-6">
            <a class="badge badge-pill badge-secondary" href="#">Record</a>
            <a class="badge badge-pill badge-secondary" href="#">Progress</a>
            <a class="badge badge-pill badge-secondary" href="#">Customers</a>
            <a class="badge badge-pill badge-secondary" href="#">News</a>
          </div>

        </div>
      </div>

    </div>
  </div>

@endsection
