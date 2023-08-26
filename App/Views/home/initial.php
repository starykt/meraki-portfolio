<body>

<a href="http://<?= APP_HOST ?>/hashtag">
    <button class="not-a-player-button">Cadastrar Hashtag</button>
  </a>

  <input type="text" placeholder="Its me... Mario?" onclick="openModal()" class="short-input">
  <div class="modal-bg" id="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2>Título</h2>
      <input type="text" placeholder="Digite o título">

      <h2>Descrição</h2>
      <textarea placeholder="Digite a descrição"></textarea>

      <div class="side-icons">
        <div class="file-icon">
          <label for="image-input">
            <i class="fas fa-image fa-3x"></i>
          </label>
          <input type="file" id="image-input" accept="image/*">
        </div>

        <div class="file-icon">
          <label for="file-input">
            <i class="fas fa-paperclip fa-3x"></i>
          </label>
          <input type="file" id="file-input">
        </div>

        <div class="emoji-icon">
          <label for="emoji-input">
            <i class="fas fa-smile fa-3x"></i>
          </label>
          <input type="text" id="emoji-input" placeholder="Digite o emoji">
        </div>

        <button class="submit-btn">Enviar</button>
      </div>
    </div>
  </div>



  <script>
    function openModal() {
      var modal = document.getElementById("modal");
      modal.style.display = "block";
    }

    function closeModal() {
      var modal = document.getElementById("modal");
      modal.style.display = "none";
    }
  </script>
</body>
</div>
</body>