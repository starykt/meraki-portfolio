<h1>Top 5 Usuários por Likes</h1>
<table border="1">
  <thead>
    <tr>
      <th>Posição</th>
      <th>Avatar</th>
      <th>Nome</th>
      <th>Quantidade de likes</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $userCount = 0;
    $loggedInUserShown = false;

    foreach ($viewVar['topUsers'] as $index => $user) :
      if ($userCount < 5) {
        $userCount++;
    ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><img id="avatarImage" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="30px" height="30px"><br></td>
          <td><?= $user->getNickname() ?></td>
          <td><?= $user->getLikes() ?></td>
        </tr>
        <?php
      } elseif (!$loggedInUserShown && isset($viewVar['userPosition'])) {
        if ($index + 1 == $viewVar['userPosition']) {
          $loggedInUserShown = true;
        ?>
          <tr>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
          </tr>
          <tr>
            <td><?= $viewVar['userPosition'] ?></td>
            <td><img id="avatarImage" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="30px" height="30px"><br></td>
            <td><?= $user->getNickname() ?></td>
            <td><?= $user->getLikes() ?></td>
          </tr>
      <?php
        }
      } else {
        break;
      }
    endforeach;

    if (!$loggedInUserShown && isset($viewVar['userPosition'])) {
      ?>
      <tr>
        <td><?= $viewVar['userPosition'] ?></td>
        <td><img id="avatarImage" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="30px" height="30px"><br></td>
        <td><?= $user->getNickname() ?></td>
        <td><?= $user->getLikes() ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>