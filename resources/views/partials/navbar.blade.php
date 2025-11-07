<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">FoodFusion</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('recipes.index') }}">Recipes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('community.index') }}">Community</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('resources.index') }}">Culinary</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('resources.education') }}">Educational</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
      </ul>
      <div class="d-flex align-items-center">
        @auth
          <span class="text-white me-2">Hi, {{ auth()->user()->first_name ?? auth()->user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-outline-light btn-sm">Logout</button></form>
        @else
          <a href="{{ route('register') }}" class="btn btn-success btn-sm me-2" >Join Us</a>
          <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Login</a>
        @endauth
      </div>
    </div>
  </div>
</nav>

<!-- Join modal (CSS only) -->
{{-- <div id="join" class="modal-target">
  <div class="modal-box">
    <a class="close" href="#">×</a>
    <h5 class="mb-3">Join FoodFusion</h5>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="row g-2">
        <div class="col"><input name="first_name" class="form-control" placeholder="First name"></div>
        <div class="col"><input name="last_name" class="form-control" placeholder="Last name"></div>
      </div>
      <div class="mt-2"><input name="email" type="email" class="form-control" required placeholder="Email"></div>
      <div class="mt-2"><input name="password" type="password" class="form-control" required placeholder="Password"></div>
      <div class="mt-2"><input name="password_confirmation" type="password" class="form-control" required placeholder="Confirm password"></div>
      <div class="mt-3 text-end"><button class="btn btn-success">Create account</button></div>
    </form>
  </div> --}}
</div>
