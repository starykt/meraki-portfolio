<link href="http://<?php echo APP_HOST; ?>/public/css/tool-style.css" rel="stylesheet">

<body>
  <div class="container">
    <div class="tool-form-container">
      <form action="http://<?= APP_HOST ?>/tool/save" method="post" enctype="multipart/form-data" class="tool-form">
        <input type="text" id="caption" name="caption" placeholder="Name" required style="margin-left:32px;">
        <input type="color" id="color" name="color" required>
        <div id="fileImageContainer">
          <input type="file" id="image" name="image" accept="image/*" multiple>
            <img src="/public/images/icons/upImageIcon.png"></img>
          </input>
        </div>
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
              <a href="http://<?php echo APP_HOST; ?>/tool/drop/<?= $tools[$j]->getIdTool() ?>">
              <button class="button-close">
                <div class="delete-tool-button">
                  <img src="/public/images/icons/deleteIcon.png"></img>
                </div>
              </button>
          </a>
              <div class="tool-item">
                <div class="wrapper-tool-caption">
                  <div class="tool-caption" style="background-color: <?= $tools[$j]->getColor() ?>;">
                    <button class="edit-button" onclick="openModalEdit(<?= $tools[$j]->getIdTool() ?>)">
                      <img class="edit-icon" style="width: 25px; height: 28px; flex-shrink: 0; fill: #1E1E1E;" src="\public\images\icons\penIcon.png" alt="Ícone"> </img>
                    </button>
                    <p>
                      <?= $tools[$j]->getCaption() ?>
                    </p>
                  </div>
                </div>
                <img src="http://<?php echo APP_HOST; ?>/public/images/tools/<?= $tools[$j]->getIcon() ?>" class="tool-image" width="100" height="100">
              </div>
            </div>


            <div id="editModal_<?= $tools[$j]->getIdTool() ?>" class="modal-background" style="display:none;">
              <div class="modal-content modal-content-edit">
                <h2 class="modal-text">MAKE YOUR CHANGES</h2>
                <form action="http://<?= APP_HOST ?>/tool/update" method="POST" enctype="multipart/form-data" class="tool-form-edit">
                  <div class="edit-content">
                    <div class="form-container">
                      <div class="inputs-modal">
                        <div class="white-overlay">
                          <input type="text" value="<?= $tools[$j]->getCaption() ?>" class="modal-input" style="cursor: default; text-align: center; margin: 0;" disabled />
                        </div>
                        <input type="text" id="caption" placeholder="New name here." value="<?= $tools[$j]->getCaption() ?>" name="caption" class="modal-input" style="cursor: text;" required>
                      </div>
                      <label for="color">Select new color: </label>
                      <input type="color" id="color" name="color" value="<?= $tools[$j]->getColor() ?>" class="modal-input" style="margin-left:20px; width:200px;" required>
                    </div>
                    <div class="form-container-2">
                      <div id="fileInputContainer">
                        <input type="file" id="icon" name="icon" accept="image/*" multiple>
                        <img src="/public/images/icons/upImageIcon.png"></img>
                        </input>
                      </div>
                      <input type="hidden" name="idTool" value="<?= $tools[$j]->getIdTool() ?>">

                      <div class="buttons-modal">
                        <button type="submit" class="tool-create-button-yes">YES</button>
                        <button type="button" class="tool-create-button-no" onclick="closeModalEdit(<?= $tools[$j]->getIdTool() ?>)">NO</button>
                      </div>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          <?php endfor; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  </body>
</html>
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