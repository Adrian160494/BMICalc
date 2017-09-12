<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <!--CSS files-->
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <!--JS Files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="js/angular.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="col-xs-12">
        <div class="well">
            <form class="form-inline text-center" ng-submit="logIn(user)">
                <div class="form-group">
                    <input class="form-control" type="text" name="login" placeholder="Login" ng-model="user.login"/>
                    <input class="form-control" type="text" name="password" placeholder="Password" ng-model="user.password"/>
                    <button type="submit" class="btn btn-success" >Log In</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
<div ng-view></div>
</div>

</body>
</html>