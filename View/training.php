<div class="navigation container">
    <div class="row text-center">
        <div class="text-center col-xs-3 col col-md-3"><button ng-click="prevCalendar()" class="btn next nextBtn"><span style="color:black;"><span style="font-size: 20px;" class="material-icons buttonIcon">subdirectory_arrow_left</span></span> </button></div>
        <div class="text-center col-xs-6 col col-md-6"><span class="month" style="color:white;font-size: 25px;">{{dataCalendar[monthToday].month}}</span> </div>
        <div class="text-center col-xs-3 col col-md-3"><button ng-click="nextCalendar()" class="btn prev prevBtn"><span style="color:black;"><span style="font-size: 20px;" class="material-icons buttonIcon">subdirectory_arrow_right</span></span></button></div>
    </div>
    <div id="callendarDesc" class="col-md-12 col-sm-12 col-xs-12">
        <div id="callendar" class="text-center col-md-12 col-sm-12 col-xs-12" >

        </div>
    </div>

</div>
