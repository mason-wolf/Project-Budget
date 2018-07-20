<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();
 ?>


<div class="col-12" style="padding:0px;">


  <div class="col-7 center shadow" style="padding:1em;">
  <h2 style="margin-bottom:25px;margin-top:25px;">Dashboard</h2>
    <!-- widgets -->
    <?php include('Widgets.php'); ?>
    
    <!-- recent spending -->
    <?php include('RecentSpending.php'); ?>

    <!-- projected spending -->
    <?php include('ProjectedSpending.php');?>
    
    <!-- transactions -->
    <?php include('Transactions.php');?>

  </div>

</div>
