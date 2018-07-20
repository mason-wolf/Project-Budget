<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();

    if(isset($_POST['addincome'])) {
  
      $amount = $_POST['amount'];
      $date = $_POST['date'];
      $addexpense = mysqli_query($connection, "insert into transactions (owner, date, income) VALUES ('" . $user . "', '" . $date . "','" . $amount . "')");
      $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status ='primary'");
      $balance = mysqli_fetch_assoc($balanceQuery);
      $remainingBalance = $balance['balance'] + $amount;
      $updateBalanceQuery = mysqli_query($connection, "update accounts set balance ='" . $remainingBalance . "' where owner='" . $user . "' and status='primary'");
  }
 ?>


<div class="col-12" style="padding:0px;">
  <div class="col-7 center shadow" style="padding:1em;">
  
  <h2 style="margin-bottom:25px;margin-top:25px;">Dashboard <i class="fas fa-chart-bar" style="color:#1c4418;margin-left:10px;"></i></h2>


    <!-- widgets -->
    <?php include('Widgets.php'); ?>
    
    <!-- recent spending -->
    <?php include('RecentSpending.php'); ?>

    <!-- projected spending -->
    <?php include('ProjectedSpending.php');?>
    
    <!-- transactions -->
    <?php include('Transactions.php');?>

    <!-- income management -->
    <?php include('AddIncome.php'); ?>

  </div>

</div>
