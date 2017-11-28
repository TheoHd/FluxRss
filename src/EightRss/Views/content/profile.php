<div class="container">
    <div class="row">
        <div class="col m12">
            <div class="col l3 m12 s12">
                <div class="card-panel">
                    <div class="card-content">
                        <span class="card-title"><b>Mes derniers commentaires</b></span>
                        <?php //while($response = $object['user']->getUserComments()): ?>
                        <?php //endwhile ?>
                    </div>
                </div>
            </div>
            <div class="col l5 m12 s12">
                <div class="card-panel">
                    <div class="card-content">
                        <span class="card-title"><b>Informations détaillées</b></span>
                        <p>
                            <b>Login : </b><br><?= $_SESSION['login'] ?><br>
                            <b>Nom : </b><br><?= $_SESSION['lastname'] ?><br>
                            <b>Prénom : </b><br><?= $_SESSION['firstname'] ?><br>
                            <b>Téléphone : </b><br><?= $_SESSION['telephone'] ?><br>
                            <b>Adresse : </b><br><?= $_SESSION['address'] ?><br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col l4 m12 s12">
                <div class="card-panel ">
                    <div class="card-content">
                        <span class="card-title"><b>Navigation</b></span>
                        <p>
                        <ul>
                            <li><a href="<?= BASE_URL ?>/home">Retourner à l'accueil</a></li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>