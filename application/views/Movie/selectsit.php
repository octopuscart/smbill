<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>

<style>


    .seaticon{
        background-image: url(<?php echo base_url(); ?>assets/movies/seat.png)!important;
        height: 20px;
        width: 26px!important;
        background-size: 30px;
        background-repeat: no-repeat;

        background-position: center;
        padding: 0px;
    }
     .wheelchairseat{
        background-image: url(<?php echo base_url(); ?>assets/movies/wheelchair.png)!important;
        background-size: 20px;
        background-repeat: no-repeat;
        background-position: center;
        background-color:white;
        border-radius:5px;
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



    .theaterblock{
        text-align: center;
        width: max-content;
    }
    .theaterblock table{
        width: auto;
        display: inline-block;
    } 
    .theaterblocktext{
        color:black;
    }

    h5.theaterblocktext {
        margin-top: 0px;
        text-align: center;
        font-size: 9px;
        background: #000;
        color: white;
        height: 20px;
        line-height: 20px;
        display: none; 
        border-radius: 4px;
    }

    .seaticon.active {
        background-color: #FFF176;
        box-shadow: none;

    }

    .seaticon:hover {
        background-color: #FFF176;
        box-shadow: none;
    }

    .seaticon:hover .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;

    }

    .seaticon.active .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;

    }

    .seaticon.suggestion .theaterblocktext{
        background-color: #edd608;
        color:#fff;
        display: block;
    }

    .seaticon.active .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;

    }

    .seaticon.active .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;
    }



    .theaterpricetable td{
    }

    .theaterpricetable .seattext{

    }

    .theaterblock td{
        padding: 0px!important;
        width: 30px;
        height: 20px;
        text-align: center;
        font-size: 12px;
    }
    .theaterblockseat {

    }

    .theaterpricetable th {

    }

    .pricetotal {
        background: #d92229;
        height: 29px;
        line-height: 16px;
        color: white;
    }
    .theaterblock {
        text-align: center;

    }

    .theaterblock::-webkit-scrollbar {
        width: 10px;
    }

    .theaterblock::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .theaterblock::-webkit-scrollbar-thumb {
        background: #888;
    }

    .theaterpricetable.pricescroll {
        overflow-y: scroll;
        height: 250px;
    }

    .theaterscreen{
        float: left;
        width: 100%;
        height: 24px;
        background: #EEEEEE;
        border-top-left-radius: 32px;
        border-top-right-radius: 37px;
        text-align: center;
        line-height: 24px;
        font-size: 17px;

    }

    .seatresurved {
        opacity: 1!important;
        background: #BDBDBD!important;
    }

    .seatbooked{
        opacity: 0.4;
        opacity: 1!important;
        background: #039c06!important;
    }


    .theaterblock{
        text-align: center;
    }
    .theaterblock table{
        width: auto;
        display: inline-block;
    } 
    .theaterblocktext{
        color:black;
    }

    h5.theaterblocktext {
        margin-top: 0px;
        text-align: center;
        font-size: 9px;
        background: #000;
        color: white;
        height: 20px;
        line-height: 20px;
        display: none; 
        border-radius: 4px;
    }

    .seaticon.active {
        background-color: #FFF176;
        box-shadow: none;

    }

    .seaticon:hover {
        background-color: #FFF176;
        box-shadow: none;
    }

    .seaticon:hover .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;

    }

    .seaticon.active .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;

    }

    .seaticon.suggestion .theaterblocktext{
        background-color: #edd608;
        color:#fff;
        display: block;
    }

    .seaticon.active .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;

    }

    .seaticon.active .theaterblocktext{
        background-color: #8BC34A;
        color:#fff;
        display: block;
    }



    .theaterpricetable td{
    }

    .theaterpricetable .seattext{

    }

    .theaterblock td{
        padding: 0px!important;
        width: 30px;
        height: 20px;
        text-align: center;
        font-size: 12px;
    }
    .theaterblockseat {

    }

    .theaterpricetable th {

    }

    .pricetotal {
        background: #d92229;
        height: 29px;
        line-height: 16px;
        color: white;
    }
    .theaterblock {
        text-align: center;

    }

    .theaterblock::-webkit-scrollbar {
        width: 10px;
    }

    .theaterblock::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .theaterblock::-webkit-scrollbar-thumb {
        background: #888;
    }

    .theaterpricetable.pricescroll {
        overflow-y: scroll;
        height: 250px;
    }

    .theaterscreen{
        float: left;
        width: 100%;
        height: 24px;
        background: #EEEEEE;
        border-top-left-radius: 32px;
        border-top-right-radius: 37px;
        text-align: center;
        line-height: 24px;
        font-size: 17px;

    }

    .seatresurved {
        opacity: 1!important;
        background: #BDBDBD!important;
    }

    .seatresurvedpaid {
        opacity: 1!important;
        background: green!important;
    }

    .seatbooked{
        opacity: 0.4;
        opacity: 1!important;
        background: orange!important;
    }


