<body>
  <h1>Listar Relatórios</h1>

  <?php foreach ($viewVar["reportsWithProjects"] as $reportData) : ?>
    <div>
    <a href="http://<?= APP_HOST ?>/admin/deleteProject/<?= $reportData['project']->getIdProject(); ?>"> Excluir post </a><br>
    <a href="http://<?= APP_HOST ?>/admin/deleteReport/<?= $reportData['report']->getIdReport(); ?>"> Ignorar</a>
      <strong>Relatório:</strong> <?= $reportData['report']->getReport(); ?><br>
      <strong>Detalhes do Projeto:</strong><br>
      <strong>Título:</strong> <?= $reportData['project']->getTitle(); ?><br>
      <strong>Descrição:</strong> <?= $reportData['project']->getDescription(); ?><br>
      <strong>Criado em:</strong> <?= $reportData['project']->getCreated_At()->format('d/m/Y H:i:s'); ?><br>

      <?php if ($reportData['project']->hasImages()) : ?>
        <strong>Imagens:</strong>
        <?php foreach ($reportData['images'] as $image) : ?>
          <img src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
        <?php endforeach; ?>
        <br>
      <?php endif; ?>

      <?php if ($reportData['project']->hasFiles()) : ?>
        <strong>Arquivos:</strong>
        <div class="report-files">
          <?php foreach ($reportData['files'] as $file) : ?>
            <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download><?= $file->getFile() ?></a><br>
          <?php endforeach; ?>
        </div>
        <br>
      <?php endif; ?>

      <?php if ($reportData['project']->hasHashtags()) : ?>
        <strong>Hashtags:</strong>
        <div class="report-hashtags">
          <?php foreach ($reportData['hashtags'] as $hashtagProject) : ?>
            <span>#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
          <?php endforeach; ?>
        </div>
        <br>
      <?php endif; ?>

    </div>
    <hr>
  <?php endforeach; ?>

</body>

</html>