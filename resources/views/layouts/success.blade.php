<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  {{-- style  --}}
  @stack('prepend-styles')
  @include('includes.styles')
  @stack('addon-styles')
</head>

<body>

  <!-- PAGE CONTENT -->
  @yield('content')

  {{-- footer  --}}
  @include('includes.footer')

  <!-- Bootstrap core JavaScript -->
  {{-- scripts  --}}
  @include('includes.scripts')
</body>





</html>