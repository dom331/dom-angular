app.config(function($routeProvider) {
    $routeProvider
        .when
        ("/", {
            templateUrl: "pages/index.html",
            controller: "IndexController"
        })
        .when
        ("/pages/actualites", {
            templateUrl: "pages/actualites.html",
            controller: "ActuController"
        })
        // .when
        // ("/competences", {
        //     templateUrl: "pages/competences.html"
        //
        // })
        // .when
        // ("/creations", {
        //     templateUrl: "pages/creations.html"
        //
        // })
        .otherwise
        ({
            redirectTo: "/"
        });
});