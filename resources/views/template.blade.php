<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:type" content="RSS Flow"/>
    <meta property="og:title" content="RSS Flow"/>
    <meta property="og:description" content="RSS Flow, made by Théo Huchard"/>
    <title>
        RSS Flow
    </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL::asset("rss-flow/css/materialize.min.css")}}" type="text/css" rel="stylesheet"/>
    <link href="{{URL::asset("rss-flow/css/font-awesome.min.css")}}" type="text/css" rel="stylesheet"/>
    <link href="{{URL::asset("rss-flow/css/style.css")}}" type="text/css" rel="stylesheet"/>
    <link href="{{URL::asset("rss-flow/css/palette.css")}}" type="text/css" rel="stylesheet"/>
</head>
<body>
<nav class="teal darken-4" id="nav" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="/home" class="brand-logo">
            <img class="nav-logo" src="{{URL::asset("rss-flow/img/rss-flow-logo.png")}}" alt="">
            <span class="color-2">
                RSS Flow
            </span>
        </a>
        <ul class="right hide-on-med-and-down">
            <li>
                <a href="/home">
                    <span class="color-2">
                        Accueil
                    </span>
                </a>
            </li>
            <li>
                <a href="/admin">
                    <span class="color-2">
                        Administration
                    </span>
                </a>
            </li>
            <li>
                <a href="/profile">
                    <span class="color-2">
                        Profil
                    </span>
                </a>
            </li>
            <li>
                <a href="/disconnect">
                    <span class="color-2">
                        Se déconnecter
                    </span>
                </a>
            </li>
            <li>
                <a href="/register">
                    <span class="color-2">
                        S'inscrire
                    </span>
                </a>
            </li>
            <li>
                <a href="/login">
                    <span class="color-2">
                        Se connecter
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

<footer id="footer">
    <div class="container">
        <div class="row">
            <hr>
            <div class="col l12 s12 center">
                <h5>
                    <a class="color-3" href="#nav">
                        <i class="fa fa-arrow-circle-up" style="width:100%;">
                            Remonter en haut de la page
                        </i>
                    </a>
                </h5>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="center">
                <p>
                    Par
                    <a class="color-3" target="_blank" href="http://theohuchard.com">
                        Théo Huchard
                    </a>
                    © 2017 Tous droits réservés
                    <br>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="{{URL::asset("rss-flow/js/jquery-3.2.1.min.js")}}"></script>
<script src="{{URL::asset("rss-flow/js/materialize.min.js")}}"></script>
<script src="{{URL::asset("rss-flow/js/init.js")}}"></script>
<script src="{{URL::asset("rss-flow/js/facebook.js")}}"></script>
<script>
    $(document).ready(function () {
        $('.modal').modal();
    });
</script>

</body>
</html>
