<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


<link href="<?php echo base_url(); ?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<!-- ============================================================== -->
<div class="page-wrapper" ng-controller="invoiceConroller">
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Create Invoice</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <!-- begin #content -->
        <div id="content" class="content">
            <section class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">

                            <div class="panel-heading with-border">

                                <div  style="clear:both"></div>
                            </div>
                            <!-- /.panel-header -->
                            <div class="panel-body" style="margin-top: 20px;">
                                <form action="" method="post">
                                    <div class="print_invoice">
                                        <style>
                                            .invoicetable td, .invoicetable th{
                                                padding:5px;
                                                text-align: left;
                                            }
                                            .invoicetable h4{
                                                margin: 0px;
                                            }


                                        </style>
                                        <?php
                                        $originalDate = date("Y-m-d");
                                        ?>
                                        <table class="invoicetable" style="width:500px;">


                                            <tr>
                                                <td  style="text-align: center;"">
                                                    <table style="width: 100%;border-collapse: collapse; " border="1">




                                                        <tr>
                                                            <td>Party</td>
                                                            <td>
                                                                <select name="party_id" class="form-control">
                                                                    <?php
                                                                    foreach ($parties as $key => $value) {
                                                                        $party_name = $value["name"];
                                                                        $party_id = $value["id"];
                                                                        echo "<option value='$party_id'>$party_name</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Consignee</td>
                                                            <td>
                                                                <select name="consignee_id" class="form-control">
                                                                    <?php
                                                                    foreach ($consignee as $key => $value) {
                                                                        $consignee_name = $value["name"];
                                                                        $consignee_id = $value["id"];
                                                                        echo "<option value='$consignee_id'>$consignee_name</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Trans. Date</td>
                                                            <td>
                                                                <div class="input-group date datepicker" id="">
                                                                    <input type="text" class="form-control" name='trans_date' readonly=""  aria-describedby="sizing-addon2" value="<?php echo $originalDate; ?>" required="">
                                                                    <span class="input-group-btn input-group-addon" >
                                                                        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <button class="btn btn-success" name="submit" type="submit">Create Invoice</button>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>


                                        </table>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?> 



<script src="<?php echo base_url(); ?>assets/assets/libs/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    // Date Picker
    $(function () {
//        jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
        jQuery('.datepicker-autoclose').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: new Date(),
            todayHighlight: true

        });
//        jQuery('#date-range').datepicker({
//            toggleActive: true
//        });
//        jQuery('#datepicker-inline').datepicker({
//            todayHighlight: true
//        });
        jQuery('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: new Date(),
            todayHighlight: true
        });
    })
</script>

<script src="<?php echo base_url(); ?>assets/angular/ng-invoice.js"></script>