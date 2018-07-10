<?php
    include 'header.php';
    include_once 'functions.php';
    session_start();
    $user = validate_session();

    $timeframeQuery = mysqli_query($connection, "select budgetStartDate, budgetEndDate from accounts where owner='" . $user . "'");
    $timeframeResult = mysqli_fetch_assoc($timeframeQuery);

    // create new projected expense 
    if (isset($_POST['newBudgetItem'])) {
        $amount = $_POST['amount'];
        $category = $_POST['category'];
        $budgetStartDate = $timeframeResult['budgetStartDate'];
        $budgetEndDate = $timeframeResult['budgetEndDate'];
        $newBudgetItem = mysqli_query($connection, "insert into budgets (owner, category, amount, startDate, endDate) VALUES ('" . $user . "','" . $category . "','" . $amount . 
         "','" . $budgetStartDate . "','" . $budgetEndDate . "')");
    }

    if (isset($_POST['newTimeframe'])) {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $timeframeUpdateQuery = mysqli_query($connection, "update accounts set budgetStartDate='" . $startDate . "', budgetEndDate='" . $endDate . "' where owner='" . $user . "'");
        $updateBudgetItems = mysqli_query($connection, "update budgets set startDate='" . $startDate . "', endDate='" . $endDate . "' where owner='" . $user . "' and archived='false'");
        header('location: BudgetManager.php');
    }

?>
                        
<div class="col-12">
    <div class="col-7 center shadow"  style="padding:0px;">
        <div class="col-12" style="padding:0px;">
            <div class="col-12"><a href="Dashboard.php">Back</a></div>
            <div class="col-12">
                <h2>Manage Budget</h2></br>
                <h3 style="float:right;">
                    <a href="#" onclick="document.getElementById('Timeframes').style.display='block'">
                    <?php 
                            $startDate = date("F j, Y", strtotime($timeframeResult['budgetStartDate']));
                            $endDate = date("F j, Y", strtotime($timeframeResult['budgetEndDate']));
                            echo $startDate . " - " . $endDate . "</a>";
                    ?>
                </h3>
                </br></br>
                    <?php
                        $budgetQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "'");
                        $budgetCount = mysqli_fetch_assoc($budgetQuery);
                        if($budgetCount == 0) {                     
                    ?> 
                <table>
                    <tr>
                        <th style="border-bottom:0px;">Categories <?php include('categorymanager.php');?> 
                        <sub><a href="#" onclick="document.getElementById('categoryManager').style.display='block'">Edit</a></sub></th>
                        <th style="border-bottom:0px;">Projected Expenses</th>
                    </tr> 
                </table>
            <div class="col-12" style="border:1px solid #ddd;text-align:center;">No projected expenses.</div>
                    <table>
                            <?php 
                                $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status='primary'");
                                $balance = mysqli_fetch_assoc($balanceQuery);
                                echo "<td style='border-top:0px;'><b>Remaining Balance</b></td>";
                                echo "<td style='border-top:0px;'><b>$ " . number_format($balance["balance"]) . "</b></td>";
                            ?>
                    </table>

                <?php } else { ?>

                <table>
                    <tr>
                        <th style="border-bottom:0px;">Categories <?php include('categorymanager.php');?> 
                        <sub><a href="#" onclick="document.getElementById('categoryManager').style.display='block'"> Edit</a></sub></th>
                        <th style="border-bottom:0px;">Projected Expense</th>
                    </tr> 
                <?php
                    // retrieve budget categories by group
                    $budgetItemQuery = mysqli_query($connection, "select * from budgets where owner='" . $user . "' group by category");
                    while($budgetItem = mysqli_fetch_assoc($budgetItemQuery)) {
                        echo "<tr><td>" . $budgetItem['category'] . "</td>";
                        $projectedExpenseQuery = mysqli_query($connection, "select sum(amount) as total from budgets where owner='" . $user . "' and category='" . $budgetItem['category'] . "'");
                        while($projectedExpense = mysqli_fetch_assoc($projectedExpenseQuery)) {
                            echo "<td>$ " . $projectedExpense['total'] . "</tr></td>"; 
                        }
                    }
                    $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status='primary'");
                    $balanceResult = mysqli_fetch_assoc($balanceQuery);
                    $balance = $balanceResult["balance"];
                    
                    $projectedSpendingQuery = mysqli_query($connection, "select sum(amount) as total from budgets where owner='" . $user . "'");
                    $projectedSpendingResult = mysqli_fetch_assoc($projectedSpendingQuery);
                    $projectedSpending = $projectedSpendingResult['total'];
                    $projectedSavings = $balance - $projectedSpending;
  
                    echo "<td style='border-top:0px;'><b>Remaining Balance</b></td>";
                    echo "<td style='border-top:0px;'><b>$ " . $balance . "</b></td>";
                    echo "<tr><td style='border-top:0px;'><b>Projected Savings</b></td>";
                    echo "<td style='border-top:0px;'><b>$ " . $projectedSavings  . "</b></td></tr>";
                }
                ?>  </table>
           <?php include('AddBudgetItem.php'); ?>
           <?php include('Timeframes.php'); ?>
            <div class="col-4" style="float:right;padding:0px;margin-top:10px;"><input type="button" class="button" value="Add Item" onclick="document.getElementById('AddBudgetItem').style.display='block'"></div>


        </div>
    </div>
</div>
