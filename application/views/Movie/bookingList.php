<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>

<style>
    .color0{
        background:red!important;
    }
    .color1{
        background:orange!important;
    }
    .color2{
        background:purple!important;
    }
    .color3{
        background:blue!important;
    }
    .color4{
        background:greenyellow!important;
    }
    .color5{
        background:yellow!important;
    }.color6{
        background:deeppink!important;
    }

    .theaterblockseat{
        padding: 5px!important;
        padding-left: 3px!important;
        padding-right: 3px!important;
        padding-top: 14px!important;
    }
    .seaticon{
        height: 25px;
        width: 23px!important;
        background-size: 30px;
        background-repeat: no-repeat;
        background-position: center;
        padding: 7px 0px;
        background: #4c32e9;
        color: white;
    }
    .seaticon:hover{
        background: #fb8c00;
        color:white;
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

    h5.theaterblocktext {
        font-size: 9px;
        letter-spacing: 0px
    }
    .classtitle{
        text-transform: uppercase;
        font-weight: bold;
    }
    .seaticon.active {
        background: #cecece;
        color: white;
    }

</style>
<div class="page-wrapper" ng-controller="updateEventController">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin #content -->
            <!-- begin #content -->
            <div id="content" class="content content-full-width">
                <div class="feed-widget scrollable ps-container ps-theme-default "  >
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Show Title</th>
                                    <th class="border-top-0">Location</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">Time</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($eventlist as $tkey => $tvalue) {
                                    ?>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-10">
                                                    <img src="<?php echo $tvalue["movie"]['image']; ?>" alt="user" class="" width="45">
                                                </div>
                                                <div class="m-l-10" style="margin-left: 10px;">
                                                    <h4 class="m-b-0 font-16"><?php echo $tvalue["movie"]['title']; ?></h4>
                                                    <span><?php echo $tvalue["movie"]['attr']; ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $tvalue["theater"]['title']; ?></td>
                                        <td><?php echo $tvalue["event_date"]; ?></td>
                                        <td ><?php echo $tvalue["event_time"]; ?></td>
                                        <td ><a href="<?php echo site_url("MovieEvent/bookNow/".$tvalue["id"]);?>" class="btn waves-light btn-success">Book Now</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>                        





                    </ul>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 450px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 432px;"></div></div>

                </div>
            </div>
            <!-- end #content -->
        </div>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>
<script>

    var theater_id = "<?php echo $theaterobj ? $theaterobj['layout'] : ""; ?>";

</script>

<script src="<?php echo base_url(); ?>assets/angular/ng-movies.js"></script>
