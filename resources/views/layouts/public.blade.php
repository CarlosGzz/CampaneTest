<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('metas')
        <meta name="author" content="Carlos Gonzalez">
        <link rel="icon" href="/images/lxmlogo.png">

        <title>@yield('title')</title>

        <!-- Bootstrap core CSS -->

        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="/css/custom.css" rel="stylesheet">
        <link href="/css/icheck/flat/green.css" rel="stylesheet" />
        <!-- Select2 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <!-- Flat Picker -->
        <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">

        <script src="/js/jquery.min.js"></script>
        @yield('scripts')


    </head>

    <body>
        @yield('content')
    </body>
</html>