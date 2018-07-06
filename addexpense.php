<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();
    if(isset($_POST['addexpense'])) {
      $amount = $_POST['amount'];
      $category = $_POST['category'];
      $date = $_POST['date'];
      $addexpense = mysqli_query($connection, "insert into transactions (owner, date, expense, category) VALUES ('" . $user . "', '" . $date . "','" . $amount . "', '" . $category. "')");
      $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status ='primary'");
      $balance = mysqli_fetch_assoc($balanceQuery);
      $remainingBalance = $balance['balance'] - $amount;
      $updateBalanceQuery = mysqli_query($connection, "update accounts set balance ='" . $remainingBalance . "' where owner='" . $user . "' and status='primary'");
      header('location: dashboard.php');
    }
 ?>

<div class="col-12">
    <div class="col-7 center shadow"  style="padding:0px;">
        <div class="col-12">
                <div class="col-12"><a href="dashboard.php">Back</a></div>
                <div class="col-12"><h2>Add Expense</h2></div>
                <div class="col-4">Current Balance:</div>
                <div class="col-5">
                    <?php if(isset($user)) { display_balance($connection, $user); }?>
                </div>
                    <form method="post" action="addexpense.php">
                        <input type="hidden" name="addexpense">
                        <div class="col-4" >Amount:</div>
                        <div class="col-5">    
                            <span class="currency">
                                <input  type="text" class="field"  placeholder="0.00" style="padding-left:17px;" name="amount" required>
                            </span>
                        </div>
                        <div class="col-4">Category:</br><a href="#" onclick="document.getElementById('categoryManager').style.display='block'" style="font-size:13px;">Manage Categories</a></div>
                        <div class="col-6"> 
                            <?php populate_categories($connection); ?>
                        </div>
                        <div class="col-4" style="margin-top:15px;">Date:</div>
                        <div class="col-6"><input type="date" class="field" name="date" id="date" value="<?php echo $today; ?>"></div>
                        <div class="col-4" style="float:right;"><input type="submit" value="Add" class="button"></div>
                     </form>
                <?php include('categorymanager.php'); ?>
        </div>
    </div>
</div>
        
                       
