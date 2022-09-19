<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
{{--    link--}}
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
{{--    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">--}}
    <style>
    @yield('')

    </style>
</head>
<body>
{{--        template project--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="">products</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{route('product.index')}}">products list<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{route('product.create')}}">add product</a>

        </div>
    </div>
</nav>
<section class="container-fluid">
<section class="data">
    <section class="row m-0">
        <section class="col-6 offset-3 mt-3 jumbotron">

                @yield('content')
            </section>
    </section>
</section>
</section>
{{--end template project--}}


<scirpt src="{{asset('dist/js/jquery-3.6.0.min.js')}}"></scirpt>
<scirpt src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></scirpt>
@yield('js')
</body>
</html>
