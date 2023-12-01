<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Project</title>
</head>

<body>
  <h2>Edit Project</h2>

  <?php if ($viewVar['project']) { ?>
    <form action="http://<?php echo APP_HOST; ?>/project/update/<?= $viewVar['project']->getIdProject() ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $viewVar['project']->getIdProject() ?>">

      <label for="title">Title:</label>
      <input type="text" id="title" name="title" value="<?= $viewVar['project']->getTitle() ?>" required><br><br>

      <label for="description">Description:</label><br>
      <textarea id="description" name="description" rows="4" cols="50" required><?= $viewVar['project']->getDescription() ?></textarea><br><br>

      <h3>Images:</h3>
      <?php if ($viewVar['project']->getImages()) { ?>
        <?php foreach ($viewVar['project']->getImages() as $image) { ?>
          <div class="image-container">
          <a href="http://<?php echo APP_HOST; ?>/project/deleteImage?idImage=<?= $image->getIdImage() ?>&idProject=<?= $viewVar['project']->getIdProject() ?>">
            <button type="button" class="delete-btn" data-type="hashtag">Delete</button></a>
            <img src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
            <br>
          </div>
        <?php } ?>

      <?php } else { ?>
        <p>No images found.</p>
      <?php } ?>

      <label for="newImages">Upload New Images:</label>
      <input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

      <h3>Files:</h3>
      <?php if ($viewVar['project']->getFiles()) { ?>
        <?php foreach ($viewVar['project']->getFiles() as $file) { ?>
          <div class="file-container">
          <a href="http://<?php echo APP_HOST; ?>/project/deleteFile?idFile=<?= $file->getIdFile() ?>&idProject=<?= $viewVar['project']->getIdProject() ?>">
            <button type="button" class="delete-btn" data-type="hashtag">Delete</button> </a>
            <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" class="file-link" download><?= $file->getFile() ?></a>
            <br>
          </div>
        <?php } ?>
      <?php } else { ?>
        <p>No files found.</p>
      <?php } ?>


      <label for="newFiles">Upload New Files:</label>
      <input type="file" id="files" name="files[]" multiple><br><br>

      <h3>Hashtags:</h3>
      <?php if ($viewVar['project']->getHashtags()) { ?>
        <div class="hashtag-container">
          <?php foreach ($viewVar['project']->getHashtags() as $hashtag) { ?>
            <div class="hashtag-item">
              <span><?= $hashtag->getHashtag()->getHashtag() ?></span>
              <a href="http://<?php echo APP_HOST; ?>/project/deleteHashtag/?idHashtag=<?= $hashtag->getHashtag()->getIdHashtag()?>&idProject=<?= $viewVar['project']->getIdProject() ?>">
            <button type="button" class="delete-btn" data-type="hashtag" >Delete</button></a>
            </div>
          <?php } ?>
        </div>
      <?php } else { ?>
        <p>No hashtags found.</p>
      <?php } ?>

    <label for="idHashtag">
      <label for="idHashtags">Selecione as Hashtags:</label>
      <select class="select" name="idHashtags[]" id="idHashtags" multiple required>
        <?php foreach ($viewVar['listHashtag'] as $hashtag) { ?>
          <option value="<?= $hashtag->getIdHashtag() ?>"><?= $hashtag->getHashtag() ?></option>
        <?php } ?>
      </select>


      <input type="submit" value="Save Changes">
    </form>

  <?php } else { ?>
    <p>Project not found.</p>
  <?php } ?>

</body>

</html>