app.controller("aboutCtrl", function ($scope,$http) {

    AboutUSCarouBrand();
    $http.get(BASE_URL+"edit.php?action=show").then(function(response){
        console.log(response); //contains alots of shit that we don't need
        $scope.texte=response.data[0];
      });
});