app.controller("eventCtrl", function($scope,$routeParams,EventFactory) {

    try {
        $scope.session = JSON.parse(window.localStorage.getItem("user_session"));
        $scope.session = $scope.session[0];
        $scope.id_event=$routeParams.id;
        var id_event=$routeParams.id;
    } catch (error) {

    }
    try{
        EventFactory.LoadEvents().then(function (response) {
               
               $scope.loadedevents= response.data;
               console.log(response.data);
        });
    }catch (ex){
     console.error(ex)
     }
     try{
        EventFactory.loadEventDetailsElement(id_event).then(function (response) {

                // if(response.data.valide){
                //     toaster.pop({
                //         type: 'sucess',
                //         title: 'Parfait !',
                //         body: response.data.message,
                //         timeout: 1500
                //     });
                // }
                $scope.thisevent=response.data[0];
                console.log("le thisevent trouve est ");
                console.log(response.data[0]);
                //window.location.href
            });
    }catch (ex){
     console.error(ex)
     }

     $scope.EditEvent= function(name,date,lieu){
        console.log(" Je suis dans la fonction edit event  du controller");


       try{
           EventFactory.EditEventDetails(id_event,name,date,lieu).then(function (response) {

                   // if(response.data.valide){
                   //     toaster.pop({
                   //         type: 'sucess',
                   //         title: 'Parfait !',
                   //         body: response.data.message,
                   //         timeout: 1500
                   //     });
                   // }
                   console.log(response.data);
                   notif('success','event modifié avec succès !','MODIFICATION D\'EVENT','toast-top-full-width');
                   window.location.href="#/events";
               });
       }catch (ex){
        console.error(ex)
        }
    }

});