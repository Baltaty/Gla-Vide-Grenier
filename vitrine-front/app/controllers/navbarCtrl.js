
app.controller("navbarCtrl", function ($scope, Login, $http,toaster) {
    console.log("Hello navbarController");



     $scope.setLogin = function (login){
        console.log(" je write mon data as service ---");
        console.log(login);
        try{
            Login.userLogin(login).then(function (response) {
                   //console.log(response.data);
                   if(response.data.autorize){
                       toaster.pop({
                           type: 'sucess',
                           title: 'connexion',
                           body: response.data.message,
                           timeout: 1500
                       });
                       // TODO REDIRECTION A FAIRE
                   } else{
                       toaster.pop({
                           type: 'error',
                           title: 'connexion failed',
                           body: response.data.message,
                           timeout: 2000
                       });
                   }

            });
        }catch (ex){
         console.error(ex)
         }

    }
});