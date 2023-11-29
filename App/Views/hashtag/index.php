<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\public\css\style-hashtag.css" />
</head>

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
                                        <img class="edit-icon" src="\public\images\ferramenta-lapis.png" alt="Ícone">
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
                            <div class="modal-content">
                                <span class="close" onclick="closeModalEdit(' . $hashtag->getIdHashtag() . ')">&times;</span>
                                <h2>Edit Hashtag</h2>
                                <!-- Conteúdo do modal de edição aqui -->
                                <p>Conteúdo do modal de edição para a hashtag ' . $hashtag->getHashtag() . '</p>
                            </div>
                        </div>

                        <div id="deleteModal_' . $hashtag->getIdHashtag() . '" class="modal">
                        <div class="modal-content" style="width: 890px; height: 250px; flex-shrink: 0; border-radius: 40px; background: #1E1E1E;">
                            <span class="close" onclick="closeModalDelete(' . $hashtag->getIdHashtag() . ')">&times;</span>
                            <h2 style="color: #FFF; font-family: Inter; font-size: 42px; font-style: normal; font-weight: 700; line-height: normal;">Delete this hashtag?</h2>
                            <p style="color: #FFF; font-family: Inter; font-size: 32px; font-style: normal; font-weight: 700; line-height: normal;">
                                <input type="text" value="' . $hashtag->getHashtag() . '" id="hashtag" name="hashtag" readonly>
                            </p>
                            <div>
                                <button style="width: 115px; height: 43px; flex-shrink: 0;" onclick="deleteHashtag(' . $hashtag->getIdHashtag() . ')">Yes</button>
                                <button style="width: 115px; height: 43px; border-radius: 50px; background: rgba(50, 165, 178, 0.80); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); flex-shrink: 0;" onclick="closeModalDelete(' . $hashtag->getIdHashtag() . ')">No</button>
                            </div>
                        </div>
                    </div>';
                }
                echo '</div>';
            }
            ?>
        </div>

    </div>
    <img src="\public\images\nyancat.gif" alt="GIF Description" style="width:1095px; height: 431px;
flex-shrink: 0; z-index:4001; position:relative;">
    <script>
        function openModalDelete(id) {
            document.getElementById('deleteModal_' + id).style.display = 'flex';
            document.getElementById('blurLayer').classList.add('blurred');
        }

        function closeModalDelete(id) {
            document.getElementById('deleteModal_' + id).style.display = 'none';
            document.getElementById('blurLayer').classList.remove('blurred');
        }

        function openModalEdit(id) {
            document.getElementById('editModal_' + id).style.display = 'flex';
            document.getElementById('blurLayer').classList.add('blurred');
        }

        function closeModalEdit(id) {
            document.getElementById('editModal_' + id).style.display = 'none';
            document.getElementById('blurLayer').classList.remove('blurred');
        }
    </script>
</body>

</html>