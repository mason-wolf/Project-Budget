<?php
  include 'header.php';

    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $accountquery = mysqli_query($connection, "select * from users where email='" . $email . "' and password='" . $password . "'");
        if (mysqli_num_rows($accountquery) >= 1) {
            session_start();
            $_SESSION['user'] = $email;
            Header("Location: dashboard.php");
        }
        else {
          $accountconflict = "<div class='col-12' style='text-align:center;color:red;'>Invalid email or password.</div>";
        }
      }
      else {
          $accountconflict = "<div class='col-12' style='text-align:center;color:red;'>Please enter a valid email.</div>";
      }
    }
?>

<div class="col-12">
  <div class="col-5 center">
    <form method="post" action="login.php">
    <input type="hidden" name="login">

    <div class="col-12" style="text-align:center;"><h3>Sign in to Project Budget</h3></div>
    <div class="col-12" style="padding-bottom:0;">Email:</div>
    <div class="col-12"><input type="text" class="field" name="email" required ></div>
    <div class="col-12" style="padding-bottom:0;" >Password:</div>
    <div class="col-12"><input type="password"  class="field" name="password" required ></div>
    <?php
      if(isset($accountconflict)) {
        echo $accountconflict;
      }
    ?>
        <div class="col-12"><a href="createaccount.php">Create Account</a></div>
    <div class="col-4 center" style="float:right;"><input type="submit" class="button" value="Sign in"></div>
    
  </form>
  </div>
</div>
