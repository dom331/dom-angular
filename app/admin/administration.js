app.controller('AdminController', function($scope, $http) {

    $http.get("http://localhost/dom-angular/api/pages/membres/listemembres.php")
        .then(function success(response) {
            $scope.membres = response.data;
            console.log("liste_membre " + response.data);
        }, function MyError(response) {
            console.log("erreur ajax" + response.data);
        });

    $http.get("http://localhost/dom-angular/api/pages/evenements/evenements.php")
        .then(function success(response) {
            $scope.events = response.data;
            console.log("liste_evenements " + response.data);
        }, function MyError(response) {
            console.log("erreur ajax" + response.data);
        });

    $scope.DeleteMembre = function (id) {

        var AcceptMembre = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/admin/previsualisation_user.php',
            data: {
                id: id,
                valider: "non",
                suppr: "supprimer"
            }
        };

        $http(AcceptMembre).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("article_objets_type_says: " + data);
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    };

    $scope.DeleteMembre = function (id) {

        var AcceptMembre = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/admin/previsualisation_user.php',
            data: {
                id: id,
                valider: "valider",
                suppr: "non"
            }
        };

        $http(AcceptMembre).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("article_objets_type_says: " + data);
            window.location.reload();
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    };

    $scope.AcceptEvent = function (id) {

        var AcceptEvent = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/admin/previsualisation.php',
            data: {
                id: id,
                valider: "valider",
                suppr: "non"
            }
        };

        $http(AcceptEvent).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("article_objets_type_says: " + data);
            window.location.reload();
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    };

    $scope.DeleteEvent = function (id) {

        var DeleteEvent = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/admin/previsualisation.php',
            data: {
                id: id,
                valider: "valider",
                suppr: "non"
            }
        };

        $http(DeleteEvent).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("article_objets_type_says: " + data);
            window.location.reload();
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    };

});