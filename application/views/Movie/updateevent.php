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
                <div class="wrapper row">
                    <div class="col-md-6">
                        <!-- begin email form -->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <!-- begin email to -->
                            <div class="card-body bg-light">
                                <h4 class="card-title">Create Movie/Event List</h4>
                                <div class="form-group has-success">
                                    <label class="control-label">Select Theater</label>
                                    <select class="form-control custom-select" name="theater_id">
                                        <?php
                                        foreach ($theater_list as $key => $value) {
                                            ?>
                                            <option value = "<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?> </option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                    <small class="form-control-feedback"> Select Theater For Event Here </small> 
                                </div>



                                <div class="form-group has-success">
                                    <label class="control-label">Select Template</label>
                                    <select class="form-control custom-select" name="template_id" ng-model="eventselectionSelection.selected_template">
                                        <option value="0">Select Theater Template</option>
                                        <option value="{{mvk}}" ng-repeat="(mvk, mov) in eventselectionSelection.templatelist">{{mov.title}}</option>

                                    </select>
                                    <small class="form-control-feedback"> Select Price Template </small> 
                                </div>
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
                                                <button type="button"  class="btn btn-primary p-l-40 p-r-40" ng-click="removeLastDate(dky)"><i class="ti-trash"></i></button>

                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <button type="button"  class="btn btn-primary p-l-40 p-r-40" ng-click="addNewDate()"><i class="ti-plus"></i></button>


                                <button type="submit" name="submit_data" class="btn btn-primary p-l-40 p-r-40">Create New Event</button>

                            </div>


                            <!-- end email content -->
                        </form>
                        <!-- end email form -->
                    </div>
                    <div class="col-md-6">
                        <!-- begin email form -->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <!-- begin email to -->
                            <div class="card-body bg-light">


                                <div class="card">
                                    <div class="card-body" >
                                        <div class="row">
                                            <div class="col-5">
                                                <center class="m-t-30"> <img src="<?php echo $movie['image']; ?>" class="" width="150">

                                                </center>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="card-title m-t-10"><?php echo $movie['title']; ?></h4>
                                                <h6 class="card-subtitle"><?php echo $movie['attr']; ?></h6>

                                                <small class="text-muted">Description </small>
                                                <h6>  <p>
                                                        <?php echo $movie['about']; ?>  
                                                    </p></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" > 

                                        <small class="text-muted p-t-30 db">Theater</small>
                                        <h6><?php echo $theaterobj["title"]; ?></h6> 
                                        <hr>
                                        <small class="text-muted p-t-30 db">Seat Price</small>
                                        <div class="row">
                                            <table class="table">
                                                <tr>
                                                    <th>Seat(s) Class</th>
                                                    <th>Price</th>
                                                </tr>
                                                <tr ng-repeat="classobj in eventselectionSelection.templatelist[eventselectionSelection.selected_template]['class_price']">

                                                    <td>{{classobj.class_name}}</td>
                                                    <td>{{classobj.class_price|currency:'<?php echo GLOBAL_CURRENCY; ?>'}}</td>
                                                </tr>
                                            </table>




                                        </div>

                                    </div>
                                </div>





                            </div>


                            <!-- end email content -->
                        </form>
                        <!-- end email form -->
                    </div>
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

    var theater_id = "<?php echo $theater_id; ?>";
    var event_time = "<?php echo date("H:m:s A"); ?>";
    var event_date = "<?php echo date("Y-m-d"); ?>";

</script>
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
