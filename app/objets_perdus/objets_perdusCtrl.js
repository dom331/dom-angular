function gup( name, url ) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    return results == null ? null : results[1];
}

app.controller('ObjPerduController', function($scope, $http, Upload, $timeout) {


    if (gup('id')) {
        var infoss = gup('id');
        var eventType = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/objets_perdus/article_objets_perdus.php',
            data: {
                id: infoss,
                suppr: "non"
            }
        };

        $http(eventType).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("article_objets_type_says: " + data);
            $scope.article = data;
            $('#btnsuppr').on("click", function () {
                console.log("btn clicked");
                var supprArt = {
                    method: 'POST',
                    url: 'http://localhost/dom-angular/api/pages/objets_perdus/article_objets_perdus.php',
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
                    window.location.href = '#/vie-scolaire';

                }).error(function (data, status, headers, config) {
                    // si jamais ca merde sur l'envoi
                    console.log("Erreur: " + data + status);
                });
            });
            // window.location.href = '../pages/objetalites';
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    }
    



    $scope.AjoutObj = function (objet, file) {

        // Si on clique on déclenche forcement le debut de la fonction, donc
        console.log("CLICKED");

        console.log(file);

        file.upload = Upload.upload (
            {
                method: 'POST',
                url: 'http://localhost/dom-angular/api/pages/objets_perdus/add_objets_perdus.php',
                data: {
                    titre: objet.titre,
                    desc: objet.desc,
                    responsables: objet.responsables,
                    file: file
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });




        // on verifie les infos en cours de route
        // console.log("PRET POUR ENVOI: " + newobjet.data.titre + "," + newobjet.data.desc + "," + newobjet.data.responsables + "," + newobjet.data.file + "," + newobjet.data.urgent);
        //
        // Ensuite viens le moment d'envoyer nos infos avec la method http
        // $http(newobjets).success(function (data, status, headers, config) {
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
                    window.location.href = "#/vie-scolaire";
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