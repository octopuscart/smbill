<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');

echo $bktype = $booking['booking_type'];
$statusarray = array(
    "Refund" => array("status" => "Cancelled", "payment" => "Payment Refund"),
    "Paid" => array("status" => "Paid", "payment" => "Payment Confirmed"),
    "Purchased" => array("status" => "Confirmed (Payment Awaiting)", "payment" => "Awaiting Payment Confirmation"),
    "Reserved" => array("status" => "Reserved", "payment" => "Unpaid"),
    "Cancelled" => array("status" => "Cancelled", "payment" => "Cancelled"),
    "Not Paid" => array("status" => "Not Paid", "payment" => "Unpaid"),
);
$bookingtype = $statusarray[$bktype]["status"];
$paymenttype = $statusarray[$bktype]["payment"];
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<style>


    .seaticon{
        background-image: url(<?php echo base_url(); ?>assets/movies/seat.png)!important;
        height: 20px;
        width: 26px!important;
        background-size: 30px;
        background-repeat: no-repeat;
        background-color: white;
        border: 1px solid #fff;
        background-position: center;
        padding: 0px;
    }


    .theaterblockseat.sitable{

    }

    .theaterblock tbody{
        margin: 5px;
    }

    .theaterblockblank{
        height: 50px;
    }
    .theaterblockprice{

        transform: rotate(90deg);
    }

