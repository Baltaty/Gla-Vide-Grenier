app.factory("Login", function($q, $http){
    "use strict";
    var factory = {


        userLogin: function(login){
            // login = JSON.parse(login);
            // login = JSON.stringify(login);
            // console.log(login);
            var deferred = $q.defer();
            $http.post(BASE_URL+ "login.php", login).then(function(data, status){
                deferred.resolve(data);
            }).catch(function(data, status){
                deferred.reject("impossible de recevoir les data");
            });
            return deferred.promise;
        },
        userRegister: function(data){
            var deferred = $q.defer();
            $http.post(BASE_URL+ "user.php", data).then(function(data, status){
                deferred.resolve(data);
            }).catch(function(data, status){
                deferred.reject("impossible de recevoir les data");
            });
            return deferred.promise;
        },

    };

    return factory;
});