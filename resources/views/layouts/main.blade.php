<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>House</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}">
    @yield('header-style')
</head>

<body>
<!-- Start: Header Blue -->
<div>
    <!-- Start: Header -->
    <div class="header-blue">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="{{route('home.index')}}">House</a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                     id="navcol-1">
                    <ul class="nav navbar-nav"></ul>
                    <form class="form-inline mr-auto" method="post" action="{{route('house.search')}}" target="_self">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="search-field"><i class="fa fa-search"></i></label>
                            <input class="form-control search-field" type="search" id="search-field" name="search" placeholder="Trouver une maison" value="{{old('search')}}">
                        </div>
                    </form>
                    @auth
                        <span class="navbar-text text-white">{{auth()->user()->name}}</span>
                    @endauth

                    @guest
                        <span class="navbar-text"> <a class="login btn btn-light action-button" href="{{route('login.index')}}">Se connecter</a></span>
                        <a class="btn btn-light action-button" role="button" href="{{route('register.index')}}">S'inscrire</a>
                    @endguest
                </div>
            </div>
        </nav>

        @yield('content')

    </div>
    <!-- End: Header -->
</div>
<!-- End: Header Blue -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="{{asset('vendor/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
@yield('footer-script')
</body>

</html>
