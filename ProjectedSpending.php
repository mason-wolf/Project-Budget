<?php 
include_once 'Functions.php';
include_once 'Connection.php';
$user = validate_session();
?>
<div class="col-12" style="padding: 0px;margin-top:50px;">
            <h2 style="margin-bottom:15px;">Projected Spending<i class="fas fa-chart-line" style="color:#1c4418;margin-left:20px;"></i></h2>
                <?php
                    $budgetQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "' and archived='false'");
                    $budgetCount = mysqli_fetch_assoc($budgetQuery);
                    if($budgetCount == 0) {                     
                ?> 
                    <div class="col-12" style="border:1px solid #ddd;text-align:center;">No projected expenses.</div>

                <?php } else {
                    
                    // retrieve budget categories by group
                    $budgetItemQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "' and archived='false' group by category");
                    while($budgetItem = mysqli_fetch_assoc($budgetItemQuery)) {
                        echo "<div class='col-12 projectedSpendingLabel'>" . $budgetItem['category'] . "</div>";
                        // retrieve budget items
                        $projectedExpenseQuery = mysqli_query($connection, "select sum(amount) as total from budgets where archived='false' and owner='" . $user . "' and category='" . $budgetItem['category'] . "'");
                        $recentSpendingQuery = mysqli_query($connection, "select sum(expense) as recentSpending from transactions where owner='" . $user . "' and category='" . $budgetItem['category'] . "'");
                        // compare recent spending to reflect budget progress
                        while($projectedExpense = mysqli_fetch_assoc($projectedExpenseQuery) ) {
                            while($recentSpending = mysqli_fetch_assoc($recentSpendingQuery)) {
                                $spendingPercentage = $recentSpending['recentSpending'] / $projectedExpense['total'] * 100;
                                $spendingProgress = $recentSpending['recentSpending'];
                            }
                            show_budget_progress($spendingProgress, $spendingPercentage, number_format($projectedExpense['total']));
                        }
                    }
                }
          ?>
         <div class="col-12" style="float:right;padding:0px;margin-top:50px;">
         <div class="col-4" style="padding:0px;float:right;">
            <input type="button" onclick="location.href='BudgetManager.php'" value="Manage Budget" class="button">
         </div>
         </div>
    </div>
