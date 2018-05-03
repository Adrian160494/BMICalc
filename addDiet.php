<?php

session_start();

$_SESSION['day2'] = $_GET['day'];
$_SESSION['month2'] = $_GET['month'];

?>

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
    <link rel="stylesheet" href="css/styles2.css"/>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <!--JS Files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/angular-route.js"></script>
    <script src="controllers/controllers.js"></script>
</head>
<body ng-controller="mainCtrl">
<div class="container">
    <div class="navigation navigation2">
        <div class="navigation-header text-center">
            <h2 class="headline" style="font-family: 'Fredericka the Great', cursive;">Add your diet for the day!</h2>
        </div>
        <div class="navigation-body">
            <form name="myForm2" class="form-horizontal" novalidate ng-submit="addDiet(newDiet)">
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Day: </label>
                    </div>
                    <div class="col-xs-8">
                        <label style="font-size: 20px;" class="label label-primary"> <?php echo $_GET['day'] ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Month: </label>
                    </div>
                    <div class="col-xs-8">
                        <label style="font-size: 20px;" class="label label-primary"> <?php echo $_GET['month'] ?></label>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Breakfast: </label>
                    </div>
                    <div class="col-xs-8">
                        <textarea class="form-control" style="width: 100%; height: 200px;" ng-model="newDiet.breakfast"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Lunch: </label>
                    </div>
                    <div class="col-xs-8">
                        <textarea class="form-control" style="width: 100%; height: 200px;" ng-model="newDiet.lunch"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Dinner: </label>
                    </div>
                    <div class="col-xs-8">
                        <textarea class="form-control" style="width: 100%; height: 200px;" ng-model="newDiet.dinner"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Second Dinner: </label>
                    </div>
                    <div class="col-xs-8">
                        <textarea class="form-control" style="width: 100%; height: 200px;" ng-model="newDiet.dinner2"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Supper: </label>
                    </div>
                    <div class="col-xs-8">
                        <textarea class="form-control" style="width: 100%; height: 200px;" ng-model="newDiet.supper"></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success" >Add</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
        <div class="navigation-footer text-center">
            <div class="btn btn-info ">
                <a href="index.html">Return <span class="glyphicon glyphicon-arrow-right"></span></a>
            </div>
        </div>
        <div class="panel-default modal fade" id="myModalDiet" role="dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h2>Adding the new diet!</h2>
                </div>
                <div class="modal-body text-center">
                    <p>The new diet has been added! Return to the home page</p>
                    <p class="text-center"><button class="btn btn-success"><a href="index.html">Return</a></button></p>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>