<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- ================== BEGIN PAGE CSS STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>

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
                    <?php
                    foreach ($eventlist as $key => $value) {
                        ?>
                      
                            <div class="">


                                <div class="card">
                                    <div class="row">
                                        <div class="card-body col-6" >
                                            <div class="row">
                                                <div class="col-5">
                                                    <center class="m-t-30"> <img src="<?php echo $value["movie"]['image']; ?>" class="" width="150">

                                                    </center>
                                                </div>
                                                <div class="col-7">
                                                    <h4 class="card-title m-t-10"><?php echo $value["movie"]['title']; ?></h4>
                                                    <h6 class="card-subtitle"><?php echo $value["movie"]['attr']; ?></h6>

                                                    <small class="text-muted">Description </small>
                                                    <h6>  <p>
                                                            <?php echo $value["movie"]['about']; ?>  
                                                        </p></h6>

                                                    <small class="text-muted p-t-30 db">Theater</small>
                                                    <h6><?php echo $value["theaterobj"]["title"]; ?></h6> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body col-3" > 


                                            <div class="row">
                                                <table class="table">
                                                    <tr>
                                                        <th>Seat(s) Class</th>
                                                        <th>Price</th>
                                                    </tr>
                                                    <?php
                                                    $theaterlist = $value["template"]["class_price"];
                                                    foreach ($theaterlist as $tkey => $tvalue) {
                                                        ?>
                                                        <tr >

                                                            <td><?php echo $tvalue["class_name"]; ?></td>
                                                            <td>{{<?php echo $tvalue["class_price"]; ?>|currency:'<?php echo GLOBAL_CURRENCY; ?>'}}</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>



                                        </div>
                                        <div class="card-body col-3" > 


                                            <div class="row">
                                                <table class="table">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                    <?php
                                                    $theaterlist = $value["event_datetime"];
                                                    foreach ($theaterlist as $key => $evalue) {
                                                        ?>
                                                        <tr >

                                                            <td><?php echo $evalue["event_date"]; ?></td>
                                                            <td><?php echo $evalue["event_time"]; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>

                                        </div>
                                    </div>





                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <!-- end #content -->
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