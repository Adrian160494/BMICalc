<div class="navigation container">
    <div class="row text-center">
        <div class="text-center col-xs-3 col col-md-3"><button ng-click="prevCalendar()"><span style="color:white;font-size: 20px;"><span style="font-size: 20px;" class="glyphicon glyphicon-arrow-left"></span>Prev</span> </button></div>
        <div class="text-center col-xs-6 col col-md-6"><span style="color:white;font-size: 25px;">{{dataCalendar[monthToday].month}}</span> </div>
        <div class="text-center col-xs-3 col col-md-3"><button ng-click="nextCalendar()"><span style="color:white;font-size: 20px;">Next<span style="font-size: 20px;" class="glyphicon glyphicon-arrow-right"></span></span></button></div>
    </div>
    <div id="callendarDesc" class="col-md-12 col-sm-12 col-xs-12">
        <div id="callendar" class="text-center col-md-12 col-sm-12 col-xs-12" >

        </div>
    </div>

</div>
