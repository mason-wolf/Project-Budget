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

function populate_categories($connection) {
    echo "<select class='field' name='category'>";
    $categoryQuery = mysqli_query($connection, 'select * from categories ORDER BY title');
    while ($category = mysqli_fetch_assoc($categoryQuery)) {
        echo "<option value='" . $category['title'] . "'>" . $category['title'] . "</option>";
    }
    echo "</select>";
}

?>