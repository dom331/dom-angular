app.controller('AjoutEventController', function ($scope, $http, Upload, $timeout) {

    $scope.AjoutEvent = function (event, file) {

        // Si on clique on déclenche forcement le debut de la fonction, donc
        console.log("CLICKED");

        console.log(file, event.titre,
        event.desc,
        event.responsables,
        event.date,
        event.prix,
        event.a_prevoir);

        file.upload = Upload.upload(
            {
                method: 'POST',
                url: 'http://localhost/dom-angular/api/pages/evenements/poster_evenement.php',
                data: {
                    titre: event.titre,
                    desc: event.desc,
                    responsables: event.responsables,
                    date: event.date,
                    prix: event.prix,
                    a_prevoir: event.a_prevoir,
                    file: file
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });

        // on verifie les infos en cours de route
        // console.log("PRET POUR ENVOI: " + newActu.data.titre + "," + newActu.data.desc + "," + newActu.data.responsables + "," + newActu.data.file + "," + newActu.data.urgent);
        //
        // Ensuite viens le moment d'envoyer nos infos avec la method http
        // $http(newActus).success(function (data, status, headers, config) {
        //     console.log(status);
        //     console.log("ENVOYE A PHP: OUI");
        //     console.log("PHP SAYS: " + data);
        //     // window.location.href = '#/';
        //     // alert('Votre inscription a bien été enregistré. Vous êtes en attente d\'approbation');
        // }).error(function (data, status, headers, config) {
        //     // si jamais ca merde sur l'envoi
        //     console.log("Erreur: " + data + status);
        // });

        file.upload.then(function (response) {
                $timeout(function () { //Succes
                    console.log(response.data);
                    window.location.href = "#/evenements";
                });
            },
            function (response) { // Erreur
                if (response.status > 0) {
                    alert("Erreur Ajax : " + response.status + ': '
                        + response.data);
                }
            });
    };
});
    