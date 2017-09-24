var app = angular.module('app',["ngRoute"]);

app.config(function ($routeProvider) {

    $routeProvider.otherwise({
        redirectTo: '/'
    })
});

app.directive("createCalendar",function () {
    return function (scope,element,attrs) {
        var div = angular.element('<div>');
        var numberOfDays = scope.numberOfDays;
        div.addClass("col-xs-12 text-center");
        //var number = scope[attrs["monthToday"]];
        console.log(numberOfDays);
        for(var i=0;i<numberOfDays;i++){
            var div2 = angular.element("<div>");
            div2.addClass("col-xs-12");
            div2.css({
                width: "200px",
                height: "200px",
                backgroundColor: "rgba(250,250,250,0.5)",
                margin :"5px"
            });
            div2.text(i+1);
            div.append(div2);
        }
        element.append(div);
    }
});


app.controller('mainCtrl',['$scope','$http','$location', function ($scope, $http, $location) {

    $scope.viewFlag = false;
    $scope.loginPanel = false;
    $scope.calculations = null;
    $scope.includeView = 'View/formBMR.php';
    $scope.dataToHistory = null;
    $scope.today = new Date();
    $scope.monthToday = $scope.today.getMonth();
    $scope.muscules = [
        {part: "Chest", category: "BigParties"},
        {part: "Back", category: "BigParties"},
        {part: "Legs", category: "BigParties"},
        {part: "ABS", category: "BigParties"},
        {part: "Biceps", category: "SmallParties"},
        {part: "Triceps", category: "SmallParties"},
        {part: "Sholders", category: "SmallParties"},
        {part: "Forearm", category: "SmallParties"}

    ];

    $scope.initFunction = function () {
        $http.get("CallendarData.json").success(function (response) {
            $scope.dataCalendar = response;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
        });
        $('#callendar').html($scope.callendar);
        $scope.checkPanel();
        $scope.getCallendar();
    };

    $scope.getCallendar = function (month) {
        var now = new Date();
        var data = new Date(now.getUTCFullYear(), month, 1, 0, 0, 0);
        $scope.firstDayOfMonth = data.getDay();
        console.log(data);
        console.log($scope.firstDayOfMonth);

        $http.get("PHP/createCallendar.php", {
            params: {
                numberOfDays: $scope.numberOfDays,
                month: month,
                firstDayOfMonth: $scope.firstDayOfMonth
            }
        }).success(function (data) {
            $scope.callendar = data;
            console.log($scope.callendar);
            $('#callendar').html($scope.callendar);
        })
    };

    $scope.prevCalendar = function () {
        if ($scope.monthToday > 0) {
            $scope.monthToday--;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
            $scope.getCallendar($scope.monthToday);
        }
    };

    $scope.nextCalendar = function () {
        if ($scope.monthToday < 11) {
            $scope.monthToday++;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
            $scope.getCallendar($scope.monthToday);
        }
    };

    $scope.showCallendar = function () {
        $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
        $scope.getCallendar($scope.monthToday);
    };

    $scope.getDataOfHistory = function () {
        $http.get("PHP/getDataToHistory.php").then(function (response) {
            $scope.dataToHistory = response.data;
        });
    };

    $scope.calculate = function (data) {
        $http.get("PHP/calculateC.php", {
            params: {
                dataSex: data.sex,
                dataWeight: data.weight,
                dataHeight: data.height,
                dataAge: data.age,
                dataActivity: data.activity
            }
        })
            .then(function (response) {
                $scope.calculations = response.data;
                $scope.viewFlag = true;
                $scope.includeView = 'View/calculate.php';
            })
    };

    $scope.showLogin = function () {
        $scope.formLogin = $("#loginForm");
        $scope.showHide = $("#showHide");
        if ($scope.formLogin.css("display") == "none") {
            $scope.formLogin.show("blind", 1000);
        } else {
            $scope.formLogin.hide("blind", 1000);
        }
        if ($scope.showHide.hasClass("glyphicon-arrow-up")) {
            $scope.showHide.removeClass("glyphicon-arrow-up").addClass("glyphicon-arrow-down");
        } else {
            $scope.showHide.removeClass("glyphicon-arrow-down").addClass("glyphicon-arrow-up");
        }
    };

    $scope.addNewUser = function (newUser) {
        $http.get("PHP/register.php", {
            params: {
                userLogin: newUser.login,
                userPassword: newUser.password,
                userConfirmPassword: newUser.confirmPassword,
                userEmail: newUser.email
            }
        }).then(function (response) {
            $scope.newUserData = response.data;
            if ($scope.newUserData.length < 10) {
                $scope.information = "Creating the new account succesfull!";
                $scope.errorFlag = false;
            } else {
                $scope.registerError = response.data;
                $scope.errorFlag = true;
            }
        })
    };

    $scope.logIn = function (user) {
        $scope.error = null;
        $http.get("PHP/logIn.php", {params: {userLogin: user.login, userPassword: user.password}})
            .then(function (response) {
                $scope.answer = response.data;
                if (angular.isDefined($scope.answer['login'])) {
                    $('#loginPanel').hide('scale', 500);
                    $interval(function () {
                        $('#loginPanel').show('scale', 500);
                        $scope.loginPanel = true;
                        $location.path("/");
                    }, 500);
                } else {
                    $scope.error = $scope.answer;
                }
            })
    };

    $scope.checkPanel = function () {
        $http.get("PHP/checkLogIn.php").then(function (response) {
            $scope.loginPanel = response.data;
        });
        return $scope.loginPanel;
    };

    $scope.addToHistory = function () {
        $http.get("PHP/addToHistory.php", {
            params: {
                bmr: $scope.calculations[0],
                dayBMR: $scope.calculations[1]
            }
        }).then(function (response) {
            if (response.data == true) {
                $scope.getDataOfHistory();
                $scope.information2 = "Added to history!";
            }
        });
    };

    $scope.chooseView = function (text) {
        switch (text) {
            case 1:
                $scope.includeView = 'View/formBMR.php';
                break;
            case 2:
                $scope.getDataOfHistory();
                $scope.includeView = 'View/history.php';
                break;
            case 3:
                $scope.showCallendar();
                $scope.includeView = 'View/training.php';
                break;
            case 4:
                $scope.includeView = 'View/diet.php';
                break;
        }
    };

    $scope.remove = function (id) {
        $http.get("PHP/deleteElement.php", {params: {id: id}}).then(function (response) {
            $scope.getDataOfHistory();
        });
    };

    $scope.addWorkout = function (newTraining) {
        $http.get("PHP/addSelectTraining.php",{params:{part:newTraining.part, description: newTraining.description}})
            .then(function (response) {
                $scope.done = response.data;
                $('#myModal').modal('show');
            })
    }

}]);