var app = angular.module('app',["ngRoute"]);

app.config(function ($routeProvider) {

    $routeProvider.when('/',{
        templateUrl: 'index.html'
    });

    $routeProvider.otherwise({
        redirectTo: '/'
    })
});

app.controller('mainCtrl',['$scope','$http','$location','$interval','$timeout', function ($scope, $http, $location, $interval,$timeout) {

    $scope.viewFlag = false;
    $scope.loginPanel = false;
    $scope.calculations = null;
    $scope.includeView = './View/formBMR.html';
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
        $scope.getDataToDiet();
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
        $timeout(function () {
            $scope.checkDiet();
        },100);
    };

    $scope.nextCalendarDiet = function () {
        if ($scope.monthToday < 11) {
            $scope.monthToday++;
            $scope.numberOfDays = $scope.dataCalendar[$scope.monthToday].numberOfDays;
            $scope.getCallendarForDiet($scope.monthToday);
        }
        $timeout(function () {
            $scope.checkDiet();
        },100);
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
        $timeout(function () {
            $scope.checkDiet();
        },200);
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
        });
    };
    $scope.getDataToDiet =function () {
        $http.get("PHP/getDataToDiet.php").then(function (response) {
            $scope.dataToDiet = response.data;
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
                $scope.includeView = 'View/calculate.html';
            })
    };


    $scope.showLogin = function () {
        $scope.formLogin = $("#loginForm");
        $scope.icon = $("#iconLogin");
        if ($scope.formLogin.css("display") == "none") {
            $scope.formLogin.show('blind', 1000);
            $scope.icon.hide('scale',1000);
            setTimeout(function () {
                $scope.icon.html('expand_less');
            },1000);
            $scope.icon.show('scale',1500);
        } else {
            $scope.formLogin.hide("blind", 1000);
            $scope.icon.hide('scale',1000);
            setTimeout(function () {
                $scope.icon.html('expand_more');
            },1000);
            $scope.icon.show('scale',1500);
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
                $scope.includeView = 'View/formBMR.html';
                break;
            case 2:
                $scope.getDataOfHistory();
                $scope.includeView = 'View/history.html';
                break;
            case 3:
                $scope.getDataToWorkout();
                $scope.showCallendar();
                $scope.includeView = 'View/training.html';
                break;
            case 4:
                $scope.showCallendarDiet();
                $scope.includeView = 'View/diet.html';
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
            if (array[month][day]) {
                $(this).addClass('isWorkout');
                $(this).attr('href','');
                $(this).bind('click',function () {
                    $scope.id = array[parseInt(month)][day].id;
                    var text = "<p>"+array[parseInt(month)][day].part+"</p><p>"+array[parseInt(month)][day].description+"</p>";
                    $('#textModal').html(text);
                    $('#buttonToDelete').html("<button class='btn btn-danger' onclick='deleteWorkout("+$scope.id+")'>Delete</button>");
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
            if (array[month][day]) {
                $(this).addClass('isWorkout');
                $(this).attr('href','');
                $(this).bind('click',function () {
                    $scope.dataWorkout = array[parseInt(month)][day].description;
                    $scope.id = array[parseInt(month)][day].id;
                    var text = "<p>"+array[parseInt(month)][day].part+"</p><p>"+array[parseInt(month)][day].description+"</p>";
                    $('#textModal').html(text);
                    $('#buttonToDelete').html("<button class='btn btn-danger' onclick='deleteWorkout("+$scope.id+")'>Delete</button>");
                    $('#modalWorkout').modal('show');
                });
            } else {
                $(this).removeClass('isWorkout');
            }
        });
    };

    $scope.addDiet = function (newDiet) {
        $http.get("PHP/addDiet.php",{params:{breakfast: newDiet.breakfast, lunch: newDiet.lunch, dinner: newDiet.dinner, dinner2: newDiet.dinner2, supper: newDiet.supper}})
            .then(function (response) {
                $scope.done = response.data;
                $('#myModalDiet').modal('show');
                $location.path('/');
            })

    };

    $scope.checkDiet = function () {
        var array2 = $scope.dataToDiet;
        $('.diet').each(function () {
            var id = $(this).attr('content');
            var dayMonth2 = id.split(',');
            var day2 = dayMonth2[0];
            var month2 = dayMonth2[1];
            if (array2[month2][day2]) {
                var idButton = "#button"+day2+"-"+month2;
                console.log(idButton);
                var idDivToFill = "#diet-"+day2+"-"+month2;
                $(idButton).css('border','6px solid red');
                    $scope.idDiv = array2[parseInt(month2)][day2].id;
                    var text = array2[parseInt(month2)][day2];
                    var textToFill = "<div class='diet-box'><p class='headlineDiet'>BREAKFAST: </p><p class='diet_description'>"+text.breakfast+"</p><p class='headlineDiet'> LUNCH: </p><p class='diet_description'>"+text.lunch+"</p><p class='headlineDiet'>DINNER: </p><p class='diet_description'>"+text.dinner+"</p><p class='headlineDiet'>SECOND DINNER: </p><p class='diet_description'>"+text.dinner2+"</p><p class='headlineDiet'>SUPPER: </p><p class='diet_description'>"+text.supper+"</p></div>";
                    $(idDivToFill).html(textToFill);
                    $(idButton).attr('disabled','disabled').attr('href','#');
                    var aButton = "#a-"+day2+"-"+month2;
                    $(aButton).attr('href','#');
            } else {
                $(this).removeClass('isWorkout');
            }
        });

    };
}]);

function deleteWorkout(id) {
    var request = new XMLHttpRequest();
    console.log("Wszedlem do usuwania i id= " + id);
    request.open("GET", "PHP/deleteWorkout.php?id=" + id, true);
    request.send(null);

    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {
                console.log("Delete element");

                console.log(request.responseText);

            }
        }
    }
}

function showDiet(id, month) {
    var text = "#diet"+"-"+id+"-"+month;
    if($(text).css('display')=="none"){
        $(text).show('blind',1500);
    } else{
        $(text).hide('blind',1500);
    }

}

