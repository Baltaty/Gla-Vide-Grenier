app.controller("listesCtrl", function ($scope,$routeParams,ListesFactory, Login,Session) {


    $scope.session =  Session.isLogged();
    try {
        var tri = $scope.session.trigramme;
        var num_liste=$routeParams.num;
        var codeA=$routeParams.codeA;
        $scope.num_liste=$routeParams.num;

    } catch (error) {
            console.log(error)
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
        ListesFactory.LoadEvents().then(function (response) {
               
               $scope.events= response.data;
               console.log(response.data);
        });
    }catch (ex){
     console.error(ex)
     }

     try{
        ListesFactory.LoadListeDetails(num_liste).then(function (response) {
               
            $scope.listesdetails= response.data;
            Login.getParameters().then(function (res) {

                if(res.data.success){
                    $scope.parameters = res.data.data;
                    if($scope.listesdetails.length==parseInt($scope.parameters.nombre_article)){
                        $scope.burnOut=true;
                    } else {
                        $scope.burnOut=false;
                    }

                    if($scope.listesdetails.length==0){
                        $scope.empty = true;
                    } else {
                        $scope.empty = false;
                    }
                } else {
                    $scope.burnOut=false;
                }


            });
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
                    notif('success','C\'est parfait !','SUPPRESSION DE LISTE','toast-top-full-width');
                    window.location.href="#/listes";
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
                    notif('success','Suppression effectuée avec succès !','SUPPRESSION D\'ARTICLE','toast-top-full-width');
                    //console.log("fksdngksj");
                    //window.location.href="#/listes/"+num_liste;
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
                    notif('success','Liste ajoutée avec succès !','AJOUT DE LISTE','toast-top-full-width');
                    window.location.href="#/listes";
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
                   //console.log(response.data);
                   notif('success','Article ajouté avec succès !','AJOUT D\'ARTICLE','toast-top-full-width');
                   window.location.href="#/listes/"+num_liste;
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
                   notif('success','Article modifié avec succès !','MODIFICATION D\'ARTICLE','toast-top-full-width');

               });
       }catch (ex){
        console.error(ex)
        }
    }
    $scope.MajListeStatut= function(num_liste,eventselect){
        console.log(" Je suis dans la fonction maj  du controller ET event EST ");
        console.log(eventselect);
       try{
           ListesFactory.MajListeStatut(num_liste,eventselect).then(function (response) {
                
                   // if(response.data.valide){
                   //     toaster.pop({
                   //         type: 'sucess',
                   //         title: 'Parfait !',
                   //         body: response.data.message,
                   //         timeout: 1500
                   //     });
                   // }
                   console.log(response.data);
                   notif('success','Soumission faite avec succès !','SOUMISSION DE LISTE','toast-top-full-width');
                   window.location.href="#/listes";

               });
       }catch (ex){
        console.error(ex)
        }
    }

    $scope.changeStatus = function (data) {
        data.action="UPDATE";
        data.critere="statut";
        data.statut="FOURNI";

        ListesFactory.setUpdateArticle(data).then(function (response) {

            if(response.data.success){
                notif('success',response.data.message,'Article','toast-top-full-width');
            }else{
                notif('error',response.data.message,'Article','toast-top-full-width')
            }
        });
        
    };


    $('#filer_input2').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['jpg', 'jpeg', 'png',],
        changeInput: true,
        showThumbs: true,
        addMore: true
    });

    
});