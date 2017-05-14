<!DOCTYPE html>
<html>
    <head>
        <title>BookShare</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/assets/stylesheets/bootstrap.css">
        <link rel="stylesheet" href="/assets/stylesheets/bootstrap-theme.css">
        <link rel="stylesheet" href="/assets/stylesheets/3-col-portfolio.css">
        <link rel="stylesheet" href="/assets/stylesheets/review_star.css">
        <link rel="stylesheet" href="/css/my_page.css">
        <link rel="stylesheet" href="/css/top.css">
        <link rel="stylesheet" href="/css/books.css">
        <link rel="stylesheet" href="/css/lends.css">
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

        <script src="/assets/javascripts/dateformat.js"></script>
        <script src="/assets/javascripts/books.js"></script>
        <script src="/assets/javascripts/borrows.js"></script>

    </body>
</html>
