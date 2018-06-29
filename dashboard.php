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

    <!--
    You currently have no account activity.</br></br>
    <a href="addexpense.php">Add Expenses</a> or <a href="">Create a Budget</a>
    !-->
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

<h2 style="margin-bottom:15px;">Recent Spending</h2>
<table>
  <tr>
    <th>Category</th>
    <th>Expense</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
  </tr>
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
            <!--
            You currently have no account activity.</br></br>

            !-->
            </div>
            </div>
</div>
</div>
