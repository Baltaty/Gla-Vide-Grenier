app.controller('userDetailsCtrl' , function ($scope , $routeParams, Login) {


    var trigramme =  $routeParams.trigramme;
    var req = "only&critere=trigramme&value="+trigramme;
    // console.log(req);

    console.log(" Hello userdetails");

    Login.getAllusers(req).then(function (resp) {
            if(resp.data[0]){
                $scope.user = resp.data[0];
                console.log($scope.user);
            } else {
                window.location.href="#/users-all";
            }

    });




});