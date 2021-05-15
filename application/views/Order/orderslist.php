<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>

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
                                $this->load->view('Order/orderdates');
                                ?>
                                <div  style="clear:both"></div>
                            </div>
                            <!-- /.panel-header -->
                            <div class="panel-body">

                                <table id="tableDataOrder" class="table table-bordered  tableDataOrder">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px">S. No.</th>
                                            <th style="width:200px">Order Information</th>
                                            <th style="width:200px">Customer Information</th>
                                            <th style="width:250px">Shipping Address</th>
                                            <th style="width:100px">Payment Type</th>
                                            <th>Status</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($orderslist)) {
                                            $count = 1;
                                            foreach ($orderslist as $key => $value) {
                                                ?>
                                                <tr style="border-bottom: 1px solid #000;">
                                                    <td>
                                                        <?php echo $count; ?>
                                                    </td>
                                                    <td>

                                                        <table class="small_table">
                                                            <tr>
                                                                <th>Ord. No.</th>
                                                                <td>: <?php echo $value->booking_no; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Amt.</th>
                                                                <td>: {{<?php echo $value->total_price; ?>|currency:" "}}</td>
                                                            </tr>
                                                   
                                                        </table>

                                                    </td>

                                                    <td>

                                                        <b> <?php echo $value->name; ?></b>
                                                        <table class="small_table">
                                                            <tr>
                                                                <th><i class="fa fa-envelope"></i> &nbsp; </th>
                                                                <td class="overtext"> <a href="#" title="<?php echo $value->email; ?>"><?php echo $value->email; ?></a></td>
                                                            </tr>
                                                            <tr>
                                                                <th><i class="fa fa-phone"></i>  &nbsp;</th>
                                                                <td> <?php echo $value->contact_no; ?></td>
                                                            </tr>

                                                        </table>

                                                    </td>
                                                    <td style="font-size: 10px;">

                                                        <?php echo $value->address1; ?><br/>
                                                        <?php echo $value->address2; ?><br/>
                                                        <?php echo $value->state; ?>
                                                        <?php echo $value->city; ?>

                                                        <?php echo $value->country; ?> <?php echo $value->zipcode; ?>


                                                    </td>


                                                    <td>
                                                        <?php
                                                        echo $value->payment_mode;
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        echo "" . $value->status . "<br/>";
                                                        echo $value->status_datetime;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url("order/orderdetails/" . $value->order_key); ?>" class="btn btn-primary btn-sm" style="    margin-top: 20%;">Update <i class="fa fa-arrow-circle-right"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        } else {
                                            ?>
                                        <h4><i class="fa fa-warning"></i> No order found</h4>
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
                "search": "Search Order By Email, Order No., Order Date Etc."
            }
        })
    })
</script>