<?php 
  include_once 'functions.php';
  include_once 'connection.php';
  $user = validate_session();
?> 
    <div class="col-12" style="padding: 0px;margin-top:50px;">
            <h2 style="margin-bottom:15px;">Transactions</h2>

                <?php
                    $budgetQuery = mysqli_query($connection, "select * from transactions where owner='" . $user . "'");
                    $budgetCount = mysqli_fetch_assoc($budgetQuery);
                    if($budgetCount == 0) {                     
                ?> 
                    <table>
                        <tr>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Expense</th>
                        </tr>
                    </table>
                    <div class="col-12" style="border:1px solid #ddd;text-align:center;border-top:0px;">No recent transactions.</div>

                <?php } else {
                    echo "<table><tr>";
                    echo "<th>Category</th>";
                    echo "<th>Date</th>";
                    echo "<th>Expense</th></tr>";
    
                    $transactionQuery = mysqli_query($connection, "select * from transactions where owner='" . $user . "' order by id desc limit 15");
                    while($transaction = mysqli_fetch_assoc($transactionQuery)) {
                        echo "<tr><td>" . $transaction['category'] . "</td>";
                        echo "<td>" .  date("F d, Y", strtotime( $transaction['date'])) . "</td>";
                        echo "<td class='money'>$ " . $transaction['expense'] . "</td>";
                    }
                    echo "</table>";
                }
          
          ?>
                  <div class="col-4" style="float:right;padding:0px;margin-top:25px;"><input type="button" onclick="location.href='addincome.php'" value="Add Income" class="button"></div>
    </div>
