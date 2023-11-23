<br><br><br><br><br><br><br><br><br><br>

<?php if ($Sessao::retornaMensagem()) { ?>
    <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?= $Sessao::retornaMensagem() ?>
        <br>
    </div>
<?php } ?>

<b> Minhas Notificações</b>

<?php foreach ($viewVar['notifications'] as $notification) { ?>
    <br>
    <?= $notification->getNotification() ?>
    <br>
<?php } ?>
