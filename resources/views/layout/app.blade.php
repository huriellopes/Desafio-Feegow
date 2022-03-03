<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="Huriel Lopes" />
    <title>{{ env('APP_NAME') ?? 'Feegow Challenge' }}</title>
    <link rel="stylesheet" href="{{ asset('/feegow/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/feegow/css/sweetalert.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/feegow/css/dataTables.bootstrap5.min.css') }}">
    @yield('css')
</head>
<body>
    @include('layout.includes.menu')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('/feegow/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/popper.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/axios.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/feegow/js/allFunctions.script.js') }}"></script>
    @yield('js')
</body>
</html>
