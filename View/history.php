<div class="">
    <div class="page-header text-center text-capitalize" style="color: white">
        <h1 >History of your calculations</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-4" ng-repeat="item in dataToHistory track by $index">
            <div class="card">
                <div class="description">
                    <p class="textDescription">BMR: {{item.bmr}}</p>
                    <p class="textDescription">DayBMR: {{item.dayBMR}}</p>
                    <p class="textDescription">Date of measure:</p>
                    <p class="textDescription">{{item.Data}}</p>
                    <div id="delete">
                        <button class="btn btn-info" ng-click="remove(item.id)">Delete</button>
                    </div>
                </div>
                <div class="text-center">
                    <img src="img/card2.png" width="100%" style="margin:auto"/>
                </div>

            </div>
        </div>
    </div>
</div>