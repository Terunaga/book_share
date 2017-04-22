<!DOCTYPE html>
<html>
    <head>
        <title>BookShare</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/assets/stylesheets/bootstrap.css">
        <link rel="stylesheet" href="/assets/stylesheets/bootstrap-theme.css">
        <link rel="stylesheet" href="/assets/stylesheets/3-col-portfolio.css">
    </head>

    <body>
        @include('layouts.header')
        <div class="container">
            @yield('content')
            @include('layouts.footer')
        </div>

        <!-- jQuery -->
        <script src="/assets/javascripts/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/assets/javascripts/bootstrap.min.js"></script>

    </body>
</html>
