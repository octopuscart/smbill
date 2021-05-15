<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo SITE_NAME ?> | Admin Panel</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <?php
        $styleSheetArray = array(

//            "Animate" => "assets/css/animate.min.css",
            "Style" => "assets/dist/css/style.min.css",

//            "CustomeStyle" => "assets/css/customstyle.css",

            "Gitter" => "assets/gritter/css/jquery.gritter.css",
        );
        foreach ($styleSheetArray as $title => $stylesheet) {
            ?>
                                    <!-- ================== <?php echo $title ?> ================== -->
            <link href="<?php echo base_url(); ?><?php echo $stylesheet; ?>" rel="stylesheet" />
            <?php
        }
        ?>


<!-- ============================================================== -->
<script src="<?php echo base_url(); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>



        <!--angular js-->
        <script src="<?php echo base_url(); ?>assets/angular/angular.min.js"></script>

        <!--custom style-->
        <style>
<?php echo HEADERCSS; ?>
        </style>
        <!--custom style-->


    </head>
    <body class="" ng-app="Admin">

        <script>
            var Admin = angular.module('Admin', []).config(function ($interpolateProvider, $httpProvider) {
            //$interpolateProvider.startSymbol('{$');
            //$interpolateProvider.endSymbol('$}');
            $httpProvider.defaults.headers.common = {};
            $httpProvider.defaults.headers.post = {};
            });
            var rootBaseUrl = '<?php echo site_url("/"); ?>';
        </script>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->
        <!-- begin #page-container -->
        <div id="page-container" class="page-sidebar-fixed page-header-fixed" ng-controller="rootController">