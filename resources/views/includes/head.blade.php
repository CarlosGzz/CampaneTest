<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Carlos Gonzalez">
    <meta name="description" content="Dashboard de Campamento Nueva Especie">
    <link rel="icon" href="/images/lxmlogo.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Fonts -->
    <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    @yield('styles')

    <!-- Scripts -->
    @yield('headScripts')
    <script src="/js/jquery.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>