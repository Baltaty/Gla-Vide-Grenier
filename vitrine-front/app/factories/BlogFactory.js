
app.factory("BlogFactory", function($q, $http){
    "use strict";
    var factory = {


        LatestArticles: function(){
            // login = JSON.parse(login);
            // login = JSON.stringify(login);
            console.log(BASE_URL+ "blog.php");
            var deferred = $q.defer();
            $http.get(BASE_URL+ "blog.php").then(function(data, status){
                deferred.resolve(data);
            }).catch(function(data, status){
                deferred.reject("impossible de recevoir les data");
            });
            return deferred.promise;
        }
    };

    return factory;
});