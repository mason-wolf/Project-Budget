<?php
    include_once ('functions.php');
    $user = validate_session();
?>
<div id="budgetManager" class="modal">
    <div class="modal-content animate-top">
        <div class="col-12" style="background-color:#fff;padding:30px;">
            <span onclick="document.getElementById('budgetManager').style.display='none'" style="float:right;"><i class="far fa-times-circle" style="font-size:25px;"></i></span>
            <h2>Add Projected Expense</h2>
            <div class="col-4" style="margin-top:15px;">Amount:</div>

            <form method="post" action="createbudget.php">
                <input type="hidden" name="newBudgetItem">
                <div class="col-12"><span class="currency"><input  type="text" class="field"  placeholder="0.00"  style="padding-left:17px;" name="amount"></span></div>
                <div class="col-12">
                    <?php if(isset($connection)) { populate_categories($connection); }?>
                </div>
                <div class="col-4" style="float:right;"><input type="submit" class="button" value="Add" ></div>
            </form>


        </div>
    </div>
</div>