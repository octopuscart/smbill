<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<style>
    .small_table td, .small_table th{
        padding:5px;
        font-size: 12px;
    }
    .bookingseats{
        margin-left: 5px;
        font-size: 10px;
        border: 1px solid #22c6ab;
        padding: 5px 5px;
        margin-top: 5px;
        background: orange;
        font-weight: 600;
        color: white;
    }
    .bookingseats.Purchased{
        background: lightgreen;
    }

    .bookingseats.Paid{
        background: green;
    }

    .bookingseats.Reserved{
        background: orange;
    }

    .bookingseats.Cancelled{
        background: red;
    }
</style>

<link href="<?php echo base_url(); ?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />



<script src="<?php echo base_url(); ?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Booking Reports</h4>
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
                                <?php
                                $this->load->view('Invoice/eventdates', array("dateselected" => $dateselected));
                                ?>
                                <div  style="clear:both"></div>
                            </div>
                            <!-- /.panel-header -->
                            <div class="panel-body" style="margin-top: 20px;">





                                <hr/>
                                <table id="tableDataOrder" class="table table-bordered   tableDataOrder" style="    font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px">S. No.</th>
                                            <th style="width:130px;">Invoice No.</th>
                                            <th style="width:25%">Party</th>
                                            <th style="width:20%">Consignee</th>
                                            <th style="width:25%">Invoice. Date</th>
                                            <th style="width:25%">Total Amount</th>
                                            <th style="width:25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($invoiceslist)) {
                                            $count = 1;
                                            foreach ($invoiceslist as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $value["invoice_no"]; ?></td>
                                                    <td><?php echo $value["party_name"]; ?></td>
                                                    <td><?php echo $value["consignee_name"]; ?></td>
                                                    <td><?php echo $value["trans_date"]; ?></td>
                                                    <td><?php echo $value["total_amount"]; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url("Invoice/update/" . $value["id"]); ?>" class="btn btn-success p-l-40 p-r-40 pull-right"  onclick="printDiv('printAreaWithoutHeader')"><i class="fa fa-print"></i> View</a>

                                                    </td>
                                                </tr>

                                                <?php
                                                $count++;
                                            }
                                        } else {
                                            ?>

                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
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

<script>
    $(function () {

        setTimeout(function () {
            location.reload();
        }, 500000);

    })


    $(function () {
        $("#daterangepicker").daterangepicker({
            format: 'YYYY-MM-DD',
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                "Today's": [moment(), moment()],
                "Tomorrow's": [moment().add(1, 'days'), moment().add(1, 'days')],
                'Next 7 Days': [moment(), moment().add(6, 'days')],
                'Next 30 Days': [moment(), moment().add(29, 'days')],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',

        }, function (start, end, label) {
            $('input[name=daterange]').val(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        $('#tableDataOrder').DataTable({
            "language": {
                "search": "Search By Invoice No./ Party / Consignee "
            }
        })
    })
</script>

<script>
    $(function () {

//        $('#tableDataOrder').DataTable({
//            language: {
//                "search": "Apply filter _INPUT_ to table"
//            }
//        })
    })

</script>