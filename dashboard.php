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
  <div class="col-6 center" style="padding:0px;">
    <div class="col-8" style="padding:0px;margin-bottom:10px;">

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
                      echo "<td>" . $expense['total'] . "</td></tr>";
                    }
                }} ?>

          <tr>
            <td><b>Remaining Funds:</b></td>
            <td><b>$100</b></td>
          </tr>
        </table>
    </div>
      <div class="col-4" style="padding:2px;text-align:center;">
        <div class="col-12" style="border:1px solid #ddd;text-align:center;margin-top:45px;">
            <a href="addexpense.php">Add Expenses</a></br>
            <a href="createbudget.php">Create Budget</a></br>
        </div>
      </div>
  </div>
</div>
