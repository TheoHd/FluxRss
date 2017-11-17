<div class="container" id="white-space-handler">
    <div class="row">
        <div class="col m12">
            <div class="col m3 s12">
                <div class="card-panel">
                    <div class="card-title">
                        <p><b>Mes derniers commentaires</b></p>
                    </div>
                    <div class="card-content">
                        <?php //while($response = $object['user']->getUserComments()): ?>
                        <?php //endwhile ?>
                    </div>
                </div>
            </div>
            <div class="col m5 s12">
                <div class="card-panel">
                    <div class="card-title">
                        <h6><b>Informations détaillées</b></h6>
                    </div>
                    <div class="card-content">
                        <b>Login : </b><br><?= $_SESSION['login'] ?><br>
                        <b>Nom : </b><br><?= $_SESSION['lastname'] ?><br>
                        <b>Prénom : </b><br><?= $_SESSION['firstname'] ?><br>
                        <b>Téléphone : </b><br><?= $_SESSION['telephone'] ?><br>
                        <b>Adresse : </b><br><?= $_SESSION['address'] ?><br>
                    </div>
                </div>
            </div>
            <div class="col m4 s12">
                <div class="card-panel ">
                    <div class="card-title"><p><b>Navigation</b></p></div>
                    <div class="card-content">
                        <ul>
                            <li><a href="">Retourner à l'accueil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>