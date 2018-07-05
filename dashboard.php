<?php
    include 'header.php';
    session_start();

    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    else {
        header('location: index.php');
    }

    $accountQuery = mysqli_query($connection, "select * from transactions where owner='" . $user . "'");
    $accountActivity = mysqli_num_rows($accountQuery);
 ?>
<style>
    table {
        font-size:16px;
        border-collapse: collapse;
        width: 100%;
    }
    
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
<div class="col-12">
  <div class="col-6 center" style="padding:0px;">
    <div class="col-8" style="padding:0px;margin-bottom:10px;">
      <?php     if($accountActivity == 0) {
                echo "<div class='col-12' style='margin-top:25px;text-align:center;border:1px solid #ddd;'>You currently have no account activity. </br><a href='addexpense.php'>Add Expenses</a> or <a href='createbudget.php'>Create a Budget</a></div>";
                }
                else {
      ?>
      <h2 style="margin-bottom:15px;">Recent Spending</h2>
        <table>
          <tr>
            <th>Category</th>
            <th>Expense</th>
          </tr>
              <?php 
              // retrieve all categories
              $categoryQuery = mysqli_query($connection, "select * from categories");
              // retrieve all transactions that match each category by owner
              while ($category = mysqli_fetch_assoc($categoryQuery)) {
                $transactionQuery = mysqli_query($connection, "select * from transactions where owner='" . $user . "' and category='" . $category['title'] . "' group by category"); 
                while ($transactionCategory = mysqli_fetch_assoc($transactionQuery)) { 
                  echo "<tr><td>" . $transactionCategory['category'] . "</td>"; 
                  // retrieve sum of expenses for each category
                  $expenseQuery = mysqli_query($connection, "select sum(expense) as total from transactions where owner='" . $user . "' and category='" . $category['title'] ."'");
                    while ($expense = mysqli_fetch_assoc($expenseQuery)) {
                      echo "<td>$ " . number_format($expense['total']) . "</td></tr>";
                    }
                }} ?>

          <tr>
            <td><b>Remaining Funds:</b></td>
                  <?php // display remaining balance
                        $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status='primary'");
                        $balance = mysqli_fetch_assoc($balanceQuery);
                        echo "<td><b> $ " . number_format($balance['balance']) . "</b></td>";
                  ?>
          </tr>
        </table>
    </div>
      <div class="col-4" style="padding:2px;text-align:center;">
        <div class="col-12" style="border:1px solid #ddd;text-align:center;margin-top:45px;">
                <div class="col-12"><a href="addexpense.php">Add Expenses</a></div>
                <div class="col-12"><a href="addincome.php">Add Income</a></div>
                <div class="col-12"><a href="createbudget.php">Manage Budget</a></div>
        </div>
      </div>
  </div>
  <?php } ?>
</div>
