app.controller('ModifActuController', function ($scope, $http, Upload, $timeout) {
    $('#radio1').on("click", function () {
        console.log("rad1 clicked");
        $(this).css({"background-color": "#E62651", "color": "white"});
        $('#radio2').css({"background-color": "transparent", "color": "#E62651"});
    });

    $('#radio2').on("click", function () {
        console.log("rad1 clicked");
        $(this).css({"background-color": "#E62651", "color": "white"});
        $('#radio1').css({"background-color": "transparent", "color": "#E62651"});
    });

    if (gup('id')) {
        var infoss = gup('id');
        var articletype = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/actualites/article.php',
            data: {
                id: infoss,
                suppr : "non"
            }
        };

        $http(articletype).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("PHP SAYS: " + data);
            $scope.message = data;
            // window.location.href = '../pages/actualites';
            $('#btnsuppr').on("click", function () {
                console.log("btn clicked");
                var supprArt = {
                    method: 'POST',
                    url: 'http://localhost/dom-angular/api/pages/actualites/article.php',
                    data: {
                        id: infoss,
                        suppr: "supprimer"
                    }
                };
                $http(supprArt).success(function (data, status, headers, config) {
                    console.log(status);
                    console.log("ENVOYE A PHP: OUI");
                    console.log("PHP SAYS: " + data);
                    $scope.message = data;
                    window.location.href = '#/';

                }).error(function (data, status, headers, config) {
                    // si jamais ca merde sur l'envoi
                    console.log("Erreur: " + data + status);
                });
            });
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });

    }




    $scope.AjoutActu = function (actu, file) {

        var infoss = gup('id');

        // Si on clique on déclenche forcement le debut de la fonction, donc
        console.log("CLICKED");

        console.log(file);

        file.upload = Upload.upload (
            {
                method: 'POST',
                url: 'http://localhost/dom-angular/api/pages/actualites/update_actualite.php',
                data: {
                    id : infoss,
                    titre: actu.titre,
                    desc: actu.desc,
                    responsables: actu.responsables,
                    file: file,
                    urgent: actu.urgent
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
                    window.location.href = "#/";
                });
            },
            function(response) { // Erreur
                if (response.status > 0){
                    alert("Erreur Ajax : "+response.status + ': '
                        + response.data);
                }
            });
    };

});


