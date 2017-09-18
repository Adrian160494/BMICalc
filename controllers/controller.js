var app = angular.module('app',["ngRoute"]);

app.config(function ($routeProvider) {

    $routeProvider.when('/',{
        templateUrl: 'View/formBMR.php'
    });
    $routeProvider.when("/register",{
        templateUrl: 'registerForm.pxp'
    });
    $routeProvider.when("/history",{
        templateUrl: 'View/history.php'
    });
    $routeProvider.otherwise({
        redirectTo: '/'
    })
});

app.controller('mainCtrl',function ($scope, $http, $location) {

    $scope.viewFlag = false;
    $scope.loginPanel = false;
    $scope.calculations = null;
    $scope.includeView = 'View/formBMR.php';
    $scope.dataToHistory = null;

    $scope.getDataOfHistory = function () {
        $http.get("PHP/getDataToHistory.php").then(function (response) {
            $scope.dataToHistory = response.data;
        });
    };

    $scope.calculate = function (data) {
        $http.get("PHP/calculateC.php",{params:{dataSex: data.sex, dataWeight: data.weight, dataHeight: data.height, dataAge: data.age, dataActivity: data.activity}})
            .then(function (response) {
                $scope.calculations = response.data;
                $scope.viewFlag = true;
                $scope.includeView = 'View/calculate.php';
            })
    };

    $scope.showLogin = function () {
        $scope.formLogin = $("#loginForm");
        $scope.showHide = $("#showHide");
        if($scope.formLogin.css("display")=="none"){
            $scope.formLogin.show("blind",1000);
        } else{
            $scope.formLogin.hide("blind",1000);
        }
        if($scope.showHide.hasClass("glyphicon-arrow-up")){
            $scope.showHide.removeClass("glyphicon-arrow-up").addClass("glyphicon-arrow-down");
        } else{
            $scope.showHide.removeClass("glyphicon-arrow-down").addClass("glyphicon-arrow-up");
        }
    };

    $scope.addNewUser = function (newUser) {
        $http.get("PHP/register.php",{params:{userLogin: newUser.login,userPassword: newUser.password, userConfirmPassword: newUser.confirmPassword, userEmail: newUser.email}}).then(function (response) {
            $scope.newUserData = response.data;
            if($scope.newUserData.length<10){
                $scope.information = "Creating the new account succesfull!";
                $scope.errorFlag = false;
            }else {
                $scope.registerError = response.data;
                $scope.errorFlag = true;
            }
        })
    };

    $scope.logIn = function (user) {
        $scope.error = null;
        $http.get("PHP/logIn.php",{params:{userLogin: user.login, userPassword: user.password}})
            .then(function (response) {
                $scope.answer = response.data;
                if(angular.isDefined($scope.answer['login'])){
                    $scope.loginPanel = true;
                    $location.path("/");
                } else{
                    $scope.error = $scope.answer;
                }
            })
    };

    $scope.checkPanel = function () {
        $http.get("PHP/checkLogIn.php").then(function (response) {
            $scope.loginPanel= response.data;
        });
        return $scope.loginPanel;
    };

    $scope.addToHistory = function () {
        $http.get("PHP/addToHistory.php",{params:{bmr: $scope.calculations[0],dayBMR: $scope.calculations[1]}}).then(function (response) {
            if(response.data==true){
                $scope.getDataOfHistory();
                $scope.information2= "Added to history!";
            }
        });
    };

    $scope.chooseView = function (text) {
        switch(text){
            case 1:
                $scope.includeView = 'View/formBMR.php';
                break;
            case 2:
                $scope.getDataOfHistory();
                $scope.includeView = 'View/history.php';
                break;
            case 3:
                $scope.includeView = 'View/training.php';
                break;
            case 4:
                $scope.includeView = 'View/diet.php';
                break;
        }
    };

    $scope.remove = function (id) {
        $http.get("PHP/deleteElement.php",{params:{id:id}}).then(function (response) {
            $scope.getDataOfHistory();
        });
    }


});