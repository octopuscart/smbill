<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- ================== BEGIN PAGE CSS STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>

<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

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
<div class="page-wrapper" ng-controller="theaterController">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin #content -->
            <!-- begin #content -->
            <div id="content" class="content content-full-width">
                <?php
                $this->load->view('MovieWidget/widgettabbar', array("activetabl" => "theatertemplate"));
                ?>
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="theatertemplate" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $movieobj["title"]." - ".$movieobj["attr"];?></h4>


                                <form action="#" method="post">

                                    <div class="theaterblock">
                                        <h3><?php echo  $theaterobj["title"] ?></h3>
                                        <table class=" table" >
                                            <tbody>

                                                <tr>
                                                    <td colspan="{{theaterLayout.layout.totalinrow}}">

                                                        <div class="">
                                                            <div class="form-group  row" style="margin-bottom: 0px;">
                                                                <label for="example-text-input" class="col-2 col-form-label"><span class="classtitle">Reserved Seat(s)</span></label>
                                                                <div class="col-10">
                                                                    <input class="form-control" placeholder="" type="text" value="{{seatSelection.reserved}}" id="example-text-input" required="" name="reserved_seats" readonly="">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>  


                                            <tbody ng-repeat="(kclass, sclass) in theaterLayout.layout.sitclass" style="display: block;">
                                                <!--<tr><td class="theaterblockblank" colspan="{{theaterLayout.layout.totalinrow}}"></td></tr>-->
                                                <tr style="background: {{sclass.color}}"><td class="theaterblockblank" colspan="{{theaterLayout.layout.totalinrow}}">

                                                        <div class="form-group  row" style="margin-bottom: 0px;width:100%">
                                                            <label for="example-text-input" class="col-2 col-form-label"><span class="classtitle">{{kclass}}</span></label>
                                                            <div class="col-5">
                                                                <input class="form-control" placeholder="Ticket Price" name="class[]" value="{{kclass}}" type="hidden" value="" id="example-text-input" required="">
                                                                <input class="form-control" placeholder="Ticket Price" name="price[]" type="text" value="" id="example-text-input" required="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr ng-repeat="(rt, rows) in sclass.row" style="background: {{sclass.color}}">
                                                    <td class="theaterblockseat" style="width: 50px;"><b style="font-size: 19px;">{{rt}}</b>

                                                    </td>
                                                    <td class="theaterblockseat {{sit?'sitable':''}}" ng-repeat="(sit, chkatr) in rows">
                                                        <div  ng-if="sit" ng-switch="chkatr">
                                                            <div ng-switch-when="A">
                                                                <button id="{{sit}}"  type="button" class="btn btn-link btn-sm seaticon {{sit == seatSelection.selected[sit].seat?'active':''}}" ng-click="selectSeat(sit, sclass.price)"  title='{{sit}}'>
                                                                    <h5 class="theaterblocktext">{{sit}}</h5>
                                                                </button>
                                                            </div>
                                                            <div ng-switch-when="B">
                                                                <button class="btn btn-link btn-sm seaticon seatbooked" type="button"  disabled="" title='{{sit}}'>
                                                                    <h5 class="theaterblocktext">{{sit}}</h5>
                                                                </button>
                                                            </div>
                                                            <div ng-switch-when="R">
                                                                <button class="btn btn-link btn-sm seaticon seatresurved" type="button" disabled=""  title='{{sit}}'>
                                                                    <h5 class="theaterblocktext">{{sit}}</h5>
                                                                </button>
                                                            </div>
                                                            <div ng-switch-default>
                                                                <button class="btn btn-link btn-sm seaticon seatresurved" type="button" disabled="" style="background: #fff;" >
                                                                    <h5 class="theaterblocktext"></h5>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row bg-light-info" style="margin-top: 15px;">
                                        <div class="col-md-12" style="padding: 10px;">
                                            <a class="btn btn-primary p-l-40 p-r-40 " href="<?php echo site_url("MovieEvent/widgetEvent");?>" style="color:white;float:left;"><i class="ti-arrow-left"></i> Previous</a>

                                            <button type="submit" class="btn btn-primary p-l-40 p-r-40pull-right" name="addtemplate" style="float:right;">Next <i class="ti-arrow-right"></i> </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
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

    var layoutgbl = "<?php echo $theaterobj ? $theaterobj['layout'] : ""; ?>";
    function changeCategory(cat_name, cat_id) {
        $("#category_name").text(cat_name);
        $("#category_id").val(cat_id);
    }

    $(function () {








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

<script src="<?php echo base_url(); ?>assets/angular/ng-movies.js"></script>
