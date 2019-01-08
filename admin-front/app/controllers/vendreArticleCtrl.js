app.controller("vendreArticleCtrl", function ($scope, $routeParams, Login , ListesFactory ) {

    try {

        $scope.session = JSON.parse(window.localStorage.getItem("user_session"));
        $scope.session = $scope.session[0];
        console.log("hello seller article");
        console.log($scope.session);
    } catch (error) {

        console.log(error)
    }


    $scope.searchArticle = function (article) {

        console.log(" code de l'article ");
        console.log(article);

        ListesFactory.loadListeDetailsElement(article.codeA).then(function (response) {
            $scope.articles=response.data;
            console.log("le this article trouve est ");
            console.log(response.data);
        });

    }




});