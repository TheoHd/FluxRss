<div class="container">
    <div class="row">
        <div class="col m12 s12">
            <div id="add-flux" class="col m12">
                <div class="card-panel">
                    <div class="card-title">
                        <h5>Ajouter un flux</h5>
                    </div>
                    <div class="card-content">
                        <form action="#" method="post">
                            <?= $object['form'] ?>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="col m12 s12">
            <div id="delete-flux" class="col m12">
                <div class="card-panel">
                    <div class="card-title">
                        <h5>Supprimer un flux</h5>
                    </div>
                    <div class="card-content">
                        <form action="#" method="post">
                            <div class="input-field col s12">
                                <select id="name" name="name">
                                    <?php foreach ($object['flux']->getFluxInfo() as $arr): ?>
                                        <option value="<?= $arr['id_f'] ?>"><?= $arr['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= $object['form3'] ?>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modify-flux" class="col m12">
                <div class="card-panel">
                    <div class="card-title">
                        <h5>Modifier un flux</h5>
                    </div>
                    <div class="card-content">
                        <form action="#" method="post">
                            <div class="input-field col s12">
                                <select id="old-name-modify-flux" name="old-name">
                                    <?php foreach ($object['flux']->getFluxInfo() as $arr): ?>
                                        <option value="<?= $arr['id_f'] ?>"><?= $arr['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= $object['form2'] ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>