<div class="">
    <div class="page-header text-center text-capitalize" style="color: white">
        <h1 >History of your calculations</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-4" ng-repeat="item in dataToHistory track by $index">
            <div class="card">
                <div class="description">
                    <p>BMR: {{item.bmr}}</p>
                    <p>DayBMR: {{item.dayBMR}}</p>
                    <p>Date of measure:</p>
                    <p>{{item.Data}}</p>
                    <button class="btn btn-info" ng-click="remove(item.id)">Delete</button>
                </div>
                <img src="img/card2.png" width="100%"/>
            </div>
        </div>
    </div>
</div>