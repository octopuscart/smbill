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
                            <table class="table">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                <img src="<?php echo $eventobj["movie"]['image']; ?>" alt="user" class="" width="45">
                                            </div>
                                            <div class="m-l-10" style="margin-left: 10px;">
                                                <h4 class="m-b-0 font-16"><?php echo $eventobj["movie"]['title']; ?></h4>
                                                <span style="font-size: 10px;"><?php echo $eventobj["movie"]['attr']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="m-l-10" style="margin-left: 10px;">
                                                <h4 class="m-b-0 font-16"><?php echo $eventobj["theater"]['title']; ?></h4>
                                                <span ><?php echo $eventobj["event_date"]; ?> <?php echo $eventobj["event_time"]; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="panel-heading with-border">
                                <?php
                                $this->load->view('Movie/eventdates', array("event_id" => $eventobj["id"], "dateselected" => $dateselected));
                                ?>
                                <div  style="clear:both"></div>
                            </div>
                            <!-- /.panel-header -->
                            <div class="panel-body" style="margin-top: 20px;">
                                <h3>Seats Collection</h3>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white">
                                                    <?php echo $totaldata["totalavailable"] ?>
                                                </h1>
                                                <h6 class="text-white">Total Seats</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-orange text-center">
                                                <h1 class="font-light text-white">
                                                    <?php echo $totaldata["reserved"] ?>
                                                </h1>
                                                <h6 class="text-white">Reserved</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-green-darker text-center" style="background: green;">
                                                <h1 class="font-light text-white">
                                                    <?php echo $totaldata["paid"] ?>
                                                </h1>
                                                <h6 class="text-white">Purchase</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white">
                                                    <?php echo $totaldata["pending"] ?>
                                                </h1>
                                                <h6 class="text-white">Pending</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <hr/>
                                <h3 class="font-light text-dark">Payment Collection: <b>{{<?php echo $totaldata["totalpayments"]; ?>|currency}}</b></h3>

                                <div class="row m-t-40">

                                    <?php
                                    foreach ($totalpaymentsdata as $ptkey => $ptvalue) {
                                        ?>
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card card-hover">
                                                <div class="box bg-grey text-center">
                                                    <h3 class="font-light text-dark">
                                                        {{<?php echo $ptvalue["total_payment"] ?>|currency}}
                                                    </h3>
                                                    <h6 class="text-dark"><?php
                                                        echo $ptkey;
                                                        ?>
                                                    </h6>
                                                    <br/>
                                                    <b>Total Seats: <?php echo $ptvalue["total_seats"] ?></b>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <hr/>
                                <table id="tableDataOrder" class="table table-bordered   tableDataOrder" >
                                    <thead>
                                        <tr>
                                            <th style="width: 70px">S. No.</th>
                                            <th style="width:25%">Booking Information</th>
                                            <th style="width:20%">Customer Information</th>
                                            <th style="width:25%">Seat(s) Information</th>
                                            <th style="width:25%">Booking Type</th>
                                            <th style="width:25%">Action</th>



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
                                                                <th>Booking. No.</th>
                                                                <td><?php echo $value->booking_no; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Amt.</th>
                                                                <td>{{<?php echo $value->total_price; ?>|currency:" "}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Date/Time</th>
                                                                <td><?php echo $value->booking_date; ?> <?php echo $value->booking_time; ?></td>
                                                            </tr>

                                                        </table>

                                                    </td>

                                                    <td>


                                                        <table class="small_table">
                                                            <tr>
                                                                <th><i class="fa fa-user"></i></th>
                                                                <td class="overtext"><?php echo $value->name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><i class="fa fa-envelope"></i></th>
                                                                <td class="overtext"> <?php echo $value->email; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th><i class="fa fa-phone"></i> </th>
                                                                <td> <?php echo $value->contact_no; ?></td>
                                                            </tr>

                                                        </table>

                                                    </td>
                                                    <td >

                                                        <div class="row" style="margin-top: 10px;">
                                                            <?php
                                                            foreach ($value->seats as $skey => $svalue) {
                                                                echo "<span class='bookingseats $value->booking_type'>" . $svalue->seat . "</span>";
                                                            }
                                                            ?>
                                                        </div>



                                                    </td>


                                                    <td>
                                                        <?php
                                                        echo $value->booking_type;
                                                        ?>

                                                        <br/>
                                                        <?php
                                                        echo $value->payment_type;
                                                        ?>
                                                        <br/>
                                                        <p style="font-size: 10px"> <?php
                                                            echo $value->remark ? "<b>Remark</b>:  " . $value->remark : "";
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td>

                                                        <a href="<?php echo site_url("MovieEvent/yourTicket/" . $value->booking_id); ?>" class="btn btn-primary btn-sm" style="    margin-top: 20%;">Update <i class="fa fa-arrow-circle-right"></i></a>

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
            "search": "Search Order By Email, Mobile No., Booking Date Etc.  "
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