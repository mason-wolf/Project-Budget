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
<div class="col-6 center">
<div class="col-11">
        <div class="col-12">
            <a href="dashboard.php">Dashboard</a> <i class="fas fa-angle-double-right" style="margin-left:25px;margin-right:25px;"></i><a href="Add Expense">Add Expense</a></div>
            <div class="col-4" style="margin-top:15px;">Amount:</div>
            <div class="col-5"> <input type="text" class="field"></div>
            <div class="col-4">Category:</div>
                <div class="col-5"> 
                        <select class="field">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                        </select> 
                </div>
            <div class="col-4">Date:</div>
            <div class="col-5"><input type="text" class="field"></div></br></br>
            <div class="col-4"><input type="button" value="Add" class="button"></div>
        </div>
</div>

