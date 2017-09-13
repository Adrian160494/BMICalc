var app = angular.module('app',["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider.when("/main",{
        templateUrl: "index.php"
    });
});

app.controller('mainCtrl',function ($scope, $http) {

    $scope.dane = {sex: "male",weight:96,height:192,age:23,activity:1.4};
    $scope.viewFlag = false;

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
    }
});