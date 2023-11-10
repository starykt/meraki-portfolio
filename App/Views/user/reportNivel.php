<h1>Top 5 Usuários por Nível</h1>
<table border="1">
  <thead>
    <tr>
      <th>Posição</th>
      <th>Avatar</th>
      <th>Nome do Usuário</th>
      <th>Nível</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $userCount = 0;
    foreach ($viewVar['topUsers'] as $index => $user) :
      if ($userCount < 5) {
        $userCount++;
    ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><img id="avatarImage" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="30px" height="30px"><br></td>
          <td><?= $user->getNickname() ?></td>
          <td><?= $user->getLevel() ?></td>
        </tr>
    <?php
      } else {
        if ($viewVar['userPosition'] > 5) { 
    ?>
          <tr>
            <td>.....</td>
            <td>......</td>
            <td>.....</td>
          </tr>
          <tr>
            <td><?= $viewVar['userPosition'] ?></td>
            <td><img id="avatarImage" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="30px" height="30px"><br></td>
            <td><?= $user->getNickname() ?></td>
            <td><?= $user->getLevel() ?></td>
          </tr>
    <?php
        }
        break;
      }
    endforeach;
    ?>
  </tbody>
</table>
