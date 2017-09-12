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
            <form class="form-inline text-center">
                <div class="form-group">
                    <input class="form-control" type="text" name="login" placeholder="Login"/>
                    <input class="form-control" type="text" name="password" placeholder="Password"/>
                    <button type="submit" class="btn btn-success" >Log In</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-offset-2 col-md-8 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h1 class="headline">Calculate your BMR!</h1>
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-4 text-right">
                            <label class="font">Sex:</label>
                        </div>
                        <div class="col-xs-8 text-center">
                            <select class="form-control">
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
                            <input class="form-control" type="number" name="weight" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 text-right">
                            <label class="font">Height(cm):</label>
                        </div>
                        <div class="col-xs-8 text-center">
                            <input class="form-control" type="number" name="weight" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 text-right">
                            <label class="font">Age: </label>
                        </div>
                        <div class="col-xs-8 text-center">
                            <input class="form-control" type="number" name="weight" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 text-right">
                            <label class="font">Activity:</label>
                        </div>
                        <div class="col-xs-8 text-center">
                            <select class="form-control">
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
</div>

</body>
</html>