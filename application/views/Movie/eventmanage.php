<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- ================== BEGIN PAGE CSS STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin #content -->
            <!-- begin #content -->
            <div id="content" class="content content-full-width">


                <div class="row el-element-overlay">
                    <div class="col-lg-12 col-md-12">


                        <div class="">


                            <div class="card">
                                <div class="row">
                                    <div class="card-body col-6" >
                                        <div class="row">
                                            <div class="col-4">
                                                <center class="m-t-30"> 
                                                    <img src="<?php echo $eventobj["movie"]['image']; ?>" class="" width="70"/></br>
                                                </center>
                                                <br/>

                                            </div>
                                            <div class="col-8">
                                                <h4 class="card-title m-t-10"><?php echo $eventobj["movie"]['title']; ?></h4>
                                                <h6 class="card-subtitle"><?php echo $eventobj["movie"]['attr']; ?></h6>



                                                <small class="text-muted p-t-30 db">Theater</small>
                                                <h6><?php echo $eventobj["theaterobj"]["title"]; ?></h6> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body col-3" > 


                                        <div class="row">
                                            <table class="">
                                                <tr>
                                                    <th>Seat(s) Class</th>
                                                    <th>Price</th>
                                                </tr>
                                                <?php
                                                $theaterlist = $eventobj["template"]["class_price"];
                                                foreach ($theaterlist as $tkey => $teventobj) {
                                                    ?>
                                                    <tr >

                                                        <td><?php echo $teventobj["class_name"]; ?></td>
                                                        <td>{{<?php echo $teventobj["class_price"]; ?>|currency:'<?php echo GLOBAL_CURRENCY; ?>'}}</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>

                                        </div>



                                    </div>
                                    <div class="card-body col-3" > 




                                    </div>
                                </div>


                                <div class="">
                                    <table class="table">
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th style="width: 150px">Status</th>
                                            <th style="width: 150px">Manage Date</th>
                                        </tr>
                                        <?php
                                        $theaterlist = $eventobj["event_datetime"];

                                        foreach ($theaterlist as $key => $eeventobj) {
                                            ?>
                                            <tr >

                                                <td><?php echo $eeventobj["event_date"]; ?></td>
                                                <td><?php echo $eeventobj["event_time"]; ?></td>
                                                <td><?php echo $eeventobj["status"] == "off" ? "Off" : "Live"; ?> </td>
                                                <td>                                  
                                                    <form action="">
                                                        <input type="hidden" name="event_id" value="<?php echo $eeventobj["id"]; ?>">
                                                        <button type="submit" name="manage_date_off" class="btn btn-danger " <?php echo $eeventobj["status"] == "off" ? "disabled" : ""; ?> > Off</button>

                                                        <button type="submit" name="manage_date_on" class="btn btn-success "  <?php echo $eeventobj["status"] == "off" ? "" : "disabled"; ?> > On</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="4">
                                                <button  data-toggle="modal" data-target="#add_event"  class="btn btn-default"> <i class="fa fa-plus"></i> Add New Date/Time</button>
                                            </td>
                                        </tr>
                                    </table>

                                </div>


                            </div>

                        </div>



                    </div>
                    <!-- end #content -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add_event" tabindex="-1" role="dialog" aria-labelledby="changePassword">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Social Link</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Select Date</label>
                            <input type="text"   name="event_date" class="form-control datepicker-autoclose" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>"  required="1" placeholder="yyyy-mm-dd">


                        </div>
                        <div class="form-group">
                            <label for="link_url">Select Time</label>
                            <input type="time" name="event_time" class="form-control"  required="" placeholder="hh:mm 24 hours format">


                        </div>



                    </div>


                    <div class="modal-footer">
                        <button type="submit" name="submitData" class="btn btn-primary">Submit</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
$this->load->view('layout/footer');
?>
<script>
function changeCategory(cat_name, cat_id) {
    $("#category_name").text(cat_name);
    $("#category_id").val(cat_id);
}

$(function () {


    $('#tags').tagit({
        availableTags: <?php echo json_encode($tags); ?>
    });






<?php
$checklogin = $this->session->flashdata('checklogin');
if ($checklogin['show']) {
    ?>
        $.gritter.add({
            title: "<?php echo $checklogin['title']; ?>",
            text: "<?php echo $checklogin['text']; ?>",
            image: '<?php echo base_url(); ?>assets/emoji/<?php echo $checklogin['icon']; ?>',
                        sticky: true,
                        time: '',
                        class_name: 'my-sticky-class '
                    });
    <?php
}
?>
            })
</script>

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