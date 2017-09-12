<div class="col-md-offset-2 col-md-8 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h1 class="headline">Calculate your BMR!</h1>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" ng-submit="calculate(data)">
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Sex:</label>
                    </div>
                    <div class="col-xs-8 text-center">
                        <select class="form-control" ng-model="data.sex">
                            <option>Male</option>
                            <option>Female</option>
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
                            <option>1.0</option>
                            <option>1.2</option>
                            <option>1.4</option>
                            <option>1.6</option>
                            <option>1.8</option>
                            <option>2.0</option>
                        </select>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Calculate</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
            </form>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>