<?php

  include 'header.php';

  if (isset($_POST['createaccount'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $accountquery = mysqli_query($connection, "select * from users where email='" . $email . "'");

      if (mysqli_num_rows($accountquery) >= 1) {
        $accountconflict = "<div class='col-12' style='color:red;text-align:center;'>Account already exists.</div>";
      }
      else {
        $newaccount = mysqli_query($connection, "insert into users (firstname, lastname,
        email, password) VALUES ('" . ucfirst($firstname) ."', '" . ucfirst($lastname) . "', '" . $email . "', '" . $password . "')");
        session_start();
        $_SESSION['user'] = $email;
        header('location:newprofile.php');
      }
    }
    else {
        $accountconflict = "<div class='col-12' style='color:red;text-align:center;'>Please enter a valid email.</div>";
    }
  }
?>

<div class="col-12">
  <div class="col-6 center shadow default">
    <form method="post" action="createaccount.php">
    <input type="hidden" name="createaccount">
    <?php
      if(isset($accountconflict)) {
        echo $accountconflict;
      }
    ?>
    <div class="col-12" style="text-align:center;"><h1>Join Project Budget</h1></div>
    <div class="col-12" style="padding-bottom:0;">First Name:</div>
    <div class="col-12"><input type="text"  class="field" name="firstname" required ></div>
    <div class="col-12" style="padding-bottom:0;">Last Name:</div>
    <div class="col-12"><input type="text"  class="field" name="lastname" required ></div>
    <div class="col-12" style="padding-bottom:0;">Email:</div>
    <div class="col-12"><input type="text"  class="field" name="email" required ></div>
    <div class="col-12" style="padding-bottom:0;">Password:</div>
    <div class="col-12"><input type="password"  class="field" name="password" required ></div>
    <div class="col-4" style="float:right;"><input type="submit" class="button" value="Sign-up"></div>
  </form>
  </div>
</div>
