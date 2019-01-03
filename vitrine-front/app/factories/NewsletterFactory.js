app.factory("NewsletterFactory", function($q, $http){
    "use strict";
    var factory = {


        addMail: function(newsletteremail){
            // login = JSON.parse(login);
            // login = JSON.stringify(login);
            // console.log(login);
            console.log("dans le factory");
            console.log(newsletteremail);
            var deferred = $q.defer();
            $http.post(BASE_URL+ "newsletter.php", newsletteremail).then(function(data, status){
                deferred.resolve(data);
                console.log(data);
            }).catch(function(data, status){
                deferred.reject("impossible de recevoir les data");
            });
            return deferred.promise;
        }
    };

    return factory;
});