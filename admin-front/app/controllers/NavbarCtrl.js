app.controller("NavbarCtrl", function ($scope) {


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

    console.log(" hello nnavbar controller");

    $scope.logOut = function () {
        notif('warning','Deconnexion en cours','Compte','toast-top-right');

        // window.localStorage.removeItem("user_session");
        // $location.path("/Gla-Vide-Grenier/vitrine-front/");
    };



});