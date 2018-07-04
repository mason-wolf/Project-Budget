<?php

  include 'header.php';
  session_start();
  
  if(isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
  }

  else {
      header('location: index.php');
  }

  if(isset($_POST['addexpense'])) {
      $amount = $_POST['amount'];
      $category = $_POST['category'];
      $date = $_POST['date'];
      $addexpense = mysqli_query($connection, "insert into transactions (owner, date, expense, category) VALUES ('" . $user . "', '" . $date . "','" . $amount . "', '" . $category. "')");
  }
 ?>


<div class="col-12">
<div class="col-6 center"  style="padding:0px;">
<div class="col-11" style="padding:30px;border:1px solid #ddd;">
        <div class="col-12"><a href="dashboard.php">Back</a></div>
        <div class="col-12"><h2>Add Expense</h2></div>

            <form method="post" action="addexpense.php">
                <input type="hidden" name="addexpense">
                <div class="col-4" style="margin-top:5px;">Amount:</div>
                <div class="col-5">    
                    <span class="currency">
                        <input  type="text" class="field"  placeholder="0.00" style="padding-left:17px;" name="amount"></span>
                </div>

            <div class="col-4">Category:</div>
                <div class="col-5"> 
                        <select class="field" name="category">
                        <?php
                            $categoryQuery = mysqli_query($connection, 'select * from categories ORDER BY title');
                            while ($category = mysqli_fetch_assoc($categoryQuery)) {
                                echo "<option value='" . $category['title'] . "'>" . $category['title'] . "</option>";
                            }
                            ?>
                        </select> 
                        </div>
                <div class="col-4">Date:</div>
                <div class="col-6"><input type="date" class="field" name="date" required></div></br></br>
                <div class="col-4" style="float:right;"><input type="submit" value="Add" class="button"></div>
                </form>
                <?php include('categorymanager.php'); ?>
                </div>
            </div>

