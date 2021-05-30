<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>

<div class="page-wrapper" ng-controller="booknowEventController">
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
                                        <td >

                                            <a href="#" data-toggle="modal" ng-click="selectBookingSeats(<?php echo $tvalue["id"]; ?>)" data-target=".bs-example-modal-sm" class="btn waves-light btn-success">Book Now</a>

                                        </td>
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

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="selectSeats" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Book Now</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body"> 
                    <div class="form-group row">
                        <label for="com1" class="col-sm-6  control-label col-form-label">No Of Seat(s)</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="com1" placeholder="1" ng-model="booking.no_of_seats">
                        </div>
                    </div>
                    <a href="<?php echo site_url("MovieEvent/bookNow/"); ?>{{booking.event_id}}/{{booking.no_of_seats}}" class="btn waves-light btn-success">Book Now</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>
<script>

    var theater_id = "<?php echo $theaterobj ? $theaterobj['layout'] : ""; ?>";

</script>

<script src="<?php echo base_url(); ?>assets/angular/ng-movies.js"></script>
