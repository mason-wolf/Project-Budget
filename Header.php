<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="main.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo:100" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet"> 
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="main.js"></script>
    <?php
      include 'connection.php';
      date_default_timezone_set('America/Chicago');
      $today = date("Y-m-d");
    ?>
  </head>
  <body>
  <div class="col-12 nav">
      <div class="nav-header">PB</div>
      <button class="nav-toggle" onclick="toggleNav()"><i class="fas fa-bars"></i></button>
      <div class="col-2 nav-dropdown" id="nav" style="display:none;">
        <a href="index.php">Home</a>
      </div>
  </div>

