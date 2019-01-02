app.factory("Login", function($q, $http){
    "use strict";
    var factory = {

        // Agent logout
        userLogin: function(data){
            var deferred = $q.defer();

            $http.post(BASE_URL+ "login.php/", data).then(function(data, status){
                deferred.resolve(data);
            }).catch(function(data, status){
                deferred.reject(data);
            });
            return deferred.promise;
        }

    };

    return factory;
});
