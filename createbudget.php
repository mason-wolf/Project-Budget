<?php

  session_start();
  if(isset($_SESSION['user'])) {
    include ('header.php');
    $user = $_SESSION['user'];
    $dateCreated = date("F j, Y");

      if(isset($_POST['createbudget'])) {
        $category = 
        $type = $_POST['type'];
        $date = $_POST['date'];
        $income = $_POST['income'];
        if (!is_numeric($income))  {
          $invalidIncome = "<span style='color:red;'>Please enter a valid income.</span>";
        }
        $newAccountQuery = mysqli_query($connection, "insert into accounts (name, datecreated, owner, balance, type, status) values ('" . ucfirst($accountname) . "',
        '" . $dateCreated . "', '" . $userquery['email'] . "', '" . $income . "', '" . $type . "','primary')");

        $newTransactionQuery = mysqli_query($connection, "insert into transactions (owner, income, date, account) values ('" . $userquery['email'] . "',
        '" . $income . "', '" . $dateCreated . "', '" . $accountname . "'");
        header('location: dashboard.php');
      }
}
else {
  header('location: login.php');
}
?>

<div class="col-12">
  <div class="col-6 center">
    <form method="post" action="createbudget.php">
    <input type="hidden" name="createbudget">
    <div class="col-12"><h2>Add Projected Expense</h2></div>
    <div class="col-12" style="padding-bottom:0;">Category:</div>
    <div class="col-12"><input type="text"  class="field" name="category" required ></div>

    <div class="col-12" style="padding-bottom:0;">Amount:</div>
    <div class="col-12"><input type="text"  class="field" name="amount" required ></div>

    <div class="col-4" style="float:right;"><input type="submit" class="button" value="Add"></div>
  </form>
  </div>
</div>
