<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();
 ?>

<div class="col-12">
  <div class="col-7 center shadow">

    <!-- recent spending -->
    <?php include('recentspending.php'); ?>

    <!-- projected spending -->
    <?php include('projectedspending.php');?>

    <!-- transactions -->
    <?php include('transactions.php');?>

    
  </div>
</div>
