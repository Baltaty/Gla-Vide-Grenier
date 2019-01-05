app.controller("registerActiveCtrl", function ($scope,toaster,Login , $routeParams,$location) {


    console.log(" My token");
    $scope.myparam = $routeParams.token ;
    var data = {
        cle : $scope.myparam,
        actif : 0,
        action: "VERIFY",
    };
    console.log(data);


    Login.userActive(data).then(function (response) {
        console.log(" reponse recu apres la data");
        console.log(response);
        if(response.data.success){
            toaster.pop({
                type: 'success',
                title:'Glazyk Compte',
                body: ' Votre compte a été active avec sucess',
                timeout: 2000
            });
            $location.path("/");

        } else {
            toaster.pop({
                type: 'error',
                title:'Glazyk Compte',
                body: " Votre compte  n\' est pas enregistré ! ",
                timeout: 2000
            });
        }


    });


});