<!--TODO Verify functions-->
<div class="container">
    <div class="row">
        <?php if(isset($object['alert']) && $object['alert'] != "") :?>
            <div class="card-panel animated bounceIn teal lighten-3"><?= $object['alert'] ?></div>
        <?php endif; ?>
        <?php if(isset($object['error']) && $object['error'] != "") :?>
            <div class="card-panel animated fadeIn red lighten-1"><?= $object['error'] ?></div>
        <?php endif; ?>
        <div class="col m12 s12">
            <div id="header" class="col s12">
                <br>
                <a href="<?= BASE_URL ?>/home">Accueil</a> > <a href="#">Article</a>
            </div>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large teal">
                    <i class="fa fa-list"></i>
                </a>
                <ul>
                    <li><a href="#list-flux" class="btn-floating blue"><i class="fa fa-list-ol"></i></a></li>
                    <li><a href="#add-flux" class="btn-floating green"><i class="fa fa-plus"></i></a></li>
                    <li><a href="#delete-flux" class="btn-floating red"><i class="fa fa-minus"></i></a></li>
                    <li><a href="#modify-flux" class="btn-floating yellow darken-1"><i class="fa fa-edit"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="col m12 s12">
            <div id="list-flux" class="col m12">
                <table>
                    <thead>
                    <tr>
                        <th>Nom du flux</th>
                        <th>URL du flux</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($object['flux']->getFluxInfo() as $arr): ?>
                        <tr>
                            <td><?= $arr['name'] ?></td>
                            <td><?= $arr['url'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
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
                                <select id="flux" name="flux">
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
</div>