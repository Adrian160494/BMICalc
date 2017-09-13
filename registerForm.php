<!doctype html>
<html class="no-js" lang="" ng-app="app" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--CSS files-->
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <!--JS Files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/angular-route.js"></script>
    <script src="controllers/controller.js"></script>
</head>
<body ng-controller="mainCtrl">
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading text-center">
            <h2 class="headline">Create new account!</h2>
        </div>
        <div class="panel-body">
            <form name="myForm" class="form-horizontal" novalidate ng-submit="addNewUser(newUser)">
                <div class="col-xs-offset-2 col-xs-8">
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label class="font">Login: </label>
                        </div>
                        <div class="col-xs-8">
                            <input name="login" type="text" class="form-control" ng-model="newUser.login" required="true"/>
                            <span ng-show="myForm.login.$dirty && myForm.login.$invalid" style="color: red">Write the right login!</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label class="font">Password: </label>
                        </div>
                        <div class="col-xs-8">
                            <input name="password" type="password" class="form-control" ng-model="newUser.password" required="true"/>
                            <span ng-show="myForm.password.$dirty && myForm.password.$invalid" style="color: red">Insert correct password!</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label class="font">Email: </label>
                        </div>
                        <div class="col-xs-8">
                            <input name="email" type="email" class="form-control" ng-model="newUser.email" required="true"/>
                            <span ng-show="myForm.email.$dirty && myForm.email.$invalid" style="color: red">Write a valid email adress!</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" ng-disabled="myForm.$invalid" >Register</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <span class="alert-danger" ng-show="errorFlag">{{registerError}}</span>
                        <span class="alert-success" ng-show="information">{{information}}</span>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>