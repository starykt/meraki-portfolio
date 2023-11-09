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
    <div>
        <label for="nickname">Nickname:</label>
        <input type="text" id="nickname" name="nickname" value="<?= $viewVar['user']->getNickname() ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $viewVar['user']->getEmail() ?>" required><br>

        <label for="resume">Resumo:</label>
        <textarea id="resume" name="resume"><?= $viewVar['user']->getResume() ?></textarea><br>

        <label for="location">Localização:</label>
        <input type="text" id="location" name="location" value="<?= $viewVar['user']->getLocation() ?>"><br>

        <label for="avatar">Avatar:</label>
        <input type="file" id="avatar" name="avatar" accept="image/*"><br>

        <label for="tools">Ferramentas:</label>
        <?php foreach ($viewVar['userTools'] as $tool) : ?>
            <div>
                <h3>Ferramenta: <?= $tool->getCaption() ?></h3>
                <img id="avatarImage" src="http://<?php echo APP_HOST; ?>/public/images/tools/<?= $tool->getIcon() ?>" width="20px" height="20px"><br>
                <a href="http://<?php echo APP_HOST; ?>/user/deleteTool/?idTool=<?= $tool->getIdTool() ?>">Deletar</a>
            </div>
        <?php endforeach; ?>


        <br>
        <label for="tools">Ferramentas:</label>
        <select name="tools[]" id="tools" multiple>
            <?php
            foreach ($viewVar['tools'] as $tool) {
                $selected = in_array($tool->getIdTool(), array_column($viewVar['userTools'], 'idTool')) ? 'selected' : '';
                echo '<option value="' . $tool->getIdTool() . '" ' . $selected . '>' . $tool->getCaption() . '</option>';
            }
            ?>
        </select><br>


        <input type="submit" value="Salvar" style="margin-top:300px">


    </div>
</form>