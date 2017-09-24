<?php

session_start();

$_SESSION['day'] = $_GET['day'];
$_SESSION['month'] = $_GET['month'];

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
    <div class="navigation">
        <div class="navigation-header text-center">
            <h2 class="headline">Add your workout!</h2>
        </div>
        <div class="navigation-body">
            <form name="myForm2" class="form-horizontal" novalidate ng-submit="addWorkout(newTraining)">
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
                        <label class="font">Muscule part: </label>
                    </div>
                    <div class="col-xs-8">
                        <select ng-model="newTraining.part" class="form-control input-lg">
                            <option value="" >(Choose the proper part)</option>
                            <optgroup label="BigParties">
                                <option value="Chest" label="Chest">Chest</option>
                                <option value="Back" label="Back">Back</option>
                                <option value="Legs" label="Legs">Legs</option>
                                <option value="ABS" label="ABS">ABS</option>
                            </optgroup>
                            <optgroup label="SmallParties">
                                <option value="Biceps" label="Biceps">Biceps</option>
                                <option value="Triceps" label="Triceps">Triceps</option>
                                <option value="Sholders" label="Sholders">Sholders</option>
                                <option value="Forearm" label="Forearm">Forearm</option>
                            </optgroup>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right">
                        <label class="font">Training: </label>
                    </div>
                    <div class="col-xs-8">
                        <textarea class="form-control " style="width: 100%; height: 400px;" ng-model="newTraining.description"></textarea>
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
                <a href="/index.php">Return <span class="glyphicon glyphicon-arrow-right"></span></a>
            </div>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-header">
                <h2>Adding the new Workout!</h2>
            </div>
            <div class="modal-body">
                <p>The new workout has been added! Return to the home page</p>
                <p class="text-center"><button class="btn btn-success"><a href="index.php">Return</a></button></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>