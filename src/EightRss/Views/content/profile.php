<div class="container">
    <div class="row">
        <div class="col m12">
            <br>
            <a href="<?= BASE_URL ?>/home">Accueil</a> > <a href="#">Profil</a>
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
    </div>
</div>