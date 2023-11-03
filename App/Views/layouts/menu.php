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
  <div class="menu-icon" onclick="toggleSidebar()">
    <img src="/public/images/menuIcon.png" />
  </div>
  <nav class="sidebar" id="sidebar">
    <ul>
      <li><a href="#"><img src="/public/images/" /></a></li>
      <li><a href="#"><img src="/public/images/" /></a></li>
      <li><a href="#"><img src="/public/images/" /></a></li>
      <li><a href="#"><img src="/public/images/" /></a></li>
      <li><a href="#"><img src="/public/images/" /></a></li>
      <li><a href="http://<?= APP_HOST ?>/login/logout"><img src="/public/images/" /></a></li>
    </ul>
  </nav>

  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("show");
    }
  </script>
</body>