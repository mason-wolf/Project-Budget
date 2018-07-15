<?php

  include 'header.php';
  include 'functions.php';
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
      header('location: dashboard.php');
  }
 ?>

<div class="col-12">
    <div class="col-7 center shadow"  style="padding:0px;">
        <div class="col-11" style="padding:30px;border:1px solid #ddd;">
            <div class="col-12"><a href="dashboard.php">Back</a></div>
            <div class="col-12"><h2>Add Income</h2></div>
            <form method="post" action="addincome.php">
                <input type="hidden" name="addincome">
                <div class="col-4" style="margin-top:5px;">Amount:</div>
                <div class="col-5">    
                    <span class="currency">
                        <input  type="text" class="field"  placeholder="0.00" style="padding-left:17px;" name="amount"></span>
                </div>
                <div class="col-4">Date:</div>
                <div class="col-6"><input type="date" class="field" name="date" id="date" required  value="<?php echo $today; ?>"></div></br></br>
                <div class="col-4" style="float:right;"><input type="submit" value="Add" class="button"></div>
            </form>
    </div>
</div>

