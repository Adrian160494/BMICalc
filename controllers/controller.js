var app = angular.module('app',["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider.when("/main",{
        templateUrl: "index.php"
    });
});

app.controller('mainCtrl',function ($scope, $http) {

    $scope.viewFlag = false;

    $scope.calculate = function (data) {
        console.log(data);
        $http.post("PHP/calculateC.php",{params:{sex: data.sex, weight: data.weight, height: data.height, age: data.age, activity: data.activity}})
            .then(function (response) {
                $scope.calculations = response.data;
                console.log($scope.calculations);
                $scope.viewFlag = true;
            })
    }
});