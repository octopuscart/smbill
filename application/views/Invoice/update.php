<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- ================== BEGIN PAGE CSS STYLE ================== -->
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jqueryui-editable/js/jqueryui-editable.min.js"></script>
<!--<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet" />-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<link href="<?php echo base_url(); ?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<!-- ============================================================== -->
<div class="page-wrapper" ng-controller="invoiceConroller">
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Invoice #<?php echo $invoice_data["invoice_no"]; ?></h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url("Invoice/reports") ?>" class="btn btn-default"><i class="fa fa-backward"></i> Back to Reports</a>
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
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-warning p-l-40 p-r-40"  data-toggle="modal" data-target="#changeparty"><i class="fa fa-edit"></i> Update Party/Consignee</button>
                                    <button type="button" class="btn btn-success p-l-40 p-r-40 pull-right"  onclick="printDiv('printArea')"><i class="fa fa-print"></i> Print Invoice (With Header)</button>
                                    <button type="button" class="btn btn-success p-l-40 p-r-40 pull-right"  onclick="printDiv('printAreaWithoutHeader')"><i class="fa fa-print"></i> Print Invoice (Without Header)</button>

                                </div>
                            </div>
                            <!-- /.panel-header -->
                            <div class="panel-body" style="margin-top: 20px;">
                                <center>
                                    <div class="print_invoice" id="printArea">
                                        <?php
                                        $this->load->view('Invoice/createBase_update', array("invoice_data" => $invoice_data, "invoice_description" => $invoice_description, "header" => 1));
                                        ?>
                                    </div>
                                    <div class="print_invoice" id="printAreaWithoutHeader" style="display: none">
                                        <?php
                                        $this->load->view('Invoice/createBase_update', array("invoice_data" => $invoice_data, "invoice_description" => $invoice_description, "header" => 0));
                                        ?>
                                    </div>

                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="changePassword">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add New Transactions</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">

                        <label  style="width: 100%;">
                            Description
                            <div class="input-group" id="">
                                <textarea type="text" class="form-control" name='description'  aria-describedby="sizing-addon2" required=""></textarea>

                            </div>
                        </label>
                        <label  style="">
                            Amount
                            <div class="input-group" id="">
                                <input type="text" class="form-control" name='amount'  aria-describedby="sizing-addon2" value="" required="">

                            </div>
                        </label>


                    </div>


                    <div class="modal-footer">
                        <button type="submit" name="submitData" class="btn btn-primary">Submit</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="changeparty" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Update Party/Consignee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <label style="width: 100%;">
                            Party
                            <select name="party_id" class="form-control">
                                <?php
                                foreach ($parties as $key => $value) {
                                    $party_name = $value["name"];
                                    $party_id = $value["id"];
                                    $selected = $invoice_data["party_id"] == $party_id ? "selected" : "";
                                    echo "<option value='$party_id' $selected>$party_name</option>";
                                }
                                ?>
                            </select>
                        </label>
                        <hr/>
                        <label  style="width: 100%;">
                            Consignee
                            <select name="consignee_id" class="form-control">
                                <?php
                                foreach ($consignee as $key => $value) {
                                    $consignee_name = $value["name"];
                                    $consignee_id = $value["id"];
                                    $selected = $invoice_data["consignee_id"] == $consignee_id ? "selected" : "";
                                    echo "<option value='$consignee_id' $selected>$consignee_name</option>";
                                }
                                ?>
                            </select>
                        </label>



                    </div>


                    <div class="modal-footer">
                        <button type="submit" name="submitPaty" class="btn btn-primary">Submit</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="remove_item" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Remove Transaction</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="">
                            <p>Are you sure want to remove this transaction?</p>
                        </div>
                        <input type="hidden" name="transection_id" value="" id="transection_id">


                    </div>


                    <div class="modal-footer">
                        <button type="submit" name="removeTransection" class="btn btn-primary">Yes</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
$this->load->view('layout/footer');
?> 
<script src="<?php echo base_url(); ?>assets/assets/libs/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>

                                        $(function () {

                                            jQuery('.datepicker-autoclose').datepicker({
                                                format: 'yyyy-mm-dd',
                                                autoclose: true,
                                                startDate: new Date(),
                                                todayHighlight: true

                                            });

                                            jQuery('.datepicker').datepicker({
                                                format: 'yyyy-mm-dd',
                                                autoclose: true,
                                                startDate: new Date(),
                                                todayHighlight: true
                                            });



                                            $('.edit_detail').click(function (e) {
                                                e.stopPropagation();
                                                e.preventDefault();
                                                $($(this).prev()).editable('toggle');
                                            });

                                            $(".editable").editable(
                                                    {
                                                        format: 'yyyy-mm-dd',
                                                        viewformat: 'yyyy-mm-dd',
                                                        placeholder: "",
                                                        emptytext: ""

                                                    });
                                            $("#remarkid").editable(
                                                    {
                                                        format: 'yyyy-mm-dd',
                                                        viewformat: 'yyyy-mm-dd',
                                                        placeholder: "",
                                                        emptytext: "Write Remark Here..."

                                                    });

                                            $('.editable').on('save', function (e, params) {
                                                window.location.reload();
                                            });
                                        });
                                        
                                        $("form").on("submit", function(){
                                            $("form button").hide();
                                        })
</script>
<script>
    function removeItem(itemid) {
        $("#transection_id").val(itemid);
    }
    function printDiv(divName) {
        $("#add_transection").hide();
        $(".remove_transections").hide();
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();
        $("#add_transection").show();
        $(".remove_transections").show();
        document.body.innerHTML = originalContents;
    }

</script>
<script src="<?php echo base_url(); ?>assets/angular/ng-invoice.js"></script>