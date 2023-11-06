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

<br>

<br>

<br>


<form method="post" action="http://<?php echo APP_HOST; ?>/user/update" enctype="multipart/form-data">
    <div >
    <label for="nickname">Nickname:</label>
    <input type="text" id="nickname" name="nickname" value="<?= $viewVar['user']->getNickname() ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?=$viewVar['user']->getEmail() ?>" required><br>

    <label for="resume">Resumo:</label>
    <textarea id="resume" name="resume"><?=$viewVar['user']->getResume() ?></textarea><br>

    <label for="location">Localização:</label>
    <input type="text" id="location" name="location" value="<?=$viewVar['user']->getLocation() ?>"><br>

    <label for="avatar">Avatar:</label>
    <input type="file" id="avatar" name="avatar" accept="image/*" ><br>
    <input type="submit" value="Salvar"style="margin-top:300px">
    </div>
</form>
