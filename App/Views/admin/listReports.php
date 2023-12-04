<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Relatórios</title>
  <link href="http://<?php echo APP_HOST; ?>/public/css/admin-style.css" rel="stylesheet">
</head>

<body>

  <div class="overlay-container">
    <a href="http://<?= APP_HOST ?>/admin/index">
      <div class="users-container">

        <p class="users-text">USERS</p>
        <img src="\public\images\icons\whiteProfile.png" class="users-icon" alt="Users Icon" width="55px" height="56px">

      </div>
    </a>
    <hr style="color: #fff;">

    <?php foreach ($viewVar["reportsWithProjects"] as $reportData) : ?>
      <div class="button-container">
        <p class="complaint-text">Complaint</p>
        <div class="report-container">
          <p><?= $reportData['report']->getReport(); ?></p>
        </div>
        <div class="report-buttons">
          <a href="http://<?= APP_HOST ?>/admin/deleteReport/<?= $reportData['report']->getIdReport(); ?>">
            <button>
              IGNORE
            </button>
          </a>
          <img src="\public\images\icons\warningIcon.png" style="width: 50px; height: 50px;">
          <a href="http://<?= APP_HOST ?>/admin/deleteProject/<?= $reportData['project']->getIdProject(); ?>">
            <button>
              DELETE POST
            </button>
          </a>
        </div>
      </div>

      <div class="project-divider">
        <div class="project">
          <div class="project-details">
            <p class="name"><?= $reportData['projectUser']->getNickname(); ?> #<?= $reportData['projectUser']->getTag(); ?></p>
            <strong><?= $reportData['project']->getTitle(); ?></strong>
            <p><?= $reportData['project']->getDescription(); ?></p>
            <?php if ($reportData['project']->hasFiles()) : ?>
              <div class="report-files">
                <?php foreach ($reportData['files'] as $file) : ?>
                  <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download>Download a file here (Careful, this link hasn't been checked)</a><br>
                <?php endforeach; ?>
              </div>
              <br>
            <?php endif; ?>

            <?php if ($reportData['project']->hasImages()) : ?>
              <div class="image-container">
                <?php foreach ($reportData['images'] as $index => $image) : ?>
                  <?php if ($index === 0) : ?>
                    <img src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" alt="Imagem do projeto">
                  <?php else : ?>
                    <img src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" alt="Imagem do projeto">
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <br>
            <?php endif; ?>

            <?php if ($reportData['project']->hasHashtags()) : ?>
              <div class="report-hashtags">
                <?php foreach ($reportData['hashtags'] as $hashtagProject) : ?>
                  <span>#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
                <?php endforeach; ?>
              </div>
              <br>
            <?php endif; ?>
          </div>
        </div>
      </div>
  </div>
  <hr>
<?php endforeach; ?>
</div>
</body>

</html>