</style>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Booking No: #<?php echo $booking['booking_no']; ?></h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url("MovieEvent/eventReport/" . $booking['event_id']) ?>" class="btn waves-effect waves-light btn-dark"><i class="fa fa-arrow-left"></i> Back</a>
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
                <!-- Inner Page Banner Area Start Here -->

                <!-- Inner Page Banner Area End Here -->
                <!-- Contact Us Page Area Start Here -->
                <!-- Single Blog Page Area Start Here -->




                <div class="portfolio2-page-area1" style="padding: 30px" >
                    <div class="container">
                        <style>
                            .carttable{
                                border-color: #fff;
                            }

                            .carttable td{
                                padding: 5px 10px;
                                border-color: #9E9E9E;
                                text-align: left;
                            }
                            .carttable tr{
                                /*padding: 0 10px;*/
                                border-color: #9E9E9E;

                            }

                            .detailstable td{
                                padding:10px 20px;
                            }

                            .gn_table td{
                                padding:3px 0px;
                            }
                            .gn_table th{
                                padding:3px 0px;
                                text-align: left;

                            }
                            .style_block{
                                float: left;
                                padding: 1px 1px;
                                margin: 2.5px;
                                /* background: #000; */
                                color: white;
                                border: 1px solid #e4e4e4;
                                width: 47%;
                                font-size: 10px;
                            }

                            .style_block span {
                                background: #fff;
                                margin-left: 5px;
                                color: #000;
                                padding: 0px 5px;
                                width: 50%;
                            }
                            .style_block b {
                                width: 46%;
                                float: left;
                                background: #dedede;
                                color: black;
                            }
                            .ticketview{
                                text-align: center;
                                /* float: left; */
                                font-size: 12px;
                                border: 1px solid #685d5d;
                                border-radius: 5px;
                                background: #fff;
                                color: #000;
                                margin-right: 10px;
                                margin-top: 10px;
                                padding: 0px 5px;
                                display: inline-block;
                            }

                            .ticketview img{
                                height: 23px;
                            }
                            .ticketblock{

                            }

                            .ticketmainblock{
                                text-align: center;
                                /* border: 3px solid #000; */
                                width: 700px;
                                display: inline-block;
                                background: #fff;
                                padding: 13px 0px;
                            }
                            .ticketmainblock table{
                                border: 1px solid #000;
                                background: #fff;
                                border-radius: 15px;
                                border-style: dashed;

                            }
                            .ticketmainblock tr{

                            }

                            .ticketmainblock p{
                                margin:0;
                                margin-bottom: 5px;

                            }
                            .ticketmainblock h3{
                                margin:0;
                                margin-bottom: 5px;
                                font-size: 14px;
                            }
                            .totalprice td{
                                border-bottom: 1px solid #e1e1e1;
                            }
                            .ticketsmallview{
                                padding: 5px 10px;
                                margin: 5px;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#payment" role="tab"><span class="hidden-sm-up"><i class="ti-wallet"></i></span> <span class="hidden-xs-down">Payment</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#cancel" role="tab"><span class="hidden-sm-up"><i class="ti-close"></i></span> <span class="hidden-xs-down">Cancellation</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#refund" role="tab"><span class="hidden-sm-up"><i class="ti-back-left"></i></span> <span class="hidden-xs-down">Refund</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="payment" role="tabpanel">
                                        <div class="mt-4">
                                            <h3>Booking Payment Confirmation</h3>
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group m-b-30">
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="payment_type">
                                                                <option value="Cash Payment">Cash Payment</option>
                                                                <option value="PayMe">PayMe</option>
                                                                <option value="Bank Transfer">Bank Transfer</option>
                                                                <option value="Not Paid">Not Paid</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <span class="input-group-addon " id="sizing-addon2">Payment Date</span>
                                                            <div class="input-group date" id="datepicker">

                                                                <input type="text" class="form-control" name='payment_date'  aria-describedby="sizing-addon2" value="<?php echo  $payment_date;  ?>">
                                                                <span class="input-group-btn input-group-addon" >
                                                                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                                </span>

                                                            </div>
                                                        </div>

                                                      
                                                        <div class="form-group">
                                                            <span class="input-group-addon " id="sizing-addon2">Payment Time</span>
                                                            <input type="time" class="form-control" name='payment_time' required=false  aria-describedby="sizing-addon2" value="<?php echo $payment_time; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn waves-effect waves-light btn-success" name="paid">Set As Paid</button>

                                            </form>

                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="cancel" role="tabpanel">
                                        <div class="mt-4">
                                            <a type="button" class="btn waves-effect waves-light btn-danger" href="<?php echo site_url("MovieEvent/cancleBooking/" . $booking_id); ?>">Cancel Booking</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-20" id="refund" role="tabpanel">
                                        <div class="mt-4">
                                            <a type="button" class="btn waves-effect waves-light btn-warning" href="<?php echo site_url("MovieEvent/refundBooking/" . $booking_id); ?>">Set As Refund Payment</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <form action="" method="post">
                                    <div class=" col-md-12 mt-5">    
                                        <div class="form-group">
                                            <span class="input-group-addon " id="sizing-addon2">Remark</span>
                                            <textarea class="form-control" name='remark' placeholder="Write Remark Here" aria-describedby="sizing-addon2" ><?php echo $booking["remark"]; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <button class='btn btn-default' style='background: #d92229;height: 48px;
                                                float: right;
                                                color: white;' type='submit' name='proceed'>Set Remark</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="" style="text-align: center">




                            <table class="carttable"  border-color= "#fff" align="center" border="0" cellpadding="0" cellspacing="0" width="700" style="background: #fff;padding:20px;margin-bottom: 50px;">
                                <tr>
                                    <td >
                                        <div class="button-group">

                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table class="carttable"  border-color= "#fff" align="center" border="0" cellpadding="0" cellspacing="0" width="700" style="background: #fff;padding:20px">
                                <tr>
                                    <td style='width: 70%;'>
                                        <p>Hi <?php echo $booking['name']; ?>,</p>
                                        <p>Your Ticket(s) Has Been <?php echo $bookingtype; ?></p>
                                    </td>
                                    <td>
                                        <b>Booking No.:</b><br/>
                                        <p><?php echo $booking['booking_no']; ?></p>
                                    </td>
                                </tr>
                            </table>
                            <div class='ticketmainblock'>
                                <table class="carttable"  border-color= "#fff" align="center" border="0" cellpadding="0" cellspacing="0" style="padding:10px;width:650px;">
                                    <tbody>
                                        <tr>
                                            <td style='width: 40%'></td>
                                            <td style='width: 60%'></td>


                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Movie</p>
                                                <h3><?php echo $movieobj['title']; ?></h3>
                                                <?php echo $movieobj['attr']; ?>
                                            </td>
                                            <td>
                                                <p>Location/Date & Time</p>
                                                <h3><?php echo $theater['title']; ?></h3>
                                                <p><?php echo $booking['select_date']; ?>, <?php echo $booking['select_time']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;
                                                border-top: 1px solid #d9a30e;
                                                padding-top: 9px;" colspan="2">
                                                <p>Seat(s)</p>
                                                <div class='ticketblock' >
                                                    <?php
                                                    foreach ($seats as $skey => $sobj) {
                                                        ?>
                                                        <div class='ticketview' >
                                                            <img src='<?php echo base_url(); ?>assets/movies/seat.png' /><br/>
                                                            <?php echo $sobj['seat']; ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div> 
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class='ticketmainblock' >
                                <table class="carttable totalprice"  border-color= "#fff" align="center" border="0" cellpadding="0" cellspacing="0" width="700" style="background: #fff;padding:20px;border:none">
                                    <tr>
                                        <th colspan="2"><h2 style='font-size: 15px;'>Payment Summary</h2> </th>
                                    </tr>
                                    <tr style='    background: #e1e1e1;
                                        padding: 12px;
                                        height: 30px;'>
                                        <th style='width: 60%;text-align: left;padding: 0px 5px;'>Description</th><th style='text-align: right;padding: 0px 5px;'>Price</th>
                                    </tr>


                                    <tr style='' class=''>
                                        <td style="font-size: 12px;text-align: left">
                                            <b>Seat(s)</b>
                                            <div class='ticketblock' >
                                                <?php
                                                foreach ($seats as $skey => $sobj) {
                                                    ?>
                                                    <div class='ticketview'><?php echo $sobj['seat']; ?> <span>($HK<?php echo $sobj['seat_price']; ?>)</span> </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td style="font-size: 15px;text-align: right">
                                            $HK<?php echo $booking['total_price']; ?>
                                        </td>
                                    </tr>
                                    <tr style='font-size: 18px;height: 50px;'>
                                        <th style='width: 60%;text-align: right;    border-bottom: 1px solid #000;'>Total:</th><th style='text-align: right;    border-bottom: 1px solid #000;'> $HK<?php echo $booking['total_price']; ?>.00</th>
                                    </tr>
                                    <tr style='font-size: 15px;height: 50px;'>
                                        <th style='width: 60%;text-align: right;    border-bottom: 1px solid #000;'>Status:</th><th style='text-align: right;    border-bottom: 1px solid #000;'> <?php echo $paymenttype; ?></th>
                                    </tr>

                                    <?php
                                    if ($booking['booking_type'] == 'Paid') {
                                        ?>

                                        <tr style='font-size: 15px;height: 50px;'>
                                            <th style='width: 60%;text-align: right;    border-bottom: 1px solid #000;'>Payment Mode:</th><th style='text-align: right;    border-bottom: 1px solid #000;'> <?php echo $booking['payment_type']; ?></th>
                                        </tr>

                                        <?php
                                    } else {
                                        
                                    }
                                    ?>


                                </table>



                            </div>




                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>
<script>
// Date Picker
    $(function () {

        jQuery('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: new Date(),
            todayHighlight: true
        });


      $("#inlineFormCustomSelect").val("<?php echo $booking["payment_type"]?>")

    })
</script>
<script src="<?php echo base_url(); ?>assets/assets/libs/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>