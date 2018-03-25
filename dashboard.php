<?php

  include 'header.php';
  session_start();
  if(isset($_SESSION['user'])) {

      $user = $_SESSION['user'];
      $accountquery = mysqli_query($connection, "select * from accounts where owner='" . $user . "' and status='primary'");
      $recordcount = mysqli_num_rows($accountquery);
      if($recordcount < 1) {
          header('location: login.php');
      }
  }

 ?>

<div class="col-12">
<div class="col-8 center">
    <div class="col-4" style="text-align:center;"><h2>Remaining Funds</h2></div>
    <div class="col-2" style="text-align:center;"><h2>$1000</h2></div>
    <div class="col-12" style="font-size:14px;text-align:center;"><a href="">Add expenses</a> or <a href="createbudget.php">Create a budget</a></div>
    
</div>
</div>

