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
          <p>  <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $result->getAvatar(); ?>" width="30px" height="30px" alt="Foto de Perfil">
              <?= $result->getNickname(); ?> #<?= $result->getTag(); ?> </p>
              </a>
            </div>
        <?php elseif ($viewVar['type'] === 'project') : ?>
            <div>
                <h2><?= $result->getTitle(); ?></h2>
                <p><?= $result->getDescription(); ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <p>No results found.</p>
<?php endif; ?>
