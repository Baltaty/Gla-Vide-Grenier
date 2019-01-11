app.controller("codeCtrl" , function ($scope, $routeParams , Login , ListesFactory) {


    try {
        $scope.session = JSON.parse(window.localStorage.getItem("user_session"));
    }catch (Exception){
        console.log(Exception);
    }

    $scope.session = $scope.session[0];
    $scope.listeId = $routeParams.idListe;


    ListesFactory.LoadListeDetails($scope.listeId).then(function (response) {
        if(response.data){
            $scope.articles = response.data;
        }

    });

});