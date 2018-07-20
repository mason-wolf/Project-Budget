<div class="col-4" style="padding:1px;text-align:center;">
    <div class="col-12 widget">
        <h2>Remaining Funds</h2>
        <?php 
        // display remaining balance
            $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status='primary'");
            $balanceResult = mysqli_fetch_assoc($balanceQuery);
            echo "<div class='money' style='margin-top:25px;'><h1> $ " . number_format((float)$balanceResult['balance'], 2 , '.', '') . "</h1></div>";
            echo "<div class='col-12' style='text-align:right;padding:0px;'><a href='AddIncome.php' style='color:#fff;font-size:16px;font-weight:100;'>Add Income</a></div>";
        ?>
    </div>
</div>

<div class="col-4" style="padding:1px;text-align:center;">
    <div class="col-12 widget">
        <h2>Projected Savings</h2>
        <?php 
        // display projected savings
        $balance = $balanceResult["balance"];
        $projectedSpendingQuery = mysqli_query($connection, "select sum(amount) as total from budgets where owner='" . $user . "' and archived='false'");
        $projectedSpendingResult = mysqli_fetch_assoc($projectedSpendingQuery);
        $projectedSpending = $projectedSpendingResult['total'];
        $projectedSavings = $balance - $projectedSpending;
        echo "<div class='money' style='margin-top:25px;'><h1> $ " . number_format((float)$projectedSavings, 2, '.', '') . "</h1></div>";
        echo "<div class='col-12' style='text-align:right;padding:0px;'><a href='#' style='color:#fff;font-size:16px;font-weight:100;'>View Expenses</a></div>";
        ?>
    </div>
</div>

<div class="col-4" style="padding:1px;text-align:center;">
    <div class="col-12 widget">
        <h2>Total Budget</h2>
        <?php
        // display total budget
            echo "<div class='money' style='margin-top:25px;'><h1> $ " . number_format((float)$projectedSpendingResult['total'], 2, '.', '') . "</h1></div>";
            echo "<div class='col-12' style='text-align:right;padding:0px;'><a href='#' style='color:#fff;font-size:16px;font-weight:100;'>Manage Budget</a></div>";
        ?>
    </div>
</div>
