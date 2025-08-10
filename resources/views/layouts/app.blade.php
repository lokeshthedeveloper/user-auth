<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'User Auth')</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
  <body>

    <!-- Header -->
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">User Auth</a>
        <div id="navbarNav">
          <ul class="nav">
            @if(!Auth::check())
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
              <li class="nav-item"><a class="nav-link" href="#">Welcome, {{ auth()->user()->name }}</a></li>
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-link nav-link">Logout</button>
                </form>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-4">
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-auto">
      <div class="container text-center">
        &copy; {{ date('Y') }} User Auth. All rights reserved.
      </div>
    </footer>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
      <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
              <div class="toast-body" id="successToastMessage">
             
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
      </div>
  </div>
@stack('scripts')  
</body>
</html>