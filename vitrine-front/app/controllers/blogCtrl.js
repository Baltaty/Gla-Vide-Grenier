app.controller("blogCtrl", function ($scope, BlogFactory) {

    console.log(" helloContro");

    
        console.log(" je cherche a recuperer les articles ---");
        
        try{
            BlogFactory.LatestArticles().then(function (response) {
                   //console.log(response.data);
                   //$scope.articles= response.data;

            });
        }catch (ex){
         console.error(ex)
         }

   
});
 //sloution 2
//  app.controller('blogCtrl', function($scope, $http) {
//     $http.get(BASE_URL+"blog.php")
//     .then(function (response) {$scope.articles = response.data;});
// });