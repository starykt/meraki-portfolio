<script src="https://cdn.socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>
<script>
    var URL = "http://172.16.3.82:3000";
    var socket = io(URL);
    
    let sessionID = "Nicole";

    if (sessionID) {
        socket.auth = {
            sessionID
        };
        socket.connect();
        console.log(socket)
    }
    
    socket.on("session", ({
        sessionID,
        userID
    }) => {
        socket.auth = {
            sessionID
        };
        localStorage.setItem("sessionID", sessionID);
        socket.userID = userID;
    });

    socket.on("connect_error", (err) => {
        if (err.message === "invalid username") {
        }
    });
</script>

<!-- 

<?php if (isset($viewVar['conversations']) && is_array($viewVar['conversations'])) { ?>
    <ul>
        <?php foreach ($viewVar['conversations'] as $conversation) { ?>
            <li>
                Conversation ID: <?= $conversation->getIdConversation() ?><br>
                User 1 ID: <?= $conversation->getUser1()->getIdUser() ?><br>
                User 2 ID: <?= $conversation->getUser2()->getIdUser() ?><br>
                Created At: <?= $conversation->getCreatedAt() ?><br>
                <a href="http://<?= APP_HOST ?>/conversation/chat/<?= $conversation->getIdConversation() ?>">Ver Conversa</a>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>Nenhuma conversa encontrada.</p>
<?php } ?> -->