<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
<form action="#" method="get" class="form-inline">
    <div class="col-md-7">
        <div class="input-group" id="daterangepicker" style="    width: 254px;
             float: left;
             margin-right: 6px;">
            <input type="text" name="daterange" class="form-control dateFormat"  placeholder="click to select the date range" readonly="" style="    background: #FFFFFF;
                   opacity: 1;width:200px;" value="<?php echo $daterange; ?>">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
            </span>
        </div>
        <button class="btn btn-success" type="submit" name="submit" value="searchdata"><i class="fa fa-send"></i> Submit</button>
        <?php
        if ($exportdata == 'yes') {
            $selectdaterange = "0";
            if ($dateselected == "yes") {
                $selectdaterange = $daterange;
            }
            ?>
            <a class="btn btn-warning" href="<?php echo site_url("Invoice/reportsXls/$selectdaterange/0"); ?>">Export All</a>
            <?php
        }
        ?>
    </div>
    <div class="col-md-5 text-right">
        <h4> Invoices from <small><?php echo $daterange; ?></small></h4>
    </div>

</form>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
