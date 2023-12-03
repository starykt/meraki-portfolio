<!-- Adicione isso ao início do seu arquivo listNotifications.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Notificações</title>
  <link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
</head>

<body>
  <!-- Adicione o conteúdo da lista de notificações aqui -->
  <div class="modal-background">
    <div class="notifications">
      <?php if (empty($viewVar['notifications'])) : ?>
        <div class="full-notification">
          <div class="one-notification-background"></div>
          <div class="one-notification">
            <p>No notification available.</p>
          </div>
        </div>
      <?php else : ?>
        <?php foreach ($viewVar['notifications'] as $notification) : ?>
          <div class="full-notification">
            <div class="one-notification-background"></div>
            <div class="one-notification">
              <img src="<?php echo $notification['icon']; ?>" />
              <p><?= $notification['notification']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>
