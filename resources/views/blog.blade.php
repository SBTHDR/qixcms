@extends('layouts.main')

@section('content')
<div class="section">
    <div class="container">

      <div class="text-center mt-8">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->user->name }} at {{ $post->created_at->diffForHumans(date('Y-m-d\TH:i:sO')) }} in <a href="#">{{ $post->category->name }}</a></p>
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
            @foreach ($post->tags as $tag)
              <a class="badge badge-pill badge-secondary" href="#">{{ $tag->name }}</a>
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </div>

@endsection
