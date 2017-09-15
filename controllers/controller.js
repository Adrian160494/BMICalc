var app = angular.module('app',["ngRoute"]);

app.config(function ($routeProvider) {

    $routeProvider.when("/",{
        templateUrl: '/index.php'
    });
    $routeProvider.when("/register",{
        templateUrl: '/registerForm.pxp'
    })
});

app.controller('mainCtrl',function ($scope, $http, $location) {

    $scope.viewFlag = false;
    $scope.loginPanel = false;

    $scope.calculate = function (data) {
        console.log(data);
        $http.get("PHP/calculateC.php",{params:{dataSex: data.sex, dataWeight: data.weight, dataHeight: data.height, dataAge: data.age, dataActivity: data.activity}})
            .then(function (response) {
                $scope.calculations = response.data;
                console.log($scope.calculations);
                $scope.viewFlag = true;
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
            console.log($scope.newUserData);
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
                console.log($scope.answer);
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
            console.log($scope.loginPanel);
        });
        return $scope.loginPanel;
    };

});