<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap4-editable/css/bootstrap-editable.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-editable/js/bootstrap-editable.min.js"></script>

<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"  />

<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile Page</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
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
            <!-- begin breadcrumb -->
         
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <!-- end page-header -->
            <!-- begin profile-container -->
            <div class="profile-container">
                <!-- begin profile-section -->
                <div class="profile-section row">
                    <!-- begin profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right col-md-7 ">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">

                                <table class="table table-profile">
                                    <thead>
                                        <tr>
                                            <th colspan="2">

                                                <div class="media">
                                                    <a class="media-left" href="javascript:;" style='margin-right: 10px;'>
                                                        <img src='<?php echo base_url(); ?>assets/emoji/user.png' alt="" class="media-object rounded-corner" style="    width: 45px;background: url(<?php echo base_url(); ?>assets/emoji/user.png);    height: 45px;background-size: cover;">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo $userdata->first_name; ?> <?php echo $userdata->last_name; ?></h4>
                                                        <p>
                                                            <?php echo $userdata->email; ?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!--                                        <h4>
                                                                                            <i class="ion-android-person"></i>
                                                <?php echo $userdata->first_name; ?> <?php echo $userdata->last_name; ?>
                                                                                            <small>
                                                <?php echo $userdata->email; ?>
                                                                                            </small>
                                                                                        </h4>-->
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td class="field">First Name</td>
                                            <td>
                                                <span id="first_name" data-type="text" data-pk="<?php echo $userdata->id; ?>" data-name="first_name" data-value="<?php echo $userdata->first_name; ?>" data-url="<?php echo site_url("LocalApi/updateUserSession"); ?>" data-original-title="Enter First Name" class="m-l-5 editable editable-click" tabindex="-1" data-toggle="#edit_fname" > <?php echo $userdata->first_name; ?></span><button class="btn btn-xs btn-link edit_detail" ><i class="fa fa-pencil"></i>Edit</button>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="field">Last Name</td>
                                            <td>
                                                <span id="last_name" data-type="text" data-pk="<?php echo $userdata->id; ?>" data-name="last_name" data-value="<?php echo $userdata->last_name; ?>" data-url="<?php echo site_url("LocalApi/updateUserSession"); ?>" data-original-title="Enter Last Name" class="m-l-5 editable editable-click" tabindex="-1" data-toggle="#edit_lname" > <?php echo $userdata->last_name; ?></span><button  class="btn btn-xs btn-link edit_detail" ><i class="fa fa-pencil"></i>Edit</button>
                                            </td>
                                        </tr>


                                        <tr class="highlight">
                                            <td class="field">Contact No.</td>
                                            <td>
                                                <i class="fa fa-mobile fa-lg m-r-5"></i> 
                                                <span id="contact_no" data-type="text" data-pk="<?php echo $userdata->id; ?>" data-name="contact_no" data-value="<?php echo $userdata->contact_no; ?>" data-url="<?php echo site_url("LocalApi/updateUserSession"); ?>" data-original-title="Enter Contact No." class="m-l-5 editable editable-click" tabindex="-1" data-toggle="#edit_contact" > <?php echo $userdata->contact_no; ?></span><button class="btn btn-xs btn-link edit_detail" ><i class="fa fa-pencil"></i>Edit</button>
                                            </td>
                                        </tr>


                                        <tr >
                                            <td class="field">Gender</td>
                                            <td>
                                                <span id="gender" data-type="select" data-pk="<?php echo $userdata->id; ?>" data-name="gender" data-value="<?php echo $userdata->gender; ?>" data-url="<?php echo site_url("LocalApi/updateUserSession"); ?>" data-original-title="Select Gender" class="m-l-5 editable editable-click" tabindex="-1" > <?php echo $userdata->gender; ?></span><button class="btn btn-xs btn-link edit_detail" ><i class="fa fa-pencil"></i>Edit</button>
                                            </td>
                                        </tr>
                                        


                                        <tr class="highlight">
                                            <td class="field">Profession</td>
                                            <td>
                                                <span id="profession" data-type="select" data-pk="<?php echo $userdata->id; ?>" data-name="profession" data-value="<?php echo $userdata->profession; ?>" data-url="<?php echo site_url("LocalApi/updateUserSession"); ?>" data-original-title="Select Profession" class="m-l-5 editable editable-click" tabindex="-1" > <?php echo $userdata->profession; ?></span><button class="btn btn-xs btn-link edit_detail" ><i class="fa fa-pencil"></i>Edit</button>
                                            </td>
                                        </tr>

                                        <tr class="highlight">
                                            <td class="field">Country</td>
                                            <td>
                                                <span id="country" data-type="select" data-pk="<?php echo $userdata->id; ?>" data-name="country" data-value="<?php echo $userdata->country; ?>" data-url="<?php echo site_url("LocalApi/updateUserSession"); ?>" data-original-title="Select Country" class="m-l-5 editable editable-click" tabindex="-1" > <?php echo $userdata->country; ?></span><button class="btn btn-xs btn-link edit_detail" ><i class="fa fa-pencil"></i>Edit</button>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!-- end profile-right -->
                    <div class="profile-left col-md-1 "></div>
                    <div class="profile-left col-md-4 ">


                        <!-- begin profile-highlight -->
                        <div class="profile-highlight">
                            <h4><i class="fa fa-cog"></i> Settings</h4>
                            <div class="checkbox m-b-5 m-t-0" >
                                <label><input type="checkbox" id="edit_toggle" /> Edit Profile Information</label>
                            </div>
                            <hr/>
                            <div class="checkbox m-b-0">
                                <button class="btn btn-xs btn-link" data-toggle="modal" data-target="#changePassword"><i class="fa fa-lock"></i> Change Your Password</button>
                            </div>
                        </div>
                        <!-- end profile-highlight -->
                    </div>
                    <!-- end profile-left -->

                </div>
                <!-- end profile-section -->
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="#" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Change Your Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Password</label>
                                <input type="password" name="c_password" class="form-control"  required="" placeholder="Enter Your Current Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="password" class="form-control" name="n_password"  required=""  placeholder="Enter Your Current Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control"name="r_password" required=""  placeholder="Enter Your Current Password">
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" name="changePassword" class="btn btn-primary">Save changes</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear:both"></div>
<?php
$this->load->view('layout/footer');
?>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


