<?php
    include_once ('functions.php');
    $user = validate_session();
?>
<div id="Timeframes" class="modal">
    <div class="modal-content animate-top">
        <div class="col-12" style="background-color:#fff;padding:30px;">

            <span onclick="document.getElementById('Timeframes').style.display='none'" style="float:right;"><i class="far fa-times-circle" style="font-size:25px;"></i></span>

                 <form method="post" action="BudgetManager.php">
                        <input type="hidden" name="newTimeframe">
                        <div class="col-12">Start Date: <input type="date" class="field" name="startDate" style="margin-top:10px;" value="<?php  echo $timeframeResult['budgetStartDate']; ?>"></div>
                        <div class="col-12">End Date: <input type="date" class="field" name="endDate"style="margin-top:10px;" value="<?php  echo $timeframeResult['budgetEndDate']; ?>"></div>
                        <div class="col-5" style="padding:0px;margin-top:47px;float:right;"><input type="submit" value="Save" class="button"></div>
                    </form>

        </div>
    </div>
</div>