app.config(function($routeProvider) {
    $routeProvider
        .when
        ("/", {
            templateUrl: "pages/index.html",
            controller: "IndexController"
        })
        .when
        ("/inscription", {
            templateUrl: "pages/inscriptions.html"
        })
        .when
        ("/inscription/etudiant", {
            templateUrl: "pages/inscription/inscription-type.html",
            controller: "InscrEtudController"
        })
        .when
        ("/inscription/pedagogie", {
            templateUrl: "pages/inscription/inscription-type.html",
            controller: "InscrPedagController"
        })

        .otherwise
        ({
            redirectTo: "/"
        });
});