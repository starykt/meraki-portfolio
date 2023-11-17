<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br>
<form method="post" action="http://<?php echo APP_HOST; ?>/challenge/updateChallenge/<?= $viewVar['challenge']->getIdChallenge(); ?>" enctype="multipart/form-data">
  <label for="goal">Meta:</label>
  <input type="text" id="goal" name="goal" value="<?= $viewVar['challenge']->getGoal(); ?>" required><br>

  <label for="name">Nome do Desafio:</label>
  <input type="text" id="name" name="name" value="<?= $viewVar['challenge']->getName(); ?>" required><br>

  <label for="reward">Recompensa:</label>
  <input type="text" id="reward" name="reward" value="<?= $viewVar['challenge']->getReward(); ?>" required><br>

  <label for="deadline">Deadline:</label>
  <input type="date" id="deadline" name="deadline" required>

  <label for="banner">Banner (Imagem Atual):</label>
  <img src="http://<?php echo APP_HOST; ?>/public/images/challenges/<?= $viewVar['challenge']->getBanner(); ?>" width="100px" height="100px">
  <input type="file" id="banner" name="banner" accept="image/*"><br>

  <h2>Nova hashtag para desafio</h2>
  <div>
    <input type="text" name="hashtag" value="<?= $viewVar['hashtag']->getHashtag(); ?>" required>
  </div>

  <label for="description">Descrição do Prêmio:</label>
  <input type="text" id="description" name="description" value="<?= $viewVar['award']->getDescription(); ?>" required><br>

  <label for="imagePath">Imagem do Prêmio (Imagem Atual):</label>
  <img src="http://<?php echo APP_HOST; ?>/public/images/awards/<?= $viewVar['award']->getImagePath(); ?>" width="100px" height="100px">
  <input type="file" id="imagePath" name="imagePath" accept="image/*"><br>

  <input type="submit" value="Atualizar Desafio">
</form>