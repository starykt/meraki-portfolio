<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ferramenta</title>
</head>

<body>
    <h1>Registrar Nova Ferramenta</h1>

    <?php
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        echo '<div style="color: red;">';
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
        unset($_SESSION['errors']);
    }
    ?>

    <form action="http://<?= APP_HOST ?>/tool/save" method="POST" enctype="multipart/form-data">
        <label for="icon">Ícone:</label>
        <input type="file" name="icon" id="icon" accept="image/*" required><br>

        <label for="caption">Legenda:</label>
        <input type="text" name="caption" id="caption" required><br>

        <button type="submit">Registrar Ferramenta</button>
    </form>
</body>

</html>
