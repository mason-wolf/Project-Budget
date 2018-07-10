<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();
 ?>

<div class="col-12">
  <div class="col-7 center shadow">

    <!-- recent spending -->
    <?php include('RecentSpending.php'); ?>

    <!-- projected spending -->
    <?php include('ProjectedSpending.php');?>

    <!-- transactions -->
    <?php include('Transactions.php');?>

    
  </div>
</div>
