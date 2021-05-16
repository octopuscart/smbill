<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>

<style>
    .color0{
        background:red!important;
    }
    .color1{
        background:orange!important;
    }
    .color2{
        background:purple!important;
    }
    .color3{
        background:blue!important;
    }
    .color4{
        background:greenyellow!important;
    }
    .color5{
        background:yellow!important;
    }.color6{
        background:deeppink!important;
    }

    .theaterblockseat{
        padding: 5px!important;
        padding-left: 3px!important;
        padding-right: 3px!important;
        padding-top: 14px!important;
    }
    .seaticon{
        height: 25px;
        width: 23px!important;
        background-size: 30px;
        background-repeat: no-repeat;
        background-position: center;
        padding: 7px 0px;
        background: #4c32e9;
        color: white;
    }
    .seaticon:hover{
        background: #fb8c00;
        color:white;
    }


    .theaterblockseat.sitable{
     
    }

    .theaterblock tbody{
        margin: 5px;
    }

    .theaterblockblank{
        height: 50px;
    }
    .theaterblockprice{

        transform: rotate(90deg);
    }

    h5.theaterblocktext {
        font-size: 9px;
        letter-spacing: 0px
    }
    .classtitle{
        text-transform: uppercase;
        font-weight: bold;
    }
    .seaticon.active {
        background: #cecece;
        color: white;
    }

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
             
            </div>
            <!-- end #content -->
        </div>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>
<script>

    var theater_id = "<?php echo $theaterobj ? $theaterobj['layout'] : ""; ?>";
    
</script>

<script src="<?php echo base_url(); ?>assets/angular/ng-movies.js"></script>
