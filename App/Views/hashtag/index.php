<link rel="stylesheet" href="\public\css\style-hashtag.css" />

<body>
    <div id="blurLayer" class="blur-layer"></div>
    <div id="content-wrapper">
        <div id="form-container">
            <form action="http://<?php echo APP_HOST; ?>/hashtag/save" method="post">
                <input id="hashtag-input" type="text" name="hashtag" placeholder="Name" required>
                <button class="not-a-player-button" type="submit">CREATE HASHTAG</button>
            </form>
        </div>
        <hr style="color:#FFF;">
        <?php if ($Sessao::retornaMensagem()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= $Sessao::retornaMensagem() ?>
                <br>
            </div>
        <?php } ?>

        <div class="container">
            <?php
            $hashtags = $viewVar['listHashtag'];
            $chunks = array_chunk($hashtags, ceil(count($hashtags) / 2));

            foreach ($chunks as $column) {
                echo '<div class="column">';
                foreach ($column as $hashtag) {
                    echo '<div class="card-hashtag">
                            <div class="icon">
                                <div class="icon-content">
                                    <button class="edit-button" onclick="openModalEdit(' . $hashtag->getIdHashtag() . ')">
                                        <img class="edit-icon" src="\public\images\icons\penIcon.png" alt="Ícone">
                                    </button>                  
                                </div>
                            </div>   
                            <p style="margin: 0;">#' . $hashtag->getHashtag() . '</p>
                            <button class="delete-button" onclick="openModalDelete(' . $hashtag->getIdHashtag() . ')">
                            <img src="\public\images\excluir.png" alt="Ícone" width="40px" height="40px"
                                style="filter: drop-shadow(5px 5px rgba(0, 0, 0, 0.25)); margin-bottom:40px; margin-right:0px;">
                                </button>
                          </div>';


                    // ---------------------Modal de Edição --------------------------
                    echo '<div id="editModal_' . $hashtag->getIdHashtag() . '" class="modal">
                    <div class="modal-content-edit">
                        <div class="edit-modal-title">Rename hashtag</div>
                        <div class="edit-modal-input-container">
                            <input type="text" value="#' . $hashtag->getHashtag() . '" id="hashtag" name="hashtag" readonly class="edit-modal-input">
                        </div>
                        
                        <form action="http://' . APP_HOST . '/hashtag/editHashtag?idHashtag=' . $hashtag->getIdHashtag() . '" method="POST">
                            <input type="text" id="hashtag" name="hashtag" class="edit-field" placeholder="#INSERTNEW" required>
                            
                            <div class="edit-modal-buttons">
                                <button type="submit" class="edit-modal-yes">YES</button>
                            </form>
                            
                            <button class="edit-modal-no" onclick="closeModalEdit(' . $hashtag->getIdHashtag() . ')">NO</button>
                        </div>
                    </div>
                </div>
            
            

                        <div id="deleteModal_' . $hashtag->getIdHashtag() . '" class="modal">
                        <div class="modal-content">
        <div class="delete-modal-title">Delete this hashtag?</div>
        <div class="delete-modal-input-container">
            <input type="text" value="#' . $hashtag->getHashtag() . '" id="hashtag" name="hashtag" readonly class="delete-modal-input">
        </div>
        <img src="\public\images\icons\warningIcon.png" class="image" alt="Warning Icon">
        <div class="delete-modal-buttons">
        
                        <a href="http://' . APP_HOST . '/hashtag/deleteHashtag?idHashtag='. $hashtag->getIdHashtag() . '" style="color:transparent;">
                    
                        <button class="delete-modal-yes">YES</button>
                    </a>
            
            <button class="delete-modal-no" onclick="closeModalDelete('. $hashtag->getIdHashtag() .')">NO</button>
        </div>
                        </div>
                    </div>

                    ';
                }
                echo '</div>';
            }
                    ?>
        </div>

    </div>
    <img src="\public\images\nyancat.gif" alt="GIF Description" style="width:1095px; height: 431px;
flex-shrink: 0; z-index:4001; position:relative; ">
    <script>
        function openModalDelete(id) {
            document.getElementById('deleteModal_' + id).style.display = 'flex';
            modal.classList.add('active');
            document.getElementById('blurLayer').classList.add('blurred');
        }

        function closeModalDelete(id) {
            document.getElementById('deleteModal_' + id).style.display = 'none';
            document.getElementById('blurLayer').classList.remove('blurred');
        }

        function openModalEdit(id) {
            document.getElementById('editModal_' + id).style.display = 'flex';
            modal.classList.add('active');
            document.getElementById('blurLayer').classList.add('blurred');
        }

        function closeModalEdit(id) {
            document.getElementById('editModal_' + id).style.display = 'none';
            document.getElementById('blurLayer').classList.remove('blurred');
        }
    </script>
</body>

</html>