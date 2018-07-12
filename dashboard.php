<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();
 ?>

<div class="col-12" style="padding:0px;">
  <div class="col-7 center shadow" style="padding:1em;">

    <!-- projected spending -->
    <?php include('ProjectedSpending.php');?>

    <!-- recent spending -->
    <?php include('RecentSpending.php'); ?>

    <!-- transactions -->
    <?php include('Transactions.php');?>

    
  </div>
</div>