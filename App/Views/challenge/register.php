<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br>
<br>
<br>
<form method="post" action="http://<?php echo APP_HOST; ?>/challenge/create" enctype="multipart/form-data">
  <label for="goal">Meta:</label>
  <input type="text" id="goal" name="goal" required><br>

  <label for="name">Nome do Desafio:</label>
  <input type="text" id="name" name="name" required><br>

  <label for="reward">Recompensa:</label>
  <input type="text" id="reward" name="reward" required><br>

  <label for="deadline">Deadline:</label>
  <input type="date" id="deadline" name="deadline" required>

  <label for="banner">Banner (Imagem):</label>
  <input type="file" id="banner" name="banner" accept="image/*" required><br>

  <h2>Nova hashtag para desafio</h2>
  <div>
    <input type="text" name="hashtag" placeholder="Hashtag" required>
  </div>

  <label for="description">Descrição do Prêmio:</label>
  <input type="text" id="description" name="description" required><br>

  <label for="imagePath">Imagem do Prêmio (Imagem):</label>
  <input type="file" id="imagePath" name="imagePath" accept="image/*" required><br>

  <input type="submit" value="Criar Desafio">
</form>