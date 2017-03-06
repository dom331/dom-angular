app.config(function($routeProvider) {
    $routeProvider
        .when
        ("/", {
            templateUrl: "pages/actualite.html",
            controller: "MainController"
        })
        .when
        ("/pages/actualites", {
            templateUrl: "pages/actualites.html",
            controller: "MainController"
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