<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="m-auto" href="#" target="_blank">
                     <img class="" src="{{asset('img/logo.jpeg')}}" alt="" style="height: 135px;
    width: 235px;">
                </a>
             
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>



<footer class="footer fixed-bottom ml-5 py-4">
    Copyright &copy; {{date('Y')}} <strong>  Sujit Paul.</strong>
    All rights reserved.
    <div class="float-right  mr-5">
      <b> Developed by </b> <a href="https://mybdhost.com" target="_blank"><strong>Mybdhost</strong></a>
    </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.5/dist/sweetalert2.all.min.js"></script>

<script>
  const Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 6000
   });

  @if (session()->has('message'))

    Toast.fire({
      type: "{!! session()->get('type')  !!}",
      title: "{!! session()->get('message')  !!}"
    })
  {{ Session::forget('message')}}
  @endif
</script>
</body>
</html>
