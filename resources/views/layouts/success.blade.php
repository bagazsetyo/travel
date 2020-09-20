<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @stack('prepent-style')
    @include('includes.css')
    @stack('addon-style')
    <title>@yield('title')</title>
  </head>
  <body>
    <!-- navbar -->
    @include('includes.navbar-alter')
    

   @yield('content')

    @stack('prepent-script')
    @include('includes.js')
    @stack('addon-script')
  </body>
</html>  