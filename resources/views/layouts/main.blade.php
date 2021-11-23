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
          <a class="navbar-brand" href="{{ route('welcome') }}">
            <h2 class="text-white"><strong>UmiCMS</strong></h2>
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            
            <li class="nav-item">
              <a class="nav-link" href="#">Links <span class="arrow"></span></a>
              <nav class="nav">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/blogs">Blog</a>
                <a class="nav-link" href="#">About</a>
                <a class="nav-link" href="#">Contact</a>
              </nav>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/blogs">Blog</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>

          </ul>
        </section>

        @auth
            <a class="btn btn-xs btn-round btn-primary" href="{{ route('home') }}">{{ auth()->user()->name }}</a>
        @else
            <a class="btn btn-xs btn-round btn-primary" href="{{ route('login') }}">Log in</a>
        @endauth

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #885dff 0%, #ba9cfd 48%, #866bff 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>UmiCMS Tech Blog</h1>
            <p class="lead-2 opacity-90 mt-6">New blog post about tech every day.</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


    @yield('content')


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
