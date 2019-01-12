app.controller("SidebarCtrl", function ($scope, $location, Login) {

    try {
        $scope.session=JSON.parse(window.localStorage.getItem("user_session"));
        $scope.session = $scope.session[0];
    }catch (error){
        console.error(error);
    }

    if(!$scope.session){
        console.log("C'est pas bon on ");
        // window.location.href="../"
    }

    $scope.logOut = function () {
        notif('warning','Deconnexion en cours','Compte','toast-top-right');

        // window.localStorage.removeItem("user_session");
        // $location.path("/Gla-Vide-Grenier/vitrine-front/");
    };

    var data = {action:"CHECK_VENTE_DAY"};
    Login.checkControl(data).then(function (response) {
        console.log("data recu du web");
        console.log(response.data);
       if(response.data.is_dayVente){
           $scope.isDayVente=true;
       } else {
           $scope.isDayVente=false;
       }
    });



});

