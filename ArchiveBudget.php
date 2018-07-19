<?php
    include_once ('functions.php');
    $user = validate_session();
?>
<div id="ArchiveBudget" class="modal">
    <div class="modal-content animate-top">
        <div class="col-12" style="background-color:#fff;padding:30px;">

            <span onclick="document.getElementById('ArchiveBudget').style.display='none'" style="float:right;"><i class="far fa-times-circle" style="font-size:25px;"></i></span>

                 <form method="post" action="BudgetManager.php">
                        <input type="hidden" name="archiveBudget">
                        <div class="col-12"><h1>Archive Budget</h1></div>
                        <div class="col-12">Do you wish to complete this budget and start a new one? This action cannot be undone.</div>
                        <div class="col-5" style="padding:0px;margin-top:47px;float:left;"><input type="button"onclick="document.getElementById('ArchiveBudget').style.display='none'"  value="Cancel" class="button"></div>
                        <div class="col-5" style="padding:0px;margin-top:47px;float:right;"><input type="submit" value="Okay" class="button"></div>
                    </form>

        </div>
    </div>
</div>