<script>
    $(function () {
<?php
$checklogin = $this->session->flashdata('checklogin');
if ($checklogin['show']) {
    ?>
            $.gritter.add({
                title: '<?php echo $checklogin['title']; ?>',
                text: '<?php echo $checklogin['text']; ?>',
                image: '<?php echo base_url(); ?>assets/emoji/<?php echo $checklogin['icon']; ?>',
                            sticky: true,
                            time: '',
                            class_name: 'my-sticky-class'
                        });
    <?php
}
?>
                })
</script>

<script>
    $(function () {
        $('.edit_detail').hide();
        $("#edit_toggle").click(function () {
            $('.edit_detail').hide();
            if (this.checked) {
                $('.edit_detail').show();
            }
        })

        $('.edit_detail').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            $($(this).prev()).editable('toggle');
        });

        $('#gender').editable({
            source: {
                'Male': 'Male',
                'Female': 'Female'
            }
        });


        $('#profession').editable({
            source: {
                'Academic': 'Academic',
                'Medicine': 'Medicine',
                'Law': 'Law',
                'Banking': 'Banking',
                'IT': 'IT',
                'Entrepreneur': 'Entrepreneur',
                'Sales/Marketing': 'Sales/Marketing',
                'Other': 'Other',
            }
        });


        $('#country').editable({
            source: {
<?php
foreach ($country as $key => $value) {
    $cont = $value['country_name'];
    echo "'$cont':'$cont',";
}
?>

            }
        });




    })
</script>