<?php

  include 'header.php';
  session_start();

  
  if(isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
  }

  else {
      header('location: index.php');
  }

  if (isset($_POST['newBudgetItem'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $newBudgetItem = mysqli_query($connection, "insert into budgets (owner, category, amount, datecreated, datefinished) VALUES ('" . $user . "','" . $category . "','" . $amount . "','" . $today . "', 'n/a')");
}

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
    <div class="col-6 center"  style="padding:0px;">
        <div class="col-11" style="padding:0px;border:1px solid #ddd;">
            <div class="col-12"><a href="dashboard.php">Back</a></div>
            <div class="col-12">
            <h2>Manage Budget</h2></br>

            <table>
                <tr>
                    <th style="border-bottom:0px;">Categories <?php include('categorymanager.php');?> 
                <sub><a href="#" onclick="document.getElementById('categoryManager').style.display='block'"> Edit</a></sub></th>
                    <th style="border-bottom:0px;">Projected Expense</th>
                </tr> 
            </table>
                <?php
                    $budgetQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "'");
                    $budgetCount = mysqli_fetch_assoc($budgetQuery);
                    if($budgetCount == 0) {                     
                ?> 
                    <div class="col-12" style="border:1px solid #ddd;text-align:center;">No projected expenses.</div>

                <?php } else {
                    echo "<table>";
                    // retrieve budget categories by group
                    $budgetItemQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "' and datefinished='n/a' group by category");
                    while($budgetItem = mysqli_fetch_assoc($budgetItemQuery)) {
                        echo "<tr><td>" . $budgetItem['category'] . "</td>";
                        $projectedExpenseQuery = mysqli_query($connection, "select sum(amount) as total from budgets where owner='" . $user . "' and category='" . $budgetItem['category'] . "'");
                        while($projectedExpense = mysqli_fetch_assoc($projectedExpenseQuery)) {
                            echo "<td>$ " . number_format($projectedExpense['total']) . "</tr></td>"; 
                        }
                    }
                    echo "</table></br>";
                }
                ?>

            <table>
                <tr>
                <td><b>Remaining Funds</b></td>
                <td>
                    <?php 
                        $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status='primary'");
                        $balance = mysqli_fetch_assoc($balanceQuery);
                        echo "<b>$ " . number_format($balance["balance"]) . "</b>";
                    ?>
                </td>
            </table>
            <?php include('budgetmanager.php'); ?>
            </div>
        </div>
    </div>
</div>
