<?php

  include 'header.php';
  session_start();
  
  if(isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
  }

  else {
      header('location: index.php');
  }

 ?>

<div class="col-12">
<div class="col-6 center" style="text-align:center;">
    <div class="col-12">
    You currently have no account activity.</br></br>
    <a href="addexpense.php">Add Expenses</a> or <a href="">Create a Budget</a>
    </div>
</div>
</div>

