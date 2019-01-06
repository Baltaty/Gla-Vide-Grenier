app.controller("registerCtrl", function ($scope,toaster,Login) {

    // console.log(" hello RegisterContro");


    $scope.userInfo = true;
    $scope.DataLogin = false;
    $scope.NavigationForm = function (data) {

        if($scope.userInfo){
            $scope.userInfo = false;
            $scope.DataLogin = true;
            $scope.user = data;
        } else {
            $scope.userInfo = true;
            $scope.DataLogin = false;
        }

        // console.log("---- data for format ----");
        // console.log(data);
        $scope.readTerms=false;

    };

    $scope.readTerms = false;
    $scope.afficherBtn = function () {
        if(!$scope.readTerms){
            $scope.readTerms=true;
        }else{
            $scope.readTerms=false;
        }
    };

    $scope.registerData = function (data) {
          if(verifyData(data)){
              data.typeUser= "Vendeur";
              data.action= "ADD";
              delete  data.passconfirm;
              // console.log(data);
              Login.userRegister(data).then(function (response) {
                  if(response.data.exist){
                      toaster.pop({
                          type: 'warning',
                          title: 'Compte',
                          body: 'cet email est déjà associé à un compte veuillez le changer ',
                          timeout: 4000
                      });
                  }
              });
          }


    };

    var verifyData = function (data) {
        if(data.password != data.passconfirm){
            toaster.pop({
                type: 'error',
                title: 'Mot de passe',
                body: 'Veuillez entrez les memes mot de passe',
                timeout: 2000
            });
            return false;
        }
        return true;
    }


});