</style>

<div class="page-wrapper" ng-controller="sitSelectContoller">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin #content -->
            <!-- begin #content -->
            <div id="content" class="content content-full-width">
                <div class="portfolio2-page-area1" style="" >
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-t-40">

                                    <div class="col-md-6">
                                        <h4 class="card-title"><?php echo $event_info["movie"]["title"]; ?></h4>
                                        <h6 class="card-subtitle m-b-20 text-muted"><?php echo $event_info["movie"]["attr"]; ?></h6>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="card-title">Location: <?php echo $event_info["theater"]["title"]; ?></h4>
                                        <h6 class="card-subtitle m-b-20 text-muted">Date/Time: <?php echo $event_info["event_date"] . " " . $event_info["event_time"]; ?></h6>
                                    </div>
                                </div>
                                <div class="col-sm-12" style='padding: 0px;margin-top:20px;'>
                                    <form action='#' method="post" id="bookingform">
                                        <div class="row">
                                            <div class=" col-md-3">
                                                <div class="form-group">
                                                    <span class="input-group-addon " id="sizing-addon2">Name</span>
                                                    <input type="text" class="form-control" name='name' placeholder="Name" aria-describedby="sizing-addon2" required="">
                                                </div>
                                            </div>
                                            <div class=" col-md-3">
                                                <div class="form-group">
                                                    <span class="input-group-addon " id="sizing-addon2">Email</span>
                                                    <input type="email" class="form-control" name='email' placeholder="Email" aria-describedby="sizing-addon2" required="">
                                                </div>
                                            </div>    
                                            <div class=" col-md-3">    
                                                <div class="form-group">
                                                    <span class="input-group-addon " id="sizing-addon2">Contact No.</span>
                                                    <input type="tel" class="form-control" name='contact_no' placeholder="Contact No." aria-describedby="sizing-addon2" required="">
                                                </div>
                                            </div>
                                            <div class=" col-md-9">    
                                                <div class="form-group">
                                                    <span class="input-group-addon " id="sizing-addon2">Remark</span>
                                                    <textarea class="form-control" name='remark' placeholder="Write Remark Here" aria-describedby="sizing-addon2" ></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='ticketblock' style="margin: 10px 0px 10px 0px;" >
                                            <p style="margin-bottom: 0px">Seat(s)</p>
                                            <div class='ticketview' ng-repeat="(sps, spp) in seatSelection.selected">
                                                <img src='<?php echo base_url(); ?>assets/movies/seat.png' /><br/>
                                                {{sps}}<br/>
                                                {{spp.price|currency}}
                                                <input type='hidden' name='ticket[]' value='{{sps}}'/>
                                                <input type='hidden' name='price[]' value='{{spp.price}}'/>
                                            </div>

                                        </div> 
                                        <div class="row">
                                            <div class="col-md-6">

                                                <table class="theaterpricetable table">

                                                    <tr class='pricetotal'>
                                                        <td>Total</td>
                                                        <th style='width:60%;'>{{seatSelection.total|currency}}</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <div class='checkoutbutton' style='text-align: left;' ng-if="seatSelection.total > 0">

                                                    <button class='btn btn-default' id="bookingbutton" style='background: #d92229;height: 48px;
                                                            float: right;
                                                            color: white;' type='submit' name='proceed'>Proceed Checkout/Reserve  <span aria-hidden="true">&rarr;</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="    overflow-x: scroll;">
                                <div class="theaterblock" style="overflow-x: scroll;">
                                    <table class=" table" >
                                        <tbody>
                                            <tr>
                                                <td colspan="{{theaterLayout.layout.totalinrow}}">
                                                    <div class='theaterscreen'>SCREEN HERE</div>
                                                </td>
                                            </tr>
                                        </tbody>  
                                        <tbody ng-repeat="(kclass, sclass) in theaterLayout.layout.sitclass">
                                            <tr><td class="theaterblockblank" colspan="{{theaterLayout.layout.totalinrow}}"></td></tr>
                                            <tr style="background: {{sclass.color}}"><td class="theaterblockblank" colspan="{{theaterLayout.layout.totalinrow}}">{{sclass.price|currency}}</td></tr>

                                            <tr ng-repeat="(rt, rows) in sclass.row" style="background: {{sclass.color}}">
                                                <td>{{rt}}</td>
                                                <td class="theaterblockseat {{sit?'sitable':''}}" ng-repeat="(sit, chkatr) in rows">
                                                    <div  ng-if="sit" ng-switch="chkatr">
                                                        <div ng-switch-when="A">
                                                            <button id="{{sit}}" class="btn btn-link btn-sm seaticon {{sit == seatSelection.selected[sit].seat?'active':''}}" ng-click="selectSeat(sit, sclass.price)" ng-mouseenter="selectSeatSuggest(sit, kclass)" ng-mouseleave="selectRemoveClass(sit, kclass)"  title='{{sit}} ({{sclass.price|currency}}) {{chkatr}}'>
                                                                <h5 class="theaterblocktext">{{sit}}</h5>
                                                            </button>
                                                        </div>
                                                        <div ng-switch-when="B">
                                                            <button class="btn btn-link btn-sm seaticon seatbooked"  disabled="" title='{{sit}} ({{sclass.price|currency}})'>
                                                                <h5 class="theaterblocktext">{{sit}}</h5>
                                                            </button>
                                                        </div>
                                                        <div ng-switch-when="P">
                                                            <button class="btn btn-link btn-sm seaticon seatresurvedpaid" disabled=""  title='{{sit}} ({{sclass.price|currency}})'>
                                                                <h5 class="theaterblocktext">{{sit}}</h5>
                                                            </button>
                                                        </div>
                                                        <div ng-switch-when="R">
                                                            <button class="btn btn-link btn-sm seaticon seatresurved" disabled=""  title='{{sit}} ({{sclass.price|currency}})'>
                                                                <h5 class="theaterblocktext">{{sit}}</h5>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <button class="btn btn-danger seatresurved col-md-4">Pre-Reserved</button>
                                            <button class="btn btn-danger seatresurvedpaid  col-md-4">Paid</button>
                                            <button class="btn btn-danger seatbooked  col-md-4">Reserved</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var layoutgbl = '<?php echo $theater['layout']; ?>';
    var event_id = '<?php echo $event_id; ?>';
    var seatsgbl = '<?php echo $total_seats; ?>';
    var template_id = "<?php echo $theater_template_id; ?>";

    $(document).on('submit', "#bookingform", function () {
        $("#bookingbutton").hide();
    });




</script>
<script src="<?php echo base_url(); ?>assets/angular/ng-movies.js"></script>

<?php
$this->load->view('layout/footer');
?>