app.controller("blogdetailsCtrl", function ($scope, $routeParams,BlogdetailsFactory) {

    console.log(" helloContro");

    
        console.log(" je cherche a recuperer l'article choisi ---");
        console.log($routeParams.id);
        var id_article=$routeParams.id;
        
        try{
            BlogdetailsFactory.GetArticle(id_article).then(function (response) {
                   
                $scope.article= response.data[0];
                   console.log("data a afficher");
                   console.log($scope.article);
            });
        }catch (ex){
         console.error(ex)
         }

         $scope.AddComment= function(comment,id_article){
            try{
                BlogdetailsFactory.AddComment(comment,id_article).then(function (response) {
                       
                    // $scope.article= response.data[0];
                    //    console.log("data a afficher");
                        console.log(response.data);

                });
            }catch (ex){
             console.error(ex)
             }
         }
   
});