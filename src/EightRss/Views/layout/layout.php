<!--TODO Verify responsivity-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Parallax Template - Materialize</title>

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
        <a id="logo-container" href="<?= BASE_URL ?>/home" class="brand-logo"><img class="nav-logo" src="<?= BASE_URL ?>/web/img/logo.png"
                                                                alt=""></a>
        <ul class="right hide-on-med-and-down">
            <!--            TODO Method isConnected in User-->
            <!--            TODO Method isAdmin in User-->
            <?php if ($object['user']->isAdmin()) : ?>
                <!--                TODO Add admin page in launcher and verify controller-->
                <li><a href="<?= BASE_URL ?>/admin"><span class="color-3">Administration</span></a></li>
            <?php endif ?>
            <?php if ($object['user']->isConnected()) : ?>
                <!--                TODO Add user page in launcher and verify controller-->
                <!--                TODO Add page login in launcher and verify in controller-->
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

<footer id="footer" class="page-footer background-color-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Projet PPE</h5>
                <p class="grey-text text-lighten-4">Ce projet a été basé sur la réception et l'émission d'un ou
                    plusieurs flux RSS.</p>
            </div>
            <div class="col l6 s12">
                <h5><a class="color-1" href="#nav"><i class="fa fa-arrow-circle-up" style="width:100%;"> Remonter en
                            haut de la page</i></a></h5>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container" style="margin-left: 6px;">
                Créé par <a class="color-1" href="http://materializecss.com">Théo Huchard</a>
            </div>
            <small style="margin-right: 5px;">Le logo a été créé sur <a class="color-1" href="http://logomakr.com"
                                                                        title="Logo Makr">LogoMakr.com</a>
                https://logomakr.com/6QWc2Y
            </small>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="<?= BASE_URL ?>/web/js/jquery-3.2.1.min.js"></script>
<script src="<?= BASE_URL ?>/web/js/materialize.js"></script>
<script src="<?= BASE_URL ?>/web/js/init.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

</body>
</html>
