<div class="navigation">
    <div class="row text-center">
        <div class="text-center col-xs-3 col col-md-3"><button ng-click="prevCalendarDiet()"><span style="color:white;font-size: 20px;"><span style="font-size: 20px;" class="glyphicon glyphicon-arrow-left"></span>Prev</span> </button></div>
        <div class="text-center col-xs-6 col col-md-6"><span style="color:white;font-size: 25px;">{{dataCalendar[monthToday].month}}</span> </div>
        <div class="text-center col-xs-3 col col-md-3"><button ng-click="nextCalendarDiet()"><span style="color:white;font-size: 20px;">Next<span style="font-size: 20px;" class="glyphicon glyphicon-arrow-right"></span></span></button></div>
    </div>
    <div id="dietDesc" class="col-md-12 col-sm-12 col-xs-12">
        <div id="callendarDiet" class="text-center">
        </div>
    </div>

</div>