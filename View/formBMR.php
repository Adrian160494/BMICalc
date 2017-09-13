<div class="col-md-offset-2 col-md-8 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h1 class="headline">Calculate your BMR!</h1>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" novalidate >
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Sex:</label>
                    </div>
                    <div class="col-xs-8 text-center">
                        <select class="form-control" ng-model="data.sex">
                            <option selected valee="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Weight(kg):</label>
                    </div>
                    <div class="col-xs-8 text-center">
                        <input class="form-control" type="number" name="weight" ng-model="data.weight"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Height(cm):</label>
                    </div>
                    <div class="col-xs-8 text-center">
                        <input class="form-control" type="number" name="height" ng-model="data.height"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Age: </label>
                    </div>
                    <div class="col-xs-8 text-center">
                        <input class="form-control" type="number" name="age" ng-model="data.age"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Activity:</label>
                    </div>
                    <div class="col-xs-8 text-center">
                        <select name="activity" class="form-control" ng-model="data.activity">
                            <option value="1.0">1.0 - lack of activity</option>
                            <option value="1.2">1.2 - low activity (1-2 trainings in week)</option>
                            <option value="1.4">1.4 - middle activity(3-4 trainings in week) </option>
                            <option value="1.6">1.6 - high activity(physical work and 3-4 trainings in week)</option>
                            <option value="1.9">1.8/2.0 - very high activity</option>
                        </select>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" ng-click="calculate(data)" type="button">Calculate</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
            </form>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>