app.controller("vendreArticleCtrl", function ($scope, $routeParams, Login , ListesFactory ) {

    try {

        $scope.session = JSON.parse(window.localStorage.getItem("user_session"));
        $scope.session = $scope.session[0];
        // console.log("hello seller article");
        // console.log($scope.session);
    } catch (error) {

        console.log(error)
    }


    $scope.toBuys = [];
    $scope.articles=[];
    $scope.searchArticle = function (article) {
        console.log(" code de l'article ");
        console.log(article);

        ListesFactory.loadListeDetailsElement(article.codeA).then(function (response) {
            $scope.articles=response.data;

            for(var i =0 ; i < $scope.articles.length ; i++){
                isAlreadyCheck($scope.toBuys, $scope.articles[i])
            }

            console.log("le this article trouve est ");
            console.log(response.data);
        });

    };

    $scope.addToPanier =  function (data) {
        data.isPut = true;
        $scope.toBuys.push(data);
    };

    var isAlreadyCheck =  function (tabOject ,  object) {
        for(var i=0; i < tabOject.length ; i ++){
            if(tabOject[i].codeA == object.codeA){
                object.isPut = true;
            } else {
                object.isPut = false;
            }
        }
    };


    $scope.retirerArticle = function(data){
        for( var i = 0; i < $scope.toBuys.length; i++){
            if ( $scope.toBuys[i].codeA == data.codeA) {
                $scope.toBuys.splice(i, 1);
            }

        }
    };

    $scope.validerAchat = function () {

        for( var i = 0; i < $scope.toBuys.length; i++) {
            $scope.toBuys[i].action ="ADD_VENTE";
            $scope.toBuys[i].acheteur_name =$scope.acheteur.nom;
            $scope.toBuys[i].acheteur_adresse =$scope.acheteur.adresse;
            $scope.toBuys[i].acheteur_numero =$scope.acheteur.numero;
        }


        ListesFactory.setVente($scope.toBuys[0]).then(function (response) {
            $scope.isDone = false;
            if(response.data.success){
                $scope.lasteIdVente = response.data.lasteIdVente;
                for(var i = 1; i < $scope.toBuys.length; i++ ){
                    $scope.toBuys[i].lasteIdVente = $scope.lasteIdVente;
                        ListesFactory.setVente($scope.toBuys[i]).then(function( resp){

                            if(resp.data.success){
                                $scope.isDone =true;
                            } else {
                                $scope.isDone =false;
                            }
                        });
                }
            }
            if($scope.isDone){
                console.log(" C'est genial");
            }
        });



        console.log("----- le laste id Recu hors boucle------ ");
        console.log($scope.lasIdvente);



    };




    $(document).ready(function() {
        $('form').parsley();
    });






});