app.config(function($routeProvider) {
    $routeProvider
        .when
        ("/actualites", {
            templateUrl: "pages/actualites/liste-actualites.html",
            controller: "ActuController"
        })
        .when
        ("/actualite", {
            templateUrl: "pages/actualites/actualite-type.html",
            controller: "ActuController"
        })
        .when
        ("/actualite/ajout", {
            templateUrl: "pages/actualites/ajout-actualite.html",
            controller: "ActuController"
        })
        .when
        ("/evenements", {
            templateUrl: "pages/evenements/liste-evenements.html",
            controller: "EventController"
        })
        .when
        ("/evenement", {
            templateUrl: "pages/evenements/evenement-type.html",
            controller: "EventController"
        })
        .when
        ("/evenement/ajout", {
            templateUrl: "pages/evenements/ajout-evenement.html",
            controller: "EventController"
        })
        .when
        ("/membres", {
            templateUrl: "pages/vie-scolaire/liste-membres.html",
            controller: "MembresController"
        })
        .when
        ("/profil", {
            templateUrl: "pages/profil/profil.html",
            controller: "ProfilController"
        })
        .when
        ("/vie-scolaire", {
            templateUrl: "pages/vie-scolaire/vie-scolaire.html",
            controller: "VieScoController"
        })
        .when
        ("/administration", {
            templateUrl: "pages/admin/administration.html",
            controller: "AdminController"
        })
        .when
        ("/objets-perdus", {
            templateUrl: "pages/objets-perdus/liste-objets-perdus.html",
            controller: "ObjPerduController"
        })
        .when
        ("/objet-perdu", {
            templateUrl: "pages/objets-perdus/objet-perdu-type.html",
            controller: "ObjPerduController"
        })
        .when
        ("/objet-perdu/ajout", {
            templateUrl: "pages/objets-perdus/ajout-objet-perdu.html",
            controller: "ObjPerduController"
        })

    
        .otherwise
        ({
            redirectTo: "/actualites"
        });
});