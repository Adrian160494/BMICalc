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
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Frijole|Sedgwick+Ave+Display" rel="stylesheet">
    <!--JS Files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/angular-route.js"></script>
    <script src="controllers/controllers.js"></script>
</head>
<body ng-controller="mainCtrl" ng-init="initFunction()" ng-cloak>
<div class="wrapper">
    <div class="container-fluid">
        <div class="col-xs-12">
            <div id="loginPanel">
                <div ng-include="loginPanel ? 'View/loggedIn.php' : 'View/panelLogin.php'"></div>
                <div id="buttonShowHide" class="btn btn-default" ng-hide="loginPanel" ng-click="showLogin()"><span id="showHide" class="glyphicon glyphicon-arrow-down"></span></div>
            </div>
        </div>
    </div>
    <hr>
    <div id="banner" ng-hide="loginPanel">
        <div class="center-wrap">
            <div class="button">
                <a href="registerForm.php">Register<span class="shift"><span class="glyphicon glyphicon-arrow-right"></span></span></a>
                <div class="mask"></div>
            </div>
        </div>
        <figure id="bannerIMG">
            <img src="img/banner.jpg" alt="doesn't word" width="100%"/>
            <hr>
        </figure>
    </div>
    <div class="container-fluid">
        <div class="navbar-inverse" ng-show="loginPanel">
            <div class="navbar-header">
                <span class="navHead">It's your life</span>
                <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggle" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li class="liFont nav-tabs"><a href="" ng-click="chooseView(1)">Home</a> </li>
                    <li class="liFont"><a href="" ng-click="chooseView(2)">History</a></li>
                    <li class="liFont"><a href="" ng-click="chooseView(3)">Training</a></li>
                    <li class="liFont"><a href="" ng-click="chooseView(4)">Diet</a></li>
                </ul>
            </div>
        </div>
        <div ng-hide="loginPanel" ng-include="viewFlag ? 'View/calculate.php' : 'View/formBMR.php'">
        </div>
        <div ng-show="loginPanel" ng-include="includeView">
        </div>
        <div class="modal fade" role="dialog" id="modalWorkout">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h2>Your workout for this day:</h2>
                </div>
                <div class="modal-body">
                    <p id="textModal" class="text-center">
                        {{dataWorkout}}
                    </p>
                    <div id="buttonToDelete"></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="footer">
        <br/>
        <div class="text-left">
            <a href="https://www.facebook.com/adr.ian.395017"><img src="img/face2.png" width="30px"/></a>
            <a href="#"><img src="img/twit2.png" width="30px"/></a>
            <a href="#"><img src="img/insta.png" width="30px"/></a>
        </div>
        <div class="text-left">
            <span>Copyright by Adrian Ciejka <span class="glyphicon glyphicon-copyright-mark"></span></span>
        </div>
    </div>
</body>
</html>