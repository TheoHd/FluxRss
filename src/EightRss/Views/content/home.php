<div class="container">
    <div class="section">
        <div class="row">
            <div class="col m12 s12">
                <?php while ($r = $object['articles']->fetch()): ?>
                    <article>
                        <div class='hoverable'>
                            <div class="card horizontal">
                                <?php if (!is_null($r['image_url'])): ?>
                                    <div class="valign-wrapper card-image eight-rsp-img col m2 s12">
                                        <img class="image-url-home" src="<?= $r['image_url'] ?>">
                                    </div>
                                <?php else: ?>
                                    <div class="valign-wrapper card-image eight-rsp-img col m2 s12">
                                        <img class="image-url-home" src="https://x.kinja-static.com/assets/images/logos/placeholders/default.png">
                                    </div>
                                <?php endif ?>
                                <div class="card-content col m10 s12">
                                    <p><b><u><?= $r['title'] ?></u></b></p>
                                    <p><b><?= $r['pubDate'] ?></b></p>
                                    <p><b><?= $r['category'] ?></b></p>
                                    <?= strip_tags($r['description']) ?>
                                    <br>
                                    <br>
                                    <span>
                                        <div class="teal-text">
                                                <a class="teal-text article-links" href="<?= BASE_URL ?>/article/share/<?= $r['id_a'] ?>">
                                                    <i class="fa fa-share"></i>&nbsp;
                                                    Partager&nbsp;&nbsp;&nbsp;
                                                </a>
                                                <a class="teal-text article-links" href="<?= BASE_URL ?>/article/<?= $r['id_a'] ?>#comment">
                                                    <i class="teal-text fa fa-comment"></i>&nbsp;
                                                    Commenter&nbsp;&nbsp;&nbsp;
                                                </a>
                                                <a class="teal-text article-links" href="<?= BASE_URL ?>/article/<?= $r['id_a'] ?>">
                                                    <i class="teal-text fa fa-plus"></i>&nbsp;
                                                    Voir sur EightRss&nbsp;&nbsp;&nbsp;
                                                </a>
                                                <a class="teal-text article-links" target="_blank" href="<?= $r['link'] ?>">
                                                    <i class="teal-text fa fa-plus-circle"></i>&nbsp;
                                                    Voir sur le site original&nbsp;&nbsp;&nbsp;
                                                </a>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</div>

