app.config(function($routeProvider) {
    $routeProvider
        .when
        ("/", {
            templateUrl: "pages/actualites.html",
            controller: "ActuController"
        })
        .when
        ("/evenements", {
            templateUrl: "pages/evenements.html",
            controller: "EventController"
        })
        .when
        ("/administration", {
            templateUrl: "pages/administration.html",
            controller: "AdminController"
        })
        .otherwise
        ({
            redirectTo: "/"
        });
});