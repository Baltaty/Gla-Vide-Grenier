app.controller("navbarCtrl", function ($scope, Login) {
    console.log("Hello navbarController");



     $scope.setLogin = function (data){
        console.log(" je write mon data as service ---");
        console.log(data);

        Login.userLogin(data).then(function (res) {
           console.log(res);
        })
    }
});