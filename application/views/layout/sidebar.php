<?php
$userdata = $this->session->userdata('logged_in');
if ($userdata) {
    
} else {
    redirect("Authentication/index", "refresh");
}
$menu_control = array();



$order_menu = array(
    "title" => "Booking",
    "icon" => "icon-Receipt-4",
    "active" => "",
    "sub_menu" => array(
        "Booking Reports" => site_url("MovieEvent/deshboard"),
        "Book Now" => site_url("MovieEvent/bookingList"),
        "Search Booking"=>site_url("MovieEvent/eventReportAll"),
    ),
);
array_push($menu_control, $order_menu);

$client_menu = array(
    "title" => "Client Manegement",
    "icon" => "icon-Add-User",
    "active" => "",
    "sub_menu" => array(
        "Clients Reports" => site_url("UserManager/usersReport"),
    ),
);
array_push($menu_control, $client_menu);



$blog_menu = array(
    "title" => "Event Management",
    "icon" => "ti-video-camera",
    "active" => "",
    "sub_menu" => array(
        "Add Movie/Show" => site_url("MovieEvent/eventList"),
        "Create Movie/Show Event" => site_url("MovieEvent/widgetEvent"),
        "Movie/Show Event List" => site_url("MovieEvent/evenMovietList"),
    ),
);
array_push($menu_control, $blog_menu);

$theater = array(
    "title" => "Theater Management",
    "icon" => "ti-blackboard",
    "active" => "",
    "sub_menu" => array(
        "Theater(s) List" => site_url("CMS/theaterSetting"),
        "Create Template" => site_url("MovieEvent/newsTheaterTemplate"),
    ),
);
array_push($menu_control, $theater);



$lookbook_menu = array(
    "title" => "Media Management",
    "icon" => "ti-image",
    "active" => "",
    "sub_menu" => array(
        "Images" => site_url("Media/images"),
//        "Tags" => site_url("CMS/blogTag"),
    ),
);
array_push($menu_control, $lookbook_menu);

//
//$cms_menu = array(
//    "title" => "Content Management",
//    "icon" => "fa fa-file-text",
//    "active" => "",
//    "sub_menu" => array(
//        "Look Book" => site_url("CMS/lookbook"),
//        "Blog" => site_url("CMS/blog"),
//    ),
//);
//array_push($menu_control, $cms_menu);


$msg_menu2 = array(
    "title" => "Message Management",
    "icon" => "fa fa-envelope",
    "active" => "",
    "sub_menu" => array(
        "Send Mail/Newsletter (Prm.)" => site_url("#"),
        "Send Mail/Newsletter (Txn.)" => site_url("#"),
    ),
);

$msg_menu = array(
    "title" => "Message Management",
    "icon" => "fa fa-envelope",
    "active" => "",
    "sub_menu" => array(
//        "Report Configuration" => site_url("Configuration/reportConfiguration"),
    ),
);


//array_push($menu_control, $msg_menu);



$user_menu = array(
    "title" => "User Management",
    "icon" => "fa fa-user",
    "active" => "",
    "sub_menu" => array(
        "Add User" => site_url("#"),
        "Users Reports" => site_url("#"),
    ),
);


//array_push($menu_control, $user_menu);

$setting_menu = array(
    "title" => "Settings",
    "icon" => "ti-settings",
    "active" => "",
    "sub_menu" => array(
        "System Log" => site_url("Services/systemLogReport"),
        "Report Configuration" => site_url("Configuration/reportConfiguration"),
    ),
);


array_push($menu_control, $setting_menu);



$social_menu = array(
    "title" => "Social Management",
    "icon" => "ti-share-alt",
    "active" => "",
    "sub_menu" => array(
        "Social Link" => site_url("CMS/socialLink"),
    ),
);
array_push($menu_control, $social_menu);


$seo_menu = array(
    "title" => "SEO",
    "icon" => "ti-world",
    "active" => "",
    "sub_menu" => array(
        "General" => site_url("CMS/siteSEOConfigUpdate"),
        "Page Wise Setting" => site_url("CMS/seoPageSetting"),
    ),
);
array_push($menu_control, $seo_menu);



foreach ($menu_control as $key => $value) {
    $submenu = $value['sub_menu'];
    foreach ($submenu as $ukey => $uvalue) {
        if ($uvalue == current_url()) {
            $menu_control[$key]['active'] = 'active';
            break;
        }
    }
}
?>
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="<?php echo base_url(); ?>assets/assets/images/users/1.jpg" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium"><?php echo $userdata['first_name']; ?> <?php echo $userdata['last_name']; ?></h5>
                            <a href="<?php echo site_url("profile") ?>" title="Profile" class="btn btn-circle btn-sm">
                                <i class="ti-settings"></i>
                            </a>
                            &nbsp;
                            <a href="<?php echo site_url("Authentication/logout") ?>" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>

                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->

                <?php foreach ($menu_control as $mkey => $mvalue) { ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark <?php echo $mvalue['active']; ?>" href="javascript:void(0)" aria-expanded="false">
                            <i class="<?php echo $mvalue['icon']; ?>"></i>
                            <span class="hide-menu"><?php echo $mvalue['title']; ?> </span>
                        </a>

                        <ul aria-expanded="false" class="collapse  first-level <?php echo $mvalue['active'] == 'active' ? 'in' : ''; ?>">
                            <?php
                            $submenu = $mvalue['sub_menu'];
                            foreach ($submenu as $key => $value) {
                                ?>
                                <li class="sidebar-item">
                                    <a href="<?php echo $value; ?>" class="sidebar-link">
                                        <i class="mdi mdi-book-multiple"></i>
                                        <span class="hide-menu"> <?php echo $key; ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
