<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="\public\css\tool-style.css" />
  <style>
    body {
      margin-top: 296px;
      font-family: 'Inter', sans-serif;
    }

    .container {
      flex-wrap: wrap;
      justify-content: space-between;
      margin-left: 100px;
    }

    .row {
      display: flex;
      justify-content: space-between;
      width: 85%;
      margin-bottom: 20px;
    }

    .tool-container {
      background-color: #ffffff;
      border-radius: 20px;
      padding: 15px;
      margin-bottom: 15px;
      width: calc(33.33% - 20px);
      box-sizing: border-box;
      margin-left: 150px;
    }

    .tool-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }

    .tool-caption {
      border-radius: 10px;
      background: #32A5B2;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      width: 100%;
      height: 40.32px;
      flex-shrink: 0;
      color: #fff;
      font-size: 18px;
      font-weight: 700;
      line-height: normal;
      border: none;
      padding: 10px;
      margin-bottom: 10px;
    }

    .tool-icon {
      margin-bottom: 10px;
      cursor: pointer;
    }

    .tool-form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 50px;
    }

    .tool-form {
      width: 100%;
      display: flex;
    }

    .tool-form label {
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 18px;
      margin-bottom: 10px;
      flex-basis: 100%;
    }

    .tool-form input[type="text"],
    .tool-form input[type="color"],
    .tool-form input[type="file"] {
      border-radius: 50px;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      height: 48px;
      border: none;
      padding: 10px;
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      margin-bottom: 20px;
      margin-right: 20px;
      cursor: pointer;
    }

    .tool-form input[type="text"] {
      background: rgba(217, 137, 255, 0.50);
      width: 358px;
      height: 60px;
      flex-shrink: 0;
      margin-left: 120px;
      padding-left: 40px;
    }

    .tool-form input[type="color"] {
      width: 80px;
      height: 50px;
      margin-top: 10px;
      background-color: rgba(217, 137, 255, 0.50);
    }

    input::placeholder {
      color: white;
    }

    .tool-create-button {
      border-radius: 50px;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      width: calc(33.33% - 20px);
      margin-left: 200px;
      max-width: 300px;
      height: 62px;
      border: none;
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      cursor: pointer;
      background-color: #894DBC;
      margin-top: 20px;
    }

    .tools-list-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .tool-container {
      background-color: #ffffff;
      border-radius: 20px;
      padding: 15px;
      margin: 15px;
      width: calc(33.33% - 30px);
      box-sizing: border-box;
    }

    .tool-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }

    .tool-caption {
      border-radius: 10px;
      background: #32A5B2;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      width: 100%;
      height: 40.32px;
      flex-shrink: 0;
      color: #fff;
      font-size: 18px;
      font-weight: 700;
      line-height: normal;
      border: none;
      padding: 10px;
      margin-bottom: 10px;
    }

    .edit-button {
      background-color: #1E1E1E;
      border: none;
      cursor: pointer;
      border-radius: 50%;
      margin-top: 5px;
    }

    .tool-icon {
      margin-top: 10px;
    }

    .edit-content {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* Ajusta o estilo do texto dentro do botão de edição */
    .tool-caption-text {
      margin-top: 5px;
      /* Ajuste conforme necessário para o espaçamento desejado */
      color: #1E1E1E;
      /* Cor do texto */
      font-size: 14px;
      /* Tamanho da fonte do texto */
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }


    /* Seus estilos existentes */

    .modal-edit {
      width: 930px;
      height: 487px;
      flex-shrink: 0;
      border-radius: 20px;
      background: #1E1E1E;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: none;
      align-items: start;
    }

    .modal-content-edit {
      width: 100%;
      height: fit-content;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .modal-text {
      width: 513px;
      height: 47.231px;
      flex-shrink: 0;
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 42px;
      font-style: normal;
      font-weight: 700;
      line-height: normal;
    }

    .modal-input {
      width: 300.84px;
      height: 60.078px;
      flex-shrink: 0;
      border-radius: 50px;
      background: #32A5B2;
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      margin-bottom: 20px;
      padding: 10px;
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
    }

    .modal-input-color {
      display: flex;
      align-items: center;
      width: 300.84px;
      height: 60.078px;
    }

    .modal-input-color label {
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      margin-right: 10px;
    }

    .close-btn {
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .tool-create-button-yes {
      width: 168.574px;
      height: 71.452px;
      flex-shrink: 0;
      border-radius: 50px;
      background: rgba(255, 0, 0, 0.80);
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
      border: none;
    }

    .tool-create-button-no {
      width: 165.332px;
      height: 71.452px;
      flex-shrink: 0;
      border-radius: 50px;
      background: rgba(50, 165, 178, 0.80);
      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
      color: #FFF;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
      border: none;
    }

    .tool-form {
      display: flex;
    }

    .form-container {
      display: flex;
      align-items: center;
      width: 100%;
    }

    #fileInputContainer {
      display: flex;
      align-items: center;
      cursor: pointer;
      width: 50%;
    }

    #fileInputContainer img {
      margin-right: 10px;
      width: 120px;
      height: 120px;
    }

    /* Adiciona flex para centralizar os botões */
    .edit-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #selectedImage {
      display: block;
    }

    .buttons-modal {
      gap: 20px;
      display: flex;
      position: relative;
      justify-content: end;
      width: 50%;
    }

    #fileInputContainer input[type='file'] {
      left: 115px;
      width: 340px;
      height: 100px;
      color: #FFFFFF;
      position: absolute;
      background: none;
      box-shadow: none;
      border-radius: 0;
    }

    #fileInputContainer input[type='file']::-webkit-file-upload-button {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="tool-form-container">
      <form action="http://<?= APP_HOST ?>/tool/save" method="post" enctype="multipart/form-data" class="tool-form">
        <input type="text" id="caption" name="caption" placeholder="Name" required>
        <input type="color" id="color" name="color" required>
        <div class="tool-icon" onclick="document.getElementById('icon').click();">
          <img src="/public/images/icons/upImageIcon.png" alt="Escolher Imagem">
        </div>
        <input type="file" id="icon" name="icon" accept="image/*" style="display: none;" onchange="displayImage(this)">
        <img id="selectedImage" style="max-width: 40px; max-height: 40px; margin-left:50px; margin-bottom: 10px; display: none;"></img>
        <button type="submit" class="tool-create-button">CREATE TOOL</button>
      </form>
    </div>
    <hr style="color:#FFF;">
    <div class="tools-list-container">
      <?php $tools = $viewVar['tools']; ?>
      <?php for ($i = 0; $i < count($tools); $i += 3) : ?>
        <div class="row">
          <?php for ($j = $i; $j < $i + 3 && $j < count($tools); $j++) : ?>
            <div class="tool-container">
              <div class="tool-item">
                <strong class="tool-caption" style="background-color: <?= $tools[$j]->getColor() ?>;">
                  <button class="edit-button" onclick="openModalEdit(<?= $tools[$j]->getIdTool() ?>)">
                    <img class="edit-icon" style="width: 25px; height: 28px; flex-shrink: 0; fill: #1E1E1E;" src="\public\images\ferramenta-lapis.png" alt="Ícone"> </img>
                  </button> <?= $tools[$j]->getCaption() ?></strong>
                <img src="http://<?php echo APP_HOST; ?>/public/images/tools/<?= $tools[$j]->getIcon() ?>" class="tool-icon" width="100" height="100">
                <a href="http://<?= APP_HOST ?>/tool/alter/<?= $tools[$j]->getIdTool() ?>" class="tool-link">Editar</a>
                <a href="http://<?= APP_HOST ?>/tool/drop/<?= $tools[$j]->getIdTool() ?>" class="tool-link">Excluir</a>
              </div>
            </div>


            <div id="editModal_<?= $tools[$j]->getIdTool() ?>" class="modal modal-edit">
              <div class="modal-content modal-content-edit">
                <span class="close-btn" onclick="closeModalEdit(<?= $tools[$j]->getIdTool() ?>)">&times;</span>
                <h2 class="modal-text">MAKE YOUR CHANGES</h2>
                <form action="http://<?= APP_HOST ?>/tool/update" method="post" enctype="multipart/form-data" class="tool-form">
                  <div class="edit-content">
                    <div class="form-container">
                      <input type="text" id="caption" value="<?= $tools[$j]->getCaption() ?>" name="caption" class="modal-input" required>
                      <label for="color">Select Color: </label>
                      <input type="color" id="color" name="color" value="<?= $tools[$j]->getColor() ?>" class="modal-input" style="margin-left:20px; width:200px;" required>
                    </div>
                    <div class="form-container">
                      <div id="fileInputContainer" onclick="document.getElementById('icon').click();">
                        <input type="file" id="icon" name="icon" accept="image/*" multiple>
                        <img src="/public/images/icons/upImageIcon.png"></img>
                        </input>
                      </div>

                      <div class="buttons-modal">
                        <button type="submit" class="tool-create-button-yes">YES</button>
                        <button type="button" class="tool-create-button-no" onclick="closeModalEdit(<?= $tools[$j]->getIdTool() ?>)">NO</button>
                      </div>
                    </div>
                    <input type="hidden" name="idTool" value="<?= $tools[$j]->getIdTool() ?>">

                  </div>
                </form>

              </div>
            </div>
          <?php endfor; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <script>
    document.querySelector('#fileInputContainer').addEventListener('click', function() {
      document.querySelector('#icon').click();
    });

    function displayImage(input) {
      var file = input.files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('selectedImage').src = e.target.result;
          document.getElementById('selectedImage').style.display = 'block';
        }
        reader.readAsDataURL(file);
      }
    }

    function displayImageFromInput(input) {
      var file = input.files[0];
      if (file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
      }
    }
  </script>


  <script>
    // Função para abrir a modal de edição
    function openModalEdit(toolId) {
      var modalId = 'editModal_' + toolId; // Use o ID dinâmico
      var modal = document.getElementById(modalId);

      // Aqui você pode adicionar lógica para preencher os campos da modal com os dados existentes
      // Exemplo: document.getElementById('editCaption').value = valorExistente;

      modal.style.display = 'flex';
    }

    // Função para fechar a modal de edição
    function closeModalEdit(toolId) {
      var modalId = 'editModal_' + toolId;
      var modal = document.getElementById(modalId);
      modal.style.display = 'none';
    }
  </script>

</body>

</html>

</body>

</html>