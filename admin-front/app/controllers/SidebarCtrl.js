app.controller("SidebarCtrl", function ($scope) {

    try {
        $scope.session=JSON.parse(window.localStorage.getItem("user_session"));
        $scope.session = $scope.session[0];
    }catch (error){
        console.error(error);
    }

    if(!$scope.session){
        console.log("C'est pas bon on ");
        // window.location.href="../"
    }

    console.log("hello sidebar");
    console.log($scope.session);


});

