<div class="container" id="white-space-handler">
    <div class="row">
        <form class="col s12" method="post" action="#">
            <?php if(isset($object['error']) && $object['error'] != "") :?>
                <div class="card-panel animated fadeIn red lighten-1"><?= $object['error'] ?></div>
            <?php endif; ?>
            <?php if(isset($_GET['id'])) :?>
                <div class="card-panel animated bounceIn green">Inscription réussie, veuillez vous connecter</div>
            <?php endif ?>
            <h3 class="teal-text">Se connecter</h3>
            <?= $object['form'] ?>
        </form>
    </div>
</div>