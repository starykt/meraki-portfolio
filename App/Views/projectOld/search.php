<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="http://<?php echo APP_HOST; ?>/project/search/" method="get">
  <label for="searchTerm">Search:</label>
  <input type="text" id="searchTerm" name="term" placeholder="Enter username or project hashtag">

  <label for="searchType">Search in:</label>
  <select id="searchType" name="type">
    <option value="user">User</option>
    <option value="project">Project</option>
  </select>

  <button type="submit">Search</button>
</form>

<?php if (!empty($viewVar['results'])) : ?>
  <?php foreach ($viewVar['results'] as $result) : ?>
    <?php if ($viewVar['type'] === 'user') : ?>
      <div>
        <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $result->getIdUser() ?>">
          <p>
            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $result->getAvatar(); ?>" width="30px" height="30px" alt="Foto de Perfil">
            <?= $result->getNickname(); ?> #<?= $result->getTag(); ?>
          </p>
        </a>
      </div>
    <?php elseif ($viewVar['type'] === 'project') : ?>
      <div>
        <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $result->getUser()->getAvatar(); ?>" width="30px" height="30px" alt="Foto de Perfil">
        <?= $result->getUser()->getNickname() ?> #<?= $result->getUser()->getTag() ?> <br>

        <div class="card-project">
          <strong><?= $result->getTitle() ?></strong> <br>
          <strong><?= $result->getDescription() ?></strong> <br>
          <strong><?= $result->getCreated_At()->format('d/m/Y H:i:s') ?></strong> <br>

          <?php if ($result->hasImages()) { ?>
            <div class="result-images">
              <?php foreach ($result->getImages() as $image) { ?>
                <img src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
              <?php } ?>
            </div>
          <?php } ?>

          <?php if ($result->hasFiles()) { ?>
            <div class="result-files">
              <?php foreach ($result->getFiles() as $file) { ?>
                <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download><?= $file->getFile() ?></a><br>
              <?php } ?>
            </div>
          <?php } ?>

          <?php if ($result->hasHashtags()) : ?>
            <div class="result-hashtags">
              <?php foreach ($result->getHashtags() as $hashtagProject) : ?>
                <span>#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php else : ?>
  <p>No results found.</p>
<?php endif; ?>