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
<div class="col-6 center"  style="padding:0px;">
<div class="col-11" style="padding:30px;border:1px solid #ddd;">
        <div class="col-12"><a href="dashboard.php">Back</a></div>
        <div class="col-12"><h2>Add Expense</h2></div>
            <div class="col-4" style="margin-top:5px;">Amount:</div>
            <div class="col-5">    
                <span class="currency">
                    <input  type="text" class="field"  placeholder="0.00" style="padding-left:17px;"></span>
            </div>
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
            <div class="col-4" style="float:right;"><input type="button" value="Add" class="button"></div>
        </div>
</div>

