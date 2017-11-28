<!--TODO Add comments-->
<section id="">
    <div class="container">
        <?php if ($r = $object['article']->fetch()): ?>
            <div class="row">
                <div class="col s12">
                    <h3 class="header"><?= $r['title'] ?></h3>
                    <h5><?= $r['pubDate'] ?></h5>
                    <div class="fb-share-button" data-href="https://theohuchard.com" data-layout="button_count"
                         data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank"
                                                                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftheohuchard.com%2F&amp;src=sdkpreparse">Partager</a>
                    </div>
                    <p>
                        <?= $r['description'] ?>
                    </p>
                    <span>
                        <div class="teal-text">
                                <a class="teal-text article-links"
                                   href="<?= BASE_URL ?>/article/share/<?= $r['id_a'] ?>">
                                    <i class="fa fa-share"></i>&nbsp;
                                    Partager&nbsp;&nbsp;&nbsp;
                                </a>
                                <a class="teal-text article-links"
                                   href="<?= BASE_URL ?>/article/<?= $r['id_a'] ?>#comment">
                                    <i class="teal-text fa fa-comment"></i>&nbsp;
                                    Commenter&nbsp;&nbsp;&nbsp;
                                </a>
                                <a class="teal-text article-links"
                                   href="<?= BASE_URL ?>/article/<?= $r['id_a'] ?>">
                                    <i class="teal-text fa fa-plus"></i>&nbsp;
                                    Voir sur EightRss&nbsp;&nbsp;&nbsp;
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

