var app = angular.module('App', ['ngRoute']);

app.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'accueil.html',
            controller: 'HomeCtrl'
        })
        .when('/wait-demande', {
            templateUrl: 'demandes/list.html',
            controller: 'WaitDemandeCtrl'
        })
        .otherwise({ redirectTo: '/'});


});