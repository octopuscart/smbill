<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> 
        <a class="nav-link <?php echo $activetabl == "selectmovietheater"?"active":"";?>"  href="#selectmovietheater" role="tab">
            <span class="hidden-sm-up">
                <i class="ti-video-camera"></i>
            </span> 
            <span class="hidden-xs-down">Select Movie & Theater</span>
        </a>
    </li>
    <li class="nav-item"> 
        <a class="nav-link <?php echo $activetabl == "theatertemplate"?"active":"";?>"  href="#theatertemplate" role="tab">
            <span class="hidden-sm-up">
                <i class="ti-blackboard"></i>
            </span>
            <span class="hidden-xs-down">Set Seats Price</span>
        </a> 
    </li>
    <li class="nav-item"> <a class="nav-link <?php echo $activetabl == "createdateandtime"?"active":"";?>"  href="#createdateandtime" role="tab"><span class="hidden-sm-up"><i class="ti-calendar"></i></span> <span class="hidden-xs-down">Set Date & Time</span></a> </li>
</ul>