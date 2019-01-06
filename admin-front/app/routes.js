var app = angular.module('App', [,'ngRoute']);

app.config(function($routeProvider,$httpProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'accueil.html',
            controller: 'HomeCtrl'
        })
        .when('/wait-demande', {
            templateUrl: 'demandes/list.html',
            controller: 'WaitDemandeCtrl'
        })
        .when('/listes', {
            templateUrl: 'vendeur/listes.html',
            controller: 'listesCtrl'
        })
        .when('/addliste', {
            templateUrl: 'vendeur/addliste.html',
            controller: 'listesCtrl'
        })
        .when('/addlistedetails/:num', {
            templateUrl: 'vendeur/addlistedetails.html',
            controller: 'listesCtrl'
        })
        .when('/editlistedetails/:codeA', {
            templateUrl: 'vendeur/editlistedetails.html',
            controller: 'listesCtrl'
        })
        .when('/listes/:num', {
            templateUrl: 'vendeur/liste_details.html',
            controller: 'listesCtrl'
        })
        .otherwise({ redirectTo: '/'});

        $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
        $httpProvider.defaults.transformRequest.unshift(function (data, headersGetter) {
            var key, result = [];
    
            if (typeof data === "string")
                return data;
    
            for (key in data) {
                if (data.hasOwnProperty(key))
                    result.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
            }
            return result.join("&");
        });

});