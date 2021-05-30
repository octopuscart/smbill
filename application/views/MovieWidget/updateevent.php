<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<style>

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
                <!-- begin wrapper -->

                <?php
                $this->load->view('MovieWidget/widgettabbar', array("activetabl" => "createdateandtime"));
                ?>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="createdateandtime" role="tabpanel">
                        <div class="wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body" >
                                            <div class="row">
                                                <div class="col-1">
                                                    <center class="m-t-30"> <img src="<?php echo $movie['image']; ?>" class="" width="70">

                                                    </center>
                                                </div>
                                                <div class="col-7">
                                                    <h4 class="card-title m-t-10"><?php echo $movie['title']; ?></h4>
                                                    <h6 class="card-subtitle"><?php echo $movie['attr']; ?></h6>

                                                    <small class="text-muted p-t-30 db">Theater</small>
                                                    <h6><?php echo $theaterobj["title"]; ?></h6> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <form action="#" method="post" enctype="multipart/form-data" class="row">
                                        <div class="col-6">
                                            <div class="card-body bg-light">
                                                <h4 class="card-title">Set Event Date/Time
                                                    <button type="button"  class="btn btn-primary p-l-40 p-r-40" style="float:right" ng-click="addNewDate()"><i class="ti-plus"></i></button>

                                                </h4>
                                                <label for="example-date-input" class=" col-form-label">Date Time</label>
                                                <div class="form-group " ng-repeat="(dky, datetime) in eventselectionSelection.datetimelist">
                                                    <div class=" ">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <input class="form-control datepicker-autoclose" name="event_date[]" type="text" value="" ng-model="datetime.event_date" min="<?php echo date("Y-m-d"); ?>" id="datepicker{{dky}}">
                                                            </div>

                                                            <div class="col-5">
                                                                <input class="form-control" type="time" value="" name="event_time[]"  ng-model="datetime.event_time" min="<?php echo date("H:m:s A"); ?>">
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button"  class="btn btn-primary p-l-40 p-r-40" ng-click="removeLastDate(dky)" ng-if="$index > 0"><i class="ti-trash"></i></button>

                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <div class="col-6">


                                            <div class="card">
                                                <div class="card-body" > 
                                                    <small class="text-muted  db">Seat Price</small>
                                                    <div class="row">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Seats Class</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            <?php
                                                            foreach ($templateobj["class_price"] as $key => $value) {
                                                                ?>
                                                                <tr >

                                                                    <td style="text-transform: uppercase"><?php echo $value["class_name"] ?></td>
                                                                    <td>{{<?php echo $value["class_price"] ?>|currency:'<?php echo GLOBAL_CURRENCY; ?>'}}</td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>

                                                        </table>




                                                    </div>

                                                </div>
                                            </div>


                                        </div>

                                        <div class=" bg-light-info" style="margin-top: 15px;width:100%;height: 55px;">
                                            <div class="col-md-12" style="padding: 10px;">
                                                <a class="btn btn-primary p-l-40 p-r-40 " href="<?php echo site_url("MovieEvent/widgetTheaterPrice/$theater_id/$movie_id"); ?>" style="color:white;float:left;"><i class="ti-arrow-left"></i> Previous</a>
                                                <button  class="btn btn-dark bg-green-darker"  type="submit" name="submit_data"style="float:right;"><i class="ti-check"></i> Finish  </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end #content -->

        </div>
    </div>

    <?php
    $this->load->view('layout/footer');
    ?>
    <script>

        var theater_id = "<?php echo $theater_id; ?>";
        var event_time = "<?php echo date("H:m:s A"); ?>";
        var event_date = "<?php echo date("Y-m-d"); ?>";</script>
    <script src="<?php echo base_url(); ?>assets/assets/libs/moment/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        // Date Picker
        $(function () {
        jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
        jQuery('.datepicker-autoclose').datepicker({
        format: 'yyyy-mm-dd',
                autoclose: true,
                startDate: new Date(),
                todayHighlight: true
        });
        jQuery('#date-range').datepicker({
        toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
        });
        })
    </script>
    <script src="<?php echo base_url(); ?>assets/angular/ng-movies.js"></script>
