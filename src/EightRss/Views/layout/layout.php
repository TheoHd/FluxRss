<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
    <title>EightRss</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= BASE_URL ?>/web/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= BASE_URL ?>/web/css/font-awesome.min.css" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <link href="<?= BASE_URL ?>/web/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= BASE_URL ?>/web/css/palette.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<nav class="background-color-4" id="nav" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="<?= BASE_URL ?>/home" class="brand-logo"><img class="nav-logo"
                                                                                   src="<?= BASE_URL ?>/web/img/logo.png"
                                                                                   alt=""></a>
        <ul class="right hide-on-med-and-down">
            <?php if ($object['user']->isAdmin()) : ?>
                <li><a href="<?= BASE_URL ?>/admin"><span class="color-3">Administration</span></a></li>
            <?php endif ?>
            <?php if ($object['user']->isConnected()) : ?>
                <li><a href="<?= BASE_URL ?>/profile"><span class="color-3">Profil</span></a></li>
                <li><a href="<?= BASE_URL ?>/disconnect"><span class="color-3">Se déconnecter</span></a></li>
            <?php else : ?>
                <li><a href="<?= BASE_URL ?>/register"><span class="color-3">S'inscrire</span></a></li>
                <li><a href="<?= BASE_URL ?>/login"><span class="color-3">Se connecter</span></a></li>
            <?php endif ?>
            <li><a href="#footer"><span class="color-3">À propos</span></a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav background-color-4">
            <?php if ($object['user']->isAdmin()) : ?>
                <li><a href="<?= BASE_URL ?>/admin"><span class="color-3">Administration</span></a></li>
            <?php endif ?>
            <?php if ($object['user']->isConnected()) : ?>
                <li><a href="<?= BASE_URL ?>/profile"><span class="color-3">Profil</span></a></li>
                <li><a href="<?= BASE_URL ?>/disconnect"><span class="color-3">Se déconnecter</span></a></li>
            <?php else : ?>
                <li><a href="<?= BASE_URL ?>/register"><span class="color-3">S'inscrire</span></a></li>
                <li><a href="<?= BASE_URL ?>/login"><span class="color-3">Se connecter</span></a></li>
            <?php endif ?>

            <li><a href="#footer"><span class="color-3">À propos</span></a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<?= $content ?>

<footer id="footer">
    <div class="container">
        <div class="row">
            <hr>
            <div class="col l12 s12 center">
                <h5><a class="color-3" href="#nav"><i class="fa fa-arrow-circle-up" style="width:100%;"> Remonter en
                            haut de la page</i></a></h5>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="center">
                <p>Par <a class="color-3" href="http://theohuchard.com">Théo Huchard </a>© 2017 Tous droits réservés
                    <br>
                    <small>Le logo a été créé sur
                        <a class="color-3" href="http://logomakr.com"title="Logo Makr">
                            LogoMakr.com
                        </a>
                        https://logomakr.com/6QWc2Y
                    </small>
                </p>
            </div>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="<?= BASE_URL ?>/web/js/jquery-3.2.1.min.js"></script>
<script src="<?= BASE_URL ?>/web/js/materialize.js"></script>
<script src="<?= BASE_URL ?>/web/js/init.js"></script>
<script src="<?= BASE_URL ?>/web/js/facebook.js"></script>
<script>
    $(document).ready(function () {
        $('select').material_select();
    });
</script>

</body>
</html>
