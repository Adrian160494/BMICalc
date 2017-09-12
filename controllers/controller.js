var app = angular.module('app',[]);

app.controller('mainCtrl',function ($scope, $http) {

    $scope.viewFlag = false;

    $scope.calculate = function (data) {
        console.log(data);
        $http.get("PHP/calculateC.php",{params:{sex: data.sex, weight: data.weight, height: data.height, age: data.age, activity: data.activity}})
            .then(function (response) {
                $scope.data = response.text;
                $scope.viewFlag = true;
            })
    }
});