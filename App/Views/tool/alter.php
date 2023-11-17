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

<form action="http://<?= APP_HOST ?>/tool/update" method="POST" enctype="multipart/form-data">
    <div>
        <label for="icon">Ícone:</label>
        <img src="http://<?php echo APP_HOST; ?>/public/images/tools/<?php echo $viewVar['tool']->getIcon(); ?>" width="200" height="200"> <br>
        <input type="file" name="icon" id="icon" accept="image/*">
    </div>

    <div>
        <label for="caption">Legenda</label>
        <input type="text" name="caption" id="caption" value="<?php echo $viewVar['tool']->getCaption(); ?>" required>
    </div>
    <label for="color">Cor:</label>
        <input type="color" name="color" id="color" value="#000000" required><br>

    <input type="hidden" name="idTool" value="<?php echo $viewVar['tool']->getIdTool(); ?>">

    <div>
        <button type="submit">Atualizar Ferramenta</button>
    </div>
</form>
