<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Challenge Details</title>
</head>

<body>
  <div style="margin-left: 200px;">
    <h2>Challenge Details</h2>
    <?= $viewVar["challenge"]->getIdChallenge() ?> <br>
    <?= $viewVar["challenge"]->getName() ?><br>
    <?= $viewVar["challenge"]->getGoal() ?><br>
    <?= $viewVar["challenge"]->getReward() ?><br>
    <?= $viewVar["challenge"]->getBanner() ?><br>

    <p><?= $viewVar["challenge"]->getHashtag()->getHashtag(); ?></p>

    <h2>Awards</h2>
    <?php foreach ($viewVar["award"] as $award) { ?>
      <p><?= $award->getDescription(); ?></p>
    <?php } ?>


    <?php foreach ($viewVar["listProject"] as $project) { ?>
      <div class="project">
        <h2><?= $project->getTitle(); ?></h2>
        <P><?= $project->getDescription(); ?></P>

        <h3>Project User</h3>

        <p>User ID: <?= $project->getUser()->getIdUser(); ?></p>
        <p>Nickname: <?= $project->getUser()->getNickname(); ?></p>
        <p>Tag: <?= $project->getUser()->getTag(); ?></p>
        <p>AVATAR URL: <?= $project->getUser()->getAvatar(); ?></p>




        <h3>Comments</h3>
        <?php foreach ($project->getComments() as $comment) { ?>
          <div class="comment">
            <p><?= $comment->getText(); ?></p>
            <?php if ($comment->getUser()->getIdUser() == $_SESSION['idUser']) { ?>
              <button onclick="deleteComment(<?= $comment->getIdComment(); ?>, <?= $project->getIdProject(); ?>)">Delete Comment</button>
            <?php } ?>
          </div>
        <?php } ?>

        <form action="/project/comment/<?= $project->getIdProject(); ?>" method="post">
          <input type="text" name="text" placeholder="Add a comment">
          <button type="submit">Comment</button>
        </form>
      </div>
    <?php } ?>



</body>

</html>