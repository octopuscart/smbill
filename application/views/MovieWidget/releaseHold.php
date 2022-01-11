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
                <h3 class="panel-title">
                    Hold Seats Reports

                </h3>


                <div class="row el-element-overlay">
                    <div class="col-lg-12 col-md-12">


                        <div class="">
                            <?php
                            if ($holdevent) {
                                foreach ($holdevent as $key => $eventobjhold) {
                                    $eventobj = $eventobjhold["event"];
                                    $holdseat = $eventobjhold["hold"];
                                    ?>

                                    <div class="card">
                                        <div class="row">
                                            <div class="card-body col-6" >
                                                <div class="row">
                                                    <div class="col-3">
                                                        <center class="m-t-30"> 
                                                            <img src="<?php echo $eventobj["movie"]['image']; ?>" class="" width="70"/></br>
                                                        </center>
                                                        <br/>

                                                    </div>
                                                    <div class="col-6">
                                                        <h4 class="card-title m-t-10"><?php echo $eventobj["movie"]['title']; ?></h4>
                                                        <h6 class="card-subtitle"><?php echo $eventobj["movie"]['attr']; ?></h6>



                                                        <small class="text-muted p-t-30 db">Theater</small>
                                                        <h6><?php echo $eventobj["theater"]["title"]; ?></h6> 
                                                    </div>
                                                    <div class="col-3">
                                                        <p><?php echo $eventobj["event_date"]; ?></p>
                                                        <p><?php echo $eventobj["event_time"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body col-6" > 


                                                <div class="row">
                                                    <?php
                                                    echo implode(", ", $holdseat);
                                                    ?>

                                                </div>



                                            </div>

                                        </div>





                                    </div>
                                                    <a class="btn btn-primary p-l-40 p-r-40 " href="<?php echo site_url("MovieEvent/removeHold"); ?>" style="color:white;float:left;"><i class="ti-trash"></i> Remove All</a>

                                    <?php
                                }
                            }else{
                                echo "<H1>No seat(s) are hold.</h1>";
                            }
                            ?>
                        </div>



                    </div>
                    <!-- end #content -->
                </div>
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