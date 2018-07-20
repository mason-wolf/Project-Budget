<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();

 ?>

<div class="col-12" style="padding:0px">
    <div class="col-7 center shadow"  style="padding:1em;">
                <div class="col-12"><a href="Dashboard.php">Dashboard</a> <span style="margin-left:15px;margin-right:15px;">></span> <a href="ViewRecentSpending.php">Recent Spending</a></div>
                <?php include('RecentSpending.php'); ?>

        </div>
</div>
        
                       
