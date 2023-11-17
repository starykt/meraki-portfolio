<a href="http://<?= APP_HOST ?>/tool/register">
  <button class="not-a-player-button">Cadastrar ferramenta</button>
</a>
<br>


<h1>Lista de Ferramentas</h1>

<ul>
  <?php foreach ($viewVar['tools'] as $tool) { ?>
    <strong><?= $tool->getCaption() ?></strong> <br>
    <p style="color: <?= $tool->getColor() ?>;">Color: <?= $tool->getColor() ?></p>
    <img src="http://<?php echo APP_HOST; ?>/public/images/tools/<?= $tool->getIcon() ?>" width="200px" height="200px"><br>
     <a href="http://<?= APP_HOST ?>/tool/alter/<?= $tool->getIdTool() ?>"> editar </a><br>
     <a href="http://<?= APP_HOST ?>/tool/drop/<?= $tool->getIdTool() ?>"> excluir </a><br>
  <?php } ?>
  </div>

</ul>