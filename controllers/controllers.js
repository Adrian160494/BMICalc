var app = angular.module('app',["ngRoute"]);

app.config(function ($routeProvider) {

    $routeProvider.otherwise({
        redirectTo: '/'
    })
});

app.controller('mainCtrl',['$scope','$http','$location','$interval','$timeout', function ($scope, $http, $location, $interval,$timeout) {

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
        $scope.checkPanel();
        $scope.getCallendar();
        $scope.getCallendarForDiet();
        $scope.getDataToWorkout();
        $('#callendar').html($scope.callendar);
        $('#callendarDiet').html($scope.callendarDiet);
    };

    $scope.getCallendar = function (month) {
        var now = new Date();
        var data = new Date(now.getUTCFullYear(), month, 1, 0, 0, 0);
        $scope.firstDayOfMonth = data.getDay();
        $http.get("PHP/createCallendar.php", {
            params: {
                numberOfDays: $scope.numberOfDays,
                month: month,
                firstDayOfMonth: $scope.firstDayOfMonth
            }
        }).success(function (data) {
            $scope.callendar = data;
        });
        $timeout(function () {
            $('#callendar').html($scope.callendar);
        },100);
    };

    $scope.getCallendarForDiet =function (month) {
        var now = new Date();
        var data = new Date(now.getUTCFullYear(), month, 1, 0, 0, 0);
        $scope.firstDayOfMonth2 = data.getDay();
        $http.get("PHP/createCallendarForDiet.php", {
            params: {
                numberOfDays: $scope.numberOfDays,
                month: month,
                firstDayOfMonth: $scope.firstDayOfMonth2
            }
        }).success(function (data) {
            $scope.callendarDiet = data;
        });
        $timeout(function () {
            $('#callendarDiet').html($scope.callendarDiet);
        },100);
    };

    $scope.createCallendar = function () {
        $('#callendar').html($scope.callendar);
        $('#callendarDiet').html($scope.callendarDiet);
    };

    $scope.prevCalendar = function () {
        if ($scope.monthToday > 0) {
            $scope.monthToday--;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
            $scope.getCallendar($scope.monthToday);
        }
        $timeout(function () {
            $scope.checkWorkoutS();
            $scope.checkWorkoutR();
        },100);
    };

    $scope.nextCalendar = function () {
        if ($scope.monthToday < 11) {
            $scope.monthToday++;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
            $scope.getCallendar($scope.monthToday);
        }
        $timeout(function () {
            $scope.checkWorkoutS();
            $scope.checkWorkoutR();
        },100);
    };

    $scope.prevCalendarDiet = function () {
        if ($scope.monthToday > 0) {
            $scope.monthToday--;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
            $scope.getCallendarForDiet($scope.monthToday);
        }
    };

    $scope.nextCalendarDiet = function () {
        if ($scope.monthToday < 11) {
            $scope.monthToday++;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
            $scope.getCallendarForDiet($scope.monthToday);
        }
    };

    $scope.showCallendar = function () {
        $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
        $scope.getCallendar($scope.monthToday);
        $timeout(function () {
            $scope.checkWorkoutS();
            $scope.checkWorkoutR();
        },200);
    };

    $scope.showCallendarDiet = function () {
        $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
        $scope.getCallendarForDiet($scope.monthToday);
    };

    $scope.showDiet = function (id, month) {
        console.log(id+" "+month);
      var text = '#'+id+'-'+month;
      $(text).animate({height: '+300px'},1000,'linear');
    };

    $scope.getDataOfHistory = function () {
        $http.get("PHP/getDataToHistory.php").then(function (response) {
            $scope.dataToHistory = response.data;
        });
    };

    $scope.getDataToWorkout =function () {
        $http.get("PHP/getDataToWorkout.php").then(function (response) {
            $scope.dataToWorkout = response.data;
            $scope.id =
            console.log($scope.dataToWorkout);
        });
    };

    $scope.deleteWorkout = function (id) {
        console.log("Dzialam "+id);
        $http.get("PHP/deleteWorkout.php",{params:{id: id}}).then(function (res) {
            $scope.done = res.data;
        })
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
                $scope.showCallendarDiet();
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
        $http.get("PHP/addWorkout.php",{params:{part:newTraining.part, description: newTraining.description}})
            .then(function (response) {
                $scope.done = response.data;
                var date = new Date();
                $scope.date = $scope.done[0]+"-"+($scope.done[1]+1)+"-"+date.getFullYear();
                $('#myModal').modal('show');
            })
    };

    $scope.checkWorkoutS = function () {
        var array = $scope.dataToWorkout;
        $('.daysS').each(function () {
            var id = $(this).attr('content');
            var dayMonth = id.split(',');
            var day = dayMonth[0];
            var month = dayMonth[1];
            if (array[month][day]!=undefined) {
                $(this).addClass('isWorkout');
                $(this).attr('href','');
                $(this).bind('click',function () {
                    $scope.id = array[parseInt(month)][day].id;
                    var text = "<p>"+array[parseInt(month)][day].part+"</p><p>"+array[parseInt(month)][day].description+"</p>";
                    $('#textModal').html(text);
                    $('#buttonToDelete').html("<button class='btn btn-danger' ng-click=\"deleteWorkout("+$scope.id+")\">Delete</button>");
                    $('#modalWorkout').modal('show');
                });
            } else {
                $(this).removeClass('isWorkout');
            }
        });

    };
    $scope.checkWorkoutR = function () {
        var array = $scope.dataToWorkout;
        $('.daysR').each(function () {
            var id = $(this).attr('content');
            var dayMonth = id.split(',');
            var day = dayMonth[0];
            var month = dayMonth[1];
            if (array[month][day]!=undefined) {
                $(this).addClass('isWorkout');
                $(this).attr('href','');
                $(this).bind('click',function () {
                    $scope.dataWorkout = array[parseInt(month)][day].description;
                    $scope.id = array[parseInt(month)][day].id;
                    var text = "<p>"+array[parseInt(month)][day].part+"</p><p>"+array[parseInt(month)][day].description+"</p>";
                    $('#textModal').html(text);
                    $('#buttonToDelete').html("<button class='btn btn-danger' ng-click='deleteWorkout("+$scope.id+")'>Delete</button>");
                    $('#modalWorkout').modal('show');
                });
            } else {
                $(this).removeClass('isWorkout');
            }
        });
    }
}]);

