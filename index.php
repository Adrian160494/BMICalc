<!DOCTYPE html>
<html ng-app="app" >
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
    <link href="https://fonts.googleapis.com/css?family=Sigmar+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Chewy|Kalam" rel="stylesheet">
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
                <div class="text-center" id="buttonShowHide" ng-hide="loginPanel" ng-click="showLogin()"><i id="iconLogin" class="material-icons" style="font-size: 60px; color: yellow">expand_more</i></div>
            </div>
        </div>
    </div>
    <div id="banner" ng-hide="loginPanel">
        <div class="center-wrap text-center">
            <div class="button">
                <a href="registerForm.php">Register<span class="shift"><span class="glyphicon glyphicon-arrow-right"></span></span></a>
                <div class="mask"></div>
            </div>
        </div>
        <figure id="bannerIMG">
            <img id="imgBanner" src="img/banner.jpg" alt="doesn't word" width="100%"/>
        </figure>
    </div>
    <div class="container-fluid">
        <div id="loginPanel" class="navbar-inverse" ng-show="loginPanel">
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
                    <li class="liFont"><a href="" ng-click="chooseView(1)"><span style="font-size: 20px;" class="glyphicon glyphicon-home"></span> Home</a> </li>
                    <li class="liFont"><a href="" ng-click="chooseView(2)"><span style="font-size: 20px;" class="glyphicon glyphicon-th-list"></span> History</a></li>
                    <li class="liFont"><a href="" ng-click="chooseView(3)"><span style="font-size: 20px;" class="material-icons">directions_bike</span> Training</a></li>
                    <li class="liFont"><a href="" ng-click="chooseView(4)"><span style="font-size: 20px;" class="material-icons">restaurant</span> Diet</a></li>
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
        <div id="media" class="pull-right">
            <a href="https://www.facebook.com/adr.ian.395017"><img src="img/face2.png" width="30px"/></a>
            <a href="#"><img src="img/twit2.png" width="30px"/></a>
            <a href="#"><img src="img/insta.png" width="30px"/></a>
        </div>
        <div id="copyright" class="text-center">
            <span>Copyright 2017 by Adrian Ciejka <span class="glyphicon glyphicon-copyright-mark"></span></span>
        </div>
    </div>
</body>
</html>