<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>UmiCMS | Ttch Blog</title>

    <!-- Styles -->
    <link href="{{ asset('frontend/css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('frontend/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('frontend/img/favicon.png') }}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="/">
            <h2 class="text-white"><strong>UmiCMS</strong></h2>
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            
            <li class="nav-item">
              <a class="nav-link" href="#">Links <span class="arrow"></span></a>
              <nav class="nav">
                <a class="nav-link" href="#">Home</a>
                <a class="nav-link" href="#">Blog</a>
                <a class="nav-link" href="#">About</a>
                <a class="nav-link" href="#">Contact</a>
              </nav>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>

          </ul>
        </section>

        <a class="btn btn-xs btn-round btn-primary" href="{{ route('login') }}">Log in</a>

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #885dff 0%, #ba9cfd 48%, #866bff 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Read Latest Blog Posts</h1>
            <p class="lead-2 opacity-90 mt-6">Laravel A PHP Framework For Web Artisans</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


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
                        <a href="#"><img class="card-img-top" src="{{ asset('uploads/'.$post->image) }}" alt="Card image cap"></a>
                        <div class="p-6 text-center">
                            <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ $post->category->name }}</a></p>
                            <h5 class="mb-0"><a class="text-dark" href="#">{{ $post->description }}</a></h5>
                        </div>
                        </div>
                    </div>
                @endforeach                

              </div>


              <nav class="flexbox mt-30">
                <a class="btn btn-white disabled"><i class="fa fa-arrow-circle-left"></i> Newer</a>
                <a class="btn btn-white" href="#">Older <i class="fa fa-arrow-circle-right"></i></a>
              </nav>
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


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

         <div class="col-6 col-lg-3">
            <p>&copy; Subrata, {{ date("Y") }}</p>
         </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="#"><i class="fa fa-linkedin"></i></a>
              <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="#"><i class="fa fa-github"></i></a>
              <a class="social-dribbble" href="#"><i class="fa fa-behance"></i></a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="#">Home</a>
              <a class="nav-link" href="#">Terms</a>
              <a class="nav-link" href="#">About</a>
              <a class="nav-link" href="#">Blog</a>
              <a class="nav-link" href="#">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('frontend/js/page.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>

  </body>
</html>
