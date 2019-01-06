app.controller("listesCtrl", function ($scope,$routeParams,ListesFactory) {

    try {
        $scope.session = JSON.parse(window.localStorage.getItem("user_session"));
        var tri = $scope.session[0]['trigramme'];
        var num_liste=$routeParams.num;
        var codeA=$routeParams.codeA;
        $scope.num_liste=$routeParams.num;

        console.log("le codeA trouve est ");
        console.log(codeA);
    } catch (error) {

    }


    try{
        ListesFactory.LoadListes(tri).then(function (response) {
               
               $scope.listes= response.data;
               console.log(response.data);
        });
    }catch (ex){
     console.error(ex)
     }

     try{
        ListesFactory.LoadListeDetails(num_liste).then(function (response) {
               
               $scope.listesdetails= response.data;
               console.log(response.data[0]);
        });
    }catch (ex){
     console.error(ex)
     }

     try{
        ListesFactory.loadListeDetailsElement(codeA).then(function (response) {

                // if(response.data.valide){
                //     toaster.pop({
                //         type: 'sucess',
                //         title: 'Parfait !',
                //         body: response.data.message,
                //         timeout: 1500
                //     });
                // }
                $scope.thisarticle=response.data[0];
                console.log("le thisarticle trouve est ");
                console.log(response.data[0]);
                //window.location.href
            });
    }catch (ex){
     console.error(ex)
     }
     $scope.DeleteListe= function(num_liste){
        try{
            ListesFactory.DeleteListe(num_liste).then(function (response) {

                    // if(response.data.valide){
                    //     toaster.pop({
                    //         type: 'sucess',
                    //         title: 'Parfait !',
                    //         body: response.data.message,
                    //         timeout: 1500
                    //     });
                    // }
                    console.log(response.data);
                    //window.location.href
                });
        }catch (ex){
         console.error(ex)
         }
     }
     $scope.DeleteListeDetails= function(codeA){
        try{
            ListesFactory.DeleteListeDetails(codeA).then(function (response) {

                    // if(response.data.valide){
                    //     toaster.pop({
                    //         type: 'sucess',
                    //         title: 'Parfait !',
                    //         body: response.data.message,
                    //         timeout: 1500
                    //     });
                    // }
                    console.log(response.data);
                    //window.location.href
                });
        }catch (ex){
         console.error(ex)
         }
     }



     $scope.AddListe= function(nom_liste){
         console.log(" Je suis dans la fonction add du controller et le nom de la liste est ");
         console.log(nom_liste);
         console.log(tri);
        try{
            ListesFactory.Addliste(tri,nom_liste).then(function (response) {

                    // if(response.data.valide){
                    //     toaster.pop({
                    //         type: 'sucess',
                    //         title: 'Parfait !',
                    //         body: response.data.message,
                    //         timeout: 1500
                    //     });
                    // }
                    console.log(response.data);
                });
        }catch (ex){
         console.error(ex)
         }
     }
     $scope.AddListeDetails= function(description,prix,taille,commentaire){
        console.log(" Je suis dans la fonction add liste detail du controller ET NUM LISTE EST");
        console.log(num_liste);

       try{
           ListesFactory.AddListeDetails(num_liste,description,prix,taille,commentaire).then(function (response) {

                   // if(response.data.valide){
                   //     toaster.pop({
                   //         type: 'sucess',
                   //         title: 'Parfait !',
                   //         body: response.data.message,
                   //         timeout: 1500
                   //     });
                   // }
                   console.log(response.data);
               });
       }catch (ex){
        console.error(ex)
        }
    }
    $scope.EditListeDetails= function(description,prix,taille,commentaire){
        console.log(" Je suis dans la fonction edit liste detail du controller ET NUM LISTE EST xxx");

        console.log(description);

       try{
           ListesFactory.EditListeDetails(codeA,description,prix,taille,commentaire).then(function (response) {

                   // if(response.data.valide){
                   //     toaster.pop({
                   //         type: 'sucess',
                   //         title: 'Parfait !',
                   //         body: response.data.message,
                   //         timeout: 1500
                   //     });
                   // }
                   console.log(response.data);
               });
       }catch (ex){
        console.error(ex)
        }
    }
});