<?php 

function validate_session() {
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        return $user;
    }
    else {
      header('location: index.php');
    }
}

function display_balance($connection, $user) {
    $balanceQuery = mysqli_query($connection, "select balance from accounts where owner='" . $user . "' and status='primary'");
    $balance = mysqli_fetch_assoc($balanceQuery);
    echo "$ " . number_format($balance['balance']);
}

function get_categories($connection, $user) {

              $categories = array();

              // retrieve all user-defined categories
              $userCategoryQuery = mysqli_query($connection, "select * from usercategories where owner='" . $user . "'");
              while ($userCategory = mysqli_fetch_assoc($userCategoryQuery)) {
                array_push($categories, $userCategory['title']);
              }

              // retrieve all default categories 
              $defaultCategoryQuery = mysqli_query($connection, "select * from defaultcategories");
              while ($defaultCategory = mysqli_fetch_assoc($defaultCategoryQuery)) {
                array_push($categories, $defaultCategory['title']);
              }

              return $categories;
}

function populate_categories($connection, $user) {
    echo "<select class='field' name='category'>";
    $categories = get_categories($connection, $user);
    sort($categories);
        foreach ($categories as $category) {
            echo "<option value='" . $category . "'>" . $category . "</option>"; 
        }
    echo "</select>";
}


?>
