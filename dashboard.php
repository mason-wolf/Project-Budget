<?php

  include 'header.php';
  session_start();
  if(isset($_SESSION['user'])) {

      $user = $_SESSION['user'];
      $accountquery = mysqli_query($connection, "select * from accounts where owner='" . $user . "'");
      $recordcount = mysqli_num_rows($accountquery);
      if($recordcount < 1) {
          header('location: login.php');
      }
  }

 ?>
<div class="col-12">
<div class="col-6 center shadow" style="background-color:#fff;">
  <a href="dashboard.php">Overview</a>
</div>

<div class="col-6 center shadow" style="margin-top:10px;background-color:#fff;padding:1em;">

  <?php
    if(isset($norecords)) {
      echo "<p>" . $norecords . "</p>";
    }
    else {

      $balancequery = mysqli_fetch_assoc(mysqli_query($connection, "select balance from accounts where owner='" . $user . "'"));
      $balanceresult = $balancequery['balance'];
      $time = date("F j, Y");
      echo "<span style='padding:.5em;'>" . $time . "<br>";
      echo "</br><h4 style='padding:.5em;'><b>Account Balance</b></h4>";
      echo "<h4 style='padding:.5em;'>$" . number_format($balanceresult) . "</h4>";

    }
  ?>

  <style>
    td {
      padding:.5em;
    }
    th {
      text-align:left;
      padding:.5em;
      font-weight: normal;
    }
  </style>

  <table style="margin-top:10px;">
    <thead>
      <tr>
        <th>Category</th>
        <th>Total Spent</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $categoryquery = mysqli_query($connection, "select * from categories where owner='" . $user . "'");
          while($category = mysqli_fetch_assoc($categoryquery)) {
            $categorycount_query = mysqli_query($connection, "select * from transactions where category='" . $category['title'] ."'");
            $categorycount = mysqli_num_rows($categorycount_query);
            $count = 0;
              while($row = mysqli_fetch_assoc($categorycount_query)) {
              $count = (float)$count + $row['expense'];
              }
            echo "<tr><td>" . $category['title'] . "</td><td>$ " . $count . "</td></tr>";
      }
      ?>
    </tbody>
  </table>



</div>

</div>
