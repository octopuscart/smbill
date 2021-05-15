<?php
$userdata = $this->session->userdata('logged_in');
if ($userdata) {
    
} else {
    redirect("Authentication/index", "refresh");
}
$menu_control = array();

$product_menu = array(
    "title" => "Product Manegement",
    "icon" => "ion-cube",
    "active" => "",
    "sub_menu" => array(
        "Add Product" => site_url("ProductManager/add_product"),
        "Product Reports" => site_url("ProductManager/productReport"),
        "Categories" => site_url("ProductManager/categories"),
        "Product Out Of Stock" => site_url("ProductManager/productReportStockOut"),
        "Product Removed" => site_url("ProductManager/productReportTrash"),
//        "Items Prices" => site_url("ProductManager/categoryItems"),
//        "Product Sorting" => site_url("ProductManager/productSorting"),
//        "Product Colors" => site_url("ProductManager/productColors"),
    ),
);



if (DEFAULT_PAYMENT == 'No') {
    unset($product_menu['sub_menu']['Items Prices']);
} else {
    
}

array_push($menu_control, $product_menu);


$order_menu = array(
    "title" => "Order Manegement",
    "icon" => "fa fa-list",
    "active" => "",
    "sub_menu" => array(
        "Orders Reports" => site_url("Order/orderslist"),
        "Order Analytics" => site_url("Order/index"),
    ),
);
array_push($menu_control, $order_menu);

$client_menu = array(
    "title" => "Client Manegement",
    "icon" => "fa fa-users",
    "active" => "",
    "sub_menu" => array(
        "Clients Reports" => site_url("UserManager/usersReport"),
    ),
);
array_push($menu_control, $client_menu);



$blog_menu = array(
    "title" => "Blog Management",
    "icon" => "fa fa-edit",
    "active" => "",
    "sub_menu" => array(
        "Categories" => site_url("CMS/blogCategories"),
        "Add New" => site_url("CMS/newBlog"),
        "Blog List" => site_url("CMS/blogList"),
        "Tags" => site_url("CMS/blogTag"),
    ),
);
array_push($menu_control, $blog_menu);



$lookbook_menu = array(
    "title" => "Media Management",
    "icon" => "fa fa-image",
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
    "icon" => "fa fa-cogs",
    "active" => "",
    "sub_menu" => array(
        "System Log" => site_url("Services/systemLogReport"),
        "Report Configuration" => site_url("Configuration/reportConfiguration"),
    ),
);


array_push($menu_control, $setting_menu);



$social_menu = array(
    "title" => "Social Management",
    "icon" => "fa fa-calendar",
    "active" => "",
    "sub_menu" => array(
        "Social Link" => site_url("CMS/socialLink"),
    ),
);
array_push($menu_control, $social_menu);


$seo_menu = array(
    "title" => "SEO",
    "icon" => "fa fa-calendar",
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

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
