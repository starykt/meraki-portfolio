<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<body>
  <h2>Upload Form</h2>
  <form action="http://<?php echo APP_HOST; ?>/project/save" method="POST" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

    <label for="image">Upload Images:</label>
    <input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

    <label for="files">Upload Files:</label>
    <input type="file" id="files" name="files[]" multiple><br><br>

    <label for="idHashtag">
      <label for="idHashtags">Selecione as Hashtags:</label>
      <select class="select" name="idHashtags[]" id="idHashtags" multiple required>
        <?php foreach ($viewVar['listHashtag'] as $hashtag) { ?>
          <option value="<?= $hashtag->getIdHashtag() ?>"><?= $hashtag->getHashtag() ?></option>
        <?php } ?>
      </select>



      <input type="submit" value="Upload">
  </form>
