app.config(function($routeProvider) {
    $routeProvider
        .when
        ("/", {
            templateUrl: "pages/actualite.html"
        })
        // .when
        // ("/presentation", {
        //     templateUrl: "pages/presentation.html"
        // })
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