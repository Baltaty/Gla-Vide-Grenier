var app = angular.module("App", ['toaster','ngRoute']);

app.config(function ($routeProvider, $httpProvider) {
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