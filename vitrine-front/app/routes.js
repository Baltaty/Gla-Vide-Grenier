var app = angular.module("App", ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'panel/home.html',
            controller: 'homeCtrl'
        })
        .when('/about/us', {
            templateUrl: 'panel/about.html',
            controller: 'aboutCtrl'
        })
        .when('/events/all', {
            templateUrl: 'panel/eventall.html',
            controller: 'eventCtrl'

        })
        .when('/event/details', {
            templateUrl: 'panel/events.html',
            controller: 'aboutCtrl'
        })
        .when('/blog', {
            templateUrl: 'panel/blogs.html',
            controller: 'blogsCtrl'
        })
        .when('/contact', {
            templateUrl: 'panel/contacts.html',
            controller: 'contactCtrl'
        })
        .otherwise({ redirectTo: '/'});
});