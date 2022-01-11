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
                <!-- begin vertical-box -->
                <div class="vertical-box">

                    <!-- begin vertical-box-column -->
                    <div class="vertical-box-column">

                        <!-- begin wrapper -->
                        <div class="wrapper">
                            <!-- begin email form -->
                            <form action="#" method="post" enctype="multipart/form-data" class="row">
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?php echo (base_url() . "assets/movies/default.png"); ?>" style="    width: 100%;">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label col-form-label">Set Cover Image</label>
                                                <div class="input-group">
                              
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name='picture' id="inputGroupFile01" file-model="filename" required="">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                    <p>Image size W:600px & H:800px</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <!-- begin email to -->
                                    <div class="card-body bg-light">
                                        <h4 class="card-title">Add New Movie/Event</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputcom" class="control-label col-form-label">Title</label>
                                                    <input type="text" class="form-control" id="inputcom" placeholder="Enter Title Here" name='title'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputcom" class="control-label col-form-label">Short Description</label>
                                                    <input type="text" class="form-control" name="attr" id="inputcom" placeholder="Short Into like 2021 Legal Drama 2h 36m" name='attr'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">About Movie/Event</label>
                                                    <textarea class="form-control" name="description" aria-label="With textarea" placeholder="About Movie/Event"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputcom" class="control-label col-form-label">Video Link</label>
                                                    <input type="text" class="form-control" id="inputcom" name="trailer_link" placeholder="https://www.youtube.com/watch?v=P1xKV0Dmetg" name='title'>
                                                </div>
                                            </div>


                                        </div>
                                        <button type="submit" name="submit_data" class="btn btn-primary p-l-40 p-r-40">Add Event</button>

                                    </div>


                                    <!-- end email content -->

                                </div>
                            </form>
                            <!-- end email form -->
                        </div>
                        <!-- end wrapper -->
                    </div>
                    <!-- end vertical-box-column -->
                </div>
                <!-- end vertical-box -->
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