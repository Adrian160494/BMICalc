<div class="navigation">
    <div class="row text-center">
        <div class="text-center col-xs-3 col col-md-3"><button class="buttonNav btn" ng-click="prevCalendarDiet()"><span class="dietButton" style="color:darkblue;">Prev</span> </button></div>
        <div class="text-center col-xs-6 col col-md-6"><span class="month" style="color:white;">{{dataCalendar[monthToday].month}}</span> </div>
        <div class="text-center col-xs-3 col col-md-3"><button class="buttonNav btn" ng-click="nextCalendarDiet()"><span class="dietButton" style="color:darkblue;">Next</span></button></div>
    </div>
    <div id="dietDesc"  style="" class="col-md-12 col-sm-12 col-xs-12">
        <div id="callendarDiet" class="text-center">
        </div>
    </div>

</div>