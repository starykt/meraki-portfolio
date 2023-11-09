<h1>Top 5 Usuários por Nível</h1>
<table border="1">
  <thead>
    <tr>
      <th>Posição</th>
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
          <td><?= $user->getNickname() ?></td>
          <td><?= $user->getLevel() ?></td>
        </tr>
    <?php
      } else {
        if ($viewVar['userPosition'] > 5) { // Verifica se o usuário logado está abaixo do top 5
    ?>
          <tr>
            <td>.....</td>
            <td>......</td>
            <td>.....</td>
          </tr>
          <tr>
            <td><?= $viewVar['userPosition'] ?></td>
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
