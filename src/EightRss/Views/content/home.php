<div class="container">
    <div class="section">
        <div class="row">
            <div class="col m12 s12">
                <?php for($i = 1; $i <= $object['flux']->getFluxNbOfElements(); $i++): ?>
                    <?php foreach ($object['homeFlux'][$i]->channel->item as $item): ?>
                        <article>
                            <div style='cursor:pointer;' class='hoverable'>
                                <div class="card horizontal">
                                    <?php if(!is_null($item->image->url)): ?>
                                        <div class="valign-wrapper card-image eight-rsp-img col m4 s12">
                                            <img class="" style="width:100%;" src="<?= $item->image->url ?>">
                                        </div>
                                        <div class="card-content col m8 s12">
                                            <p><b><u><?= $item->title ?></u></b></p>
                                            <p><b><?= $item->pubDate ?></b></p>
                                            <p><b><?= $item->category ?></b></p>
                                            <?= strip_tags($item->description) ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="card-content col m12 s12">
                                            <p><b><u><?= $item->title ?></u></b></p>
                                            <p><b><?= $item->pubDate ?></b></p>
                                            <p><b><?= $item->category ?></b></p>
                                            <?= strip_tags($item->description) ?>
                                            <br>
                                            <br>
                                            <span>
                                                <div class="teal-text">
                                                    <form action="#" method="post">
                                                        <input hidden name="title" value="<?= $item->title ?>">
                                                        <input hidden name="pubDate" value="<?= $item->pubDate ?>">
                                                        <input hidden name="category" value="<?= $item->category ?>">
                                                        <input hidden name="description" value="<?= $item->description ?>">
                                                        <input hidden name="guide" value="<?= $item->guide ?>">
                                                        <a class="teal-text" type="submit_share" href="<?= BASE_URL ?>/article">Partager <i class="fa fa-share"></i>&nbsp;</a>
                                                        <a class="teal-text" type="submit_comment" href="<?= BASE_URL ?>/article">Commenter <i class="teal-text fa fa-comment"></i>&nbsp;</a>
                                                        <a class="teal-text" type="submit_eightrss" href="<?= BASE_URL ?>/article">Voir sur EightRss <i class="teal-text fa fa-plus"></i>&nbsp;</a>
                                                        <a class="teal-text" href="<?= $item->link ?>">Voir sur le site original <i class="teal-text fa fa-plus-circle"></i>&nbsp;</a>
                                                    </form>
                                                </div>
                                            </span>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach ?>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>

