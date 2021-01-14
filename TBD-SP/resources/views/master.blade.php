<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="/css/bulma.css"> -->
  </head>
  <body>
    @include('common.navbar')
    @yield('content')
  </body>
</html>
