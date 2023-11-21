<body>
  <h1>Top 3 Usuários por Awards</h1>
  <table border="1">
    <thead>
      <tr>
        <th>Posição</th>
        <th>Avatar</th>
        <th>Nome do Usuário</th>
        <th>Quantidade de Awards</th>
      </tr>
    </thead>
    <tbody>
      <?php
      usort($viewVar['topUsers'], function ($a, $b) {
        return $b->getAwards() - $a->getAwards();
      });
      $loggedInUserId = $viewVar['loggedInUser'] ? $viewVar['loggedInUser']->getIdUser() : null;
      $loggedInUserInTop3 = false;
      for ($i = 0; $i < min(count($viewVar['topUsers']), 3); $i++) :
      ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsers'][$i]->getAvatar() ?>" width="30px" height="30px"></td>
          <td><?= $viewVar['topUsers'][$i]->getNickname() ?></td>
          <td><?= $viewVar['topUsers'][$i]->getAwards() ?></td>
        </tr>
        <?php

        if ($viewVar['topUsers'][$i]->getIdUser() === $loggedInUserId) {
          $loggedInUserInTop3 = true;
        }
        ?>
      <?php
      endfor;
      ?>

      <?php if (!$loggedInUserInTop3 && $viewVar['userPosition'] <= 3) : ?>
        <tr>
          <td><?= $viewVar['userPosition'] ?></td>
          <?php if ($viewVar['loggedInUser'] !== null) : ?>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['loggedInUser']->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['loggedInUser']->getNickname() ?></td>
            <td><?= $viewVar['loggedInUserAwards'] ?></td>
          <?php else : ?>
            <td colspan="3">Usuário logado não encontrado.</td>
          <?php endif; ?>
        </tr>
      <?php elseif ($viewVar['userPosition'] > 3) : ?>
        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
        </tr>
        <tr>
          <td><?= $viewVar['userPosition'] ?></td>
          <?php if ($viewVar['loggedInUser'] !== null) : ?>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['loggedInUser']->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['loggedInUser']->getNickname() ?></td>
            <td><?= $viewVar['loggedInUserAwards'] ?></td>
          <?php else : ?>
            <td colspan="3">Usuário logado não encontrado.</td>
          <?php endif; ?>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</body>
