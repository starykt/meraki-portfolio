<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Lateral</title>
  <link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <div class="menu-icon" onclick="toggleSidebar()">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav class="sidebar" id="sidebar">
    <ul>
      <li><a href="#">Opção 1</a></li>
      <li><a href="#">Opção 2</a></li>
      <li><a href="#">Opção 3</a></li>
      <li><a href="http://<?= APP_HOST ?>/login/logout">Sair</a></li>
    </ul>
  </nav>

  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("show");
    }
  </script>
</body>