<!--TODO Verify responsivity-->
<!--TODO Captcha + rememberMe-->
<!--TODO Ban system-->
<!--TODO Secure inputs and url-->
<div class="container" id="white-space-handler">
    <div class="row">
        <form class="col s12" method="post" action="#">
            <h3 class="teal-text">Se connecter</h3>
            <?php if(isset($_GET['id'])) :?>
                <h6 class="red-text">Inscription réussie, veuillez vous connecter</h6>
            <?php endif ?>
            <?= $object['form'] ?>
        </form>
    </div>
</div>