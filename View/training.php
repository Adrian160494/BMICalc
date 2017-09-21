<div class="navigation text-center">
    <div class="row text-center">
        <div class="col-xs-3 col col-md-3"><button ng-click="prevCalendar()"><span style="color:white;font-size: 20px;"><span style="font-size: 20px;" class="glyphicon glyphicon-arrow-left"></span>Prev</span> </button></div>
        <div class="col-xs-6 col col-md-6"><span style="color:white;font-size: 25px;">{{dataCalendar[monthToday].month}}</span> </div>
        <div class="col-xs-3 col col-md-3"><button ng-click="nextCalendar()"><span style="color:white;font-size: 20px;">Next<span style="font-size: 20px;" class="glyphicon glyphicon-arrow-right"></span></span></button></div>
    </div>
    <div id="callendar" class="row">
    </div>
</div>