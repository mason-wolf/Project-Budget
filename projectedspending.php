<?php 
include_once 'functions.php';
include_once 'connection.php';
$user = validate_session();
?>
<div class="col-12" style="padding: 0px;">
            <h2 style="margin-bottom:15px;margin-top:15px;">Projected Spending</h2>
                <?php
                    $budgetQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "'");
                    $budgetCount = mysqli_fetch_assoc($budgetQuery);
                    if($budgetCount == 0) {                     
                ?> 
                    <div class="col-12" style="border:1px solid #ddd;text-align:center;">No projected expenses.</div>

                <?php } else {
                    echo "<table>";
                    // retrieve budget categories by group
                    $budgetItemQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "' group by category");
                    while($budgetItem = mysqli_fetch_assoc($budgetItemQuery)) {
                        echo "<tr><td>" . $budgetItem['category'] . "</td>";
                        $projectedExpenseQuery = mysqli_query($connection, "select sum(amount) as total from budgets where owner='" . $user . "' and category='" . $budgetItem['category'] . "'");
                        while($projectedExpense = mysqli_fetch_assoc($projectedExpenseQuery) ) {
                            echo "<td>$ " . number_format($projectedExpense['total']) . "</tr></td>"; 
                        }
                    }
                    echo "</table>";
                }
          ?>
         <div class="col-4" style="float:right;padding:0px;margin-top:10px;">
            <input type="button" onclick="location.href='BudgetManager.php'" value="Manage Budget" class="button">
         </div>
    </div>