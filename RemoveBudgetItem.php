<?php

    include('connection.php');
    include_once('functions.php');
    session_start();
    $user = validate_session();

    if(isset($_GET['category'])) {
        $categoryToRemove = $_GET['category'];
        echo $categoryToRemove;
    }
?>