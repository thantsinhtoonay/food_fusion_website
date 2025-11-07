<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','FoodFusion')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  @include('partials.navbar')

  <main class="flex-grow-1">
    <div class="container py-4">
      @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
      @yield('content')
    </div>
  </main>

  @include('partials.footer')

  {{-- optional bootstrap js for carousel --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
