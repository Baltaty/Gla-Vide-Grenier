app.factory("Login", function ($q, $http) {

    var factory = {
        // list of services in an agency
        connect: function (params) {
            var deferred = $q.defer();
            $http.post(BASE_URL + "login/user", params).then(function (data, status) {
                deferred.resolve(data);
            }).catch(function (data) {
                deferred.reject("Impossible de recupere les donnees");
            });
            return deferred.promise;
        },
    };

    return factory;
});