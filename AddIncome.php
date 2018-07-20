

<div id="AddIncome" class="modal">
    <div class="modal-content animate-top">
        <div class="col-12" style="background-color:#fff;padding:30px;">

            <span onclick="document.getElementById('AddIncome').style.display='none'" style="float:right;"><i class="far fa-times-circle" style="font-size:25px;"></i></span>

<div class="col-12"><h2>Add Income</h2></div>
            <form method="post" action="Dashboard.php">
                <input type="hidden" name="addincome">
                <div class="col-4" style="margin-top:5px;">Amount:</div>
                <div class="col-6">    
                    <span class="currency">
                        <input  type="text" class="field"  placeholder="0.00" style="padding-left:17px;" name="amount"></span>
                </div>
                <div class="col-4">Date:</div>
                <div class="col-6"><input type="date" class="field" name="date" id="date" required  value="<?php echo $today; ?>"></div></br></br>
                <div class="col-4" style="float:right;"><input type="submit" value="Add" class="button"></div>
            </form>

        </div>
    </div>
</div>

