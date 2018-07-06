<?php

    include('connection.php');
    include_once('functions.php');
    $user = validate_session();

    if(isset($_POST['addCategory'])) {
        $category = $_POST['category'];
        session_start();
        $user = $_SESSION['user'];
        $newcategory = mysqli_query($connection, "insert into categories (title, owner) VALUES ('" . $category . "','" . $user . "')");
        if(isset($_GET['redirect'])) {
            $redirect = $_GET['redirect'];
            header('location:' . $redirect);
        }
    }

    if(isset($_GET['categoryToRemove'])) {
        $categoryToRemove = $_GET['categoryToRemove'];
        $removeCategory = mysqli_query($connection, "delete from categories where title='" . $categoryToRemove . "'");
        if(isset($_GET['redirect'])) {
            $redirect = $_GET['redirect'];
            header('location:' . $redirect);
        }
    }
               
?>  
<div id="categoryManager" class="modal">
    <div class="modal-content  animate-top">
        <div class="col-12" style="background-color:#fff;padding: 30px;">
           <span onclick="document.getElementById('categoryManager').style.display='none'" style="float:right;"><i class="far fa-times-circle" style="font-size:25px;"></i></span>
           <h2>Manage Categories</h2>
           <div class="col-4" style="margin-top:15px;">Category Title:</div>
            <form method="post" action="categorymanager.php?redirect=<?php echo $_SERVER['REQUEST_URI'];?>">
                <input type="hidden" name="addCategory">
                <div class="col-12" style="margin-top:10px;"><input type="text" class="field" name="category"></div>
                <div class="col-4" style="float:right;"><input type="submit" class="button" value="Add"></div>
            </form>
            <form method="get" action="categorymanager.php">
                <div class="col-12">
                    <input type="hidden" name='redirect' value="<?php echo $_SERVER['REQUEST_URI'];?>">
                    <?php populate_categories($connection); ?>
                </div>
                <div class="col-4" style="float:right;"><input type="submit" class="button" value="Remove" ></div>
            </form>
        </div>
    </div>
</div>
           
