<?php

include('connection.php');

if(isset($_POST['addCategory'])) {
    $category = $_POST['category'];
    session_start();
    $user = $_SESSION['user'];
    $newcategory = mysqli_query($connection, "insert into categories (title, owner) VALUES ('" . $category . "','" . $user . "')");
    header('location: addexpense.php');
}

if(isset($_GET['categoryToRemove'])) {
    $categoryToRemove = $_GET['categoryToRemove'];
    $removeCategory = mysqli_query($connection, "delete from categories where title='" . $categoryToRemove . "'");
    header('location: addexpense.php');
}
               
?>  
                <div id="categoryManager" class="modal">
                    <div class="modal-content  animate-top">
                            <div class="col-12" style="background-color:#fff;padding: 30px;">
                            <span onclick="document.getElementById('categoryManager').style.display='none'" style="float:right;"><i class="far fa-times-circle" style="font-size:25px;"></i></span>
                            <h2>Manage Categories</h2>
                            <div class="col-4" style="margin-top:15px;">Category Title:</div>

                            <form method="post" action="categorymanager.php">
                                <input type="hidden" name="addCategory">
                                <div class="col-12" style="margin-top:10px;"><input type="text" class="field" name="category"></div>
                                    <div class="col-4" style="float:right;">
                                        <input type="submit" class="button" value="Add">
                                    </div>
                            </form>

                            <form method="get" action="categorymanager.php">
                                <input type="hidden" "categoryRemoval">
                                <div class="col-12">
                                        <select class="field" name="categoryToRemove">
                                            <?php
                                            $categoryQuery = mysqli_query($connection, 'select * from categories order by title');
                                            while ($category = mysqli_fetch_assoc($categoryQuery)) {
                                                echo "<option value='" . $category['title'] . "' >" . $category['title'] . "</option>";
                                            }
                                            ?>
                                        </select> 
                                </div>
                                <div class="col-4" style="float:right;"><input type="submit" class="button" value="Remove" ></div>
                            </form>


                        </div>
                    </div>
                </div>

                </br>
                <a href="#" onclick="document.getElementById('categoryManager').style.display='block'" style="float:right;margin-top:35px;">Manage Categories</a>
            </div>
