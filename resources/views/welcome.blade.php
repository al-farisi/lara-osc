<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
    
        <link href="css/metro.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <link href="css/metro-responsive.css" rel="stylesheet">
        <link href="css/metro-schemes.css" rel="stylesheet">
    
        <link href="css/docs.css" rel="stylesheet">
    
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/docs.js"></script>
        <script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <script src="js/ga.js"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Styles -->
        <style>
            #container {
                width: 100%;
                max-width: 700px;
                margin: 2em auto;
            }
            .cols {
                -moz-column-count:3;
                -moz-column-gap: 3%;
                -moz-column-width: 30%;
                -webkit-column-count:3;
                -webkit-column-gap: 3%;
                -webkit-column-width: 30%;
                column-count: 3;
                column-gap: 3%;
                column-width: 30%;
            }
            .box {
                margin-bottom: 20px;
                height:100px;
                background:#BFBFBF;
            }
        </style>
    </head>    
    <body id="app-layout" class="metro bg-darkTeal">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        One Stop Click
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                @foreach ($products as $key => $product)
                <div class="col-md-3">
                    <div class="panel">
                        <div class="heading">
                                <span class="icon mif-shop"></span>
                            <span class="title">{{ $product->name }}</span>
                        </div>
                        <div class="content">
                            <div class="cell">
                                <div class="image-container rounded">
                                    <div class="frame"><img src="{{asset('storage/'.$product->image)}}"></div>
                                </div>
                            </div>
                            <h5>Description</h5>
                            <p>{{ $product->description }}</p> 
                            <h5>Price</h5>
                            <p>{{ $product->price }} USD</p> 
                            <button>OK</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>
