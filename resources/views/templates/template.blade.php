<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container-fluid">
    <header class="row">
        @yield('header')
    </header>
    <div class="row">
        <div role="main">
            @yield('content')
        </div>
    </div>

    <footer class="footer row">
    </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
@section('javascript')
@show
</body>
</html>
