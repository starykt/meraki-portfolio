<a href="http://<?= APP_HOST ?>/hashtag/register">
    <button class="not-a-player-button">Cadastrar Hashtag</button>
  </a>
            <?php if ($Sessao::retornaMensagem()) { ?>
                <div class="alert alert-warning" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $Sessao::retornaMensagem() ?>
                    <br>
                </div>
            <?php } ?>

                <?php foreach ($viewVar['listHashtag'] as $hashtag) { ?>
                    <div class="card-hashtag">
                        <strong><?= $hashtag->getHashtag() ?></strong>
                    </div>
                    <?php } ?>
                </div>


        </div>
    </div>
</div>