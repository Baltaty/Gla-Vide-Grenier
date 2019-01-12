app.controller("editCtrl", function($scope, $http) {
    try {
      //la page: edit.php the Action=show .then to flow him till the end and turn back the result requiered
      $http.get(BASE_URL+"edit.php?action=show").then(function(response){
        //console.log(response); contains alots of shit that we don't need
        //So we add .data
        $scope.texte=response.data[0];
      });
    } catch (error) {

    }
    $scope.modifyText = function(texte){
      try {
        //light *_*
        texte=texte.replace(/'/g,"/'");
        console.log(texte.replace(/\\'/g,"."));
        $http.get(BASE_URL+"edit.php?action=change&&texte="+texte).then(function(response){
          //console.log(response.data);
          notif('success','texte de presenation modifié avec succès !','MODIFICATION DE LA PRESENTATION','toast-top-full-width');

        });
      } catch (error) {
  
      }


    }

});