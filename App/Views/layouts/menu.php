<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Lateral</title>
  <link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
</head>

<body>
  <div class="menu-icon">
    <a href="http://<?= APP_HOST ?>/project">
      <div class="logo-menu">
      </div>
    </a>
  </div>
  <nav class="sidebar" id="sidebar">
    <ul>
      <li><a href="http://<?php echo APP_HOST; ?>/project/search"><img src="/public/images/menu/searchIcon.png" /></a></li>
      <li><a href="http://<?php echo APP_HOST; ?>/project/listNotifications"><img src="/public/images/menu/notificationIcon.png" /></a>
      </li>
      <li><a href="http://<?php echo APP_HOST; ?>/conversation/conversations"><img src="/public/images/menu/chatIcon.png" /></a></li>
      <li><a href="http://<?php echo APP_HOST; ?>/project/mostRecentSavedProjects"><img src="/public/images/menu/saveIcon.png" /></a></li>
      <li><a href="http://<?= APP_HOST ?>/user/profile"><img src="/public/images/menu/accountIcon.png" /></a></li>
      <li><a href="http://<?= APP_HOST ?>/login/logout"><img src="/public/images/menu/logoutIcon.png" /></a></li>

      <button onclick="showMoreOptions()">
        <li class="expandable"><a href="#"><img src="/public/images/menu/expandIcon.png" /></a>
          <ul class="more-itens" id="more-options" style="display: none;">
            <li><a href="http://<?php echo APP_HOST; ?>/challenge/index">Challenges</a></li>
            <li><a href="http://<?= APP_HOST ?>/user/userFight">User Fight</a></li>
            <?php if ($viewVar['userLoggedin']->getAdmin() == true) { ?>
              <li><a href="http://<?php echo APP_HOST; ?>/tool">New tools</a></li>
              <li><a href="http://<?php echo APP_HOST; ?>/admin/listReports">Complaints</a></li>
              <li><a href="http://<?php echo APP_HOST; ?>/hashtag">New hashtags</a></li>
            <?php } ?>
          </ul>
        </li>
      </button>
    </ul>
  </nav>

  <script>
    var displayState = false;

    function showMoreOptions() {
      var moreOptions = document.getElementById("more-options");

      if (displayState) {
        moreOptions.style.display = "none";
      } else {
        moreOptions.style.display = "grid";
      }

      displayState = !displayState;
    }
  </script>