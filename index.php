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
<div class="container-fluid" >
    <div class="col-xs-12">
        <div class="well" id="borderForm">
            <form class="form-inline text-center" ng-submit="logIn(user)"  id="loginForm">
                <div class="form-group">
                    <input class="form-control" type="text" name="login" placeholder="Login" ng-model="user.login"/>
                    <input class="form-control" type="text" name="password" placeholder="Password" ng-model="user.password"/>
                    <button type="submit" class="btn btn-success" >Log In</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
            <div class="text-center"><span style="font-size: 20px" class="glyphicon glyphicon-registration-mark"><a href="registerForm.php" style="font-size: 20px">Registration</a></span></div>
            <div id="buttonShowHide" class="btn btn-default" ng-click="showLogin()"><span id="showHide" class="glyphicon glyphicon-arrow-down"></span></div>
        </div>

    </div>
</div>
<div class="container">
<div ng-include="viewFlag ? 'View/calculate.php' : 'View/formBMR.php'">

</div>
</div>

</body>
</html>