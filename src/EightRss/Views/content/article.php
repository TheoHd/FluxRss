<!--TODO Add comments-->
<section id="article">
    <div class="container">
        <?php if ($r = $object['article']->fetch()): ?>
            <div class="row">
                <div class="col s12">
                    <br>
                    <a href="<?= BASE_URL ?>/home">Accueil</a> > <a href="#">Article</a>
                    <h3 class="header"><?= $r['title'] ?></h3>
                    <h5><?= $r['pubDate'] ?></h5>
                    <div id="#share" class="fb-share-button" data-href="https://theohuchard.com" data-layout="button_count"
                         data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank"
                                                                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftheohuchard.com%2F&amp;src=sdkpreparse">Partager</a>
                    </div>
                    <p>
                        <?= $r['description'] ?>
                    </p>
                    <span>
                        <div class="teal-text">
                                <a class="teal-text article-links"
                                   href="<?= BASE_URL ?>/article/<?= $r['id_a'] ?>#comment">
                                    <i class="teal-text fa fa-comment"></i>&nbsp;
                                    Commenter&nbsp;&nbsp;&nbsp;
                                </a>
                                <a class="teal-text article-links" target="_blank"
                                   href="<?= $r['link'] ?>">
                                    <i class="teal-text fa fa-plus-circle"></i>&nbsp;
                                    Voir sur le site original&nbsp;&nbsp;&nbsp;
                                </a>
                        </div>
                    </span>
                </div>
            </div>
        <?php else: ?>
            <?php $this->redirect('/notFound'); ?>
        <?php endif ?>
        <br>
        <div id="#comment" class="row">
            <div class="col s12">
                <h4>Commentaires</h4>
            </div>
        </div>
        <div class="row">
            <div class="col m12">
                <?php if (isset($_SESSION) && !empty($_SESSION['connected'])): ?>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" value="<?= $_SESSION['login'] ?>" disabled
                                       placeholder="Votre pseudo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="comment" name="comment" class="materialize-textarea"></textarea>
                                <label for="comment">Votre commentaire</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input class="btn" id="submit" type="submit" name="submit"
                                       value="Poster mon commentaire">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <?php if (isset($object['error']) && !empty($object['error']) && $object['error'] != ""): ?>
                                    <p class="red-text"><?= $object['error'] ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <b>Pour commenter veuillez vous connecter <a href="<?= BASE_URL ?>/login">ici</a>.</b>
                <?php endif ?>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <?php foreach ($object['comments'] as $r): ?>
                    <div class="card">
                        <div class="card-content">
                            <b>Pseudo :</b> <?= $object['user']->getUserInfo((int)$r['id_u'])['login'] ?>
                        </div>
                        <div class="card-action">
                            <b>Commentaire :</b>
                            <p><?= $r['content'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

