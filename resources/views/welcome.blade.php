@extends('layouts.main')

@section('content')
<!-- Main Content -->
<main class="main-content">
    <div class="section bg-gray">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-xl-9">
            <div class="row gap-y">

              @foreach ($posts as $post)
                  <div class="col-md-6">
                      <div class="card border hover-shadow-6 mb-6 d-block">
                      <a href="{{ route('blogs.show', $post->id) }}"><img class="card-img-top" src="{{ asset('uploads/'.$post->image) }}" alt="Card image cap"></a>
                      <div class="p-6 text-center">
                          <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ $post->category->name }}</a></p>
                          <h5 class="mb-0"><a class="text-dark" href="{{ route('blogs.show', $post->id) }}">{{ $post->description }}</a></h5>
                      </div>
                      </div>
                  </div>
              @endforeach                

            </div>

            {{ $posts->links() }}

          </div>

          <div class="col-md-4 col-xl-3">
            <div class="sidebar px-4 py-md-0">

              <h6 class="sidebar-title">Search</h6>
              <form class="input-group" target="#" method="GET">
                <input type="text" class="form-control" name="s" placeholder="Search">
                <div class="input-group-addon">
                  <span class="input-group-text"><i class="fa fa-search"></i></span>
                </div>
              </form>

              <hr>

              <h6 class="sidebar-title">Categories</h6>
              <div class="row link-color-default fs-14 lh-24">
                @foreach ($categories as $category)
                  <div class="col-6"><a href="#">{{ $category->name }}</a></div>
                @endforeach
              </div>

              <hr>

              <h6 class="sidebar-title">Top posts</h6>

              @foreach ($posts as $post)
              <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="{{ asset('uploads/'.$post->image) }}">
                  <p class="media-body small-2 lh-4 mb-0">{{ $post->title }}</p>
              </a>
              @endforeach                

              <hr>

              <h6 class="sidebar-title">Tags</h6>
              <div class="gap-multiline-items-1">
                <a class="badge badge-secondary" href="#">Development</a>
                <a class="badge badge-secondary" href="#">Web</a>
                <a class="badge badge-secondary" href="#">UI/UX</a>
                <a class="badge badge-secondary" href="#">Laravel</a>
                <a class="badge badge-secondary" href="#">Software</a>
              </div>

              <hr>

              <h6 class="sidebar-title">About</h6>
              <p class="small-3">Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.</p>

            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
@endsection
