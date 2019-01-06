app.controller("usersCtrl" , function ($scope , $location, Login) {


    console.log(" hello users Ctrl");

    Login.getAllusers("ALL").then(function (resp) {
        console.log(resp);
        $scope.users = resp.data;
        console.log($scope.users);
    });

    $scope.confirmeDelete = function (data) {
        $scope.toDelete = data;
    };

    $scope.delete = function(data){

        console.log(" je lance le delete");
        console.log(data);
        delete data;

        // Login.deleteUser(data.trigramme).then(function (response) {
        //     if(response.data.success){
        //         delete data;
        //         console.log(" suppression de data effectuer");
        //     }
        // });
    }
});