app.controller('ModifProfilController', function ($scope, $http, Upload, $timeout) {


    if (gup('id')) {
        var infoss = gup('id');
        var profiltype = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/profil/profil.php',
            data: {
                id: infoss,
                convoque : "non"
            }
        };

        $http(profiltype).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("PHP SAYS: " + data);
            $scope.message = data;
            // window.location.href = '../pages/actualites';
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });

    $scope.AjoutActu = function (user, file) {

        var infoss = gup('id');

        // Si on clique on déclenche forcement le debut de la fonction, donc
        console.log("CLICKED");

        console.log(file);

        file.upload = Upload.upload (
            {
                method: 'POST',
                url: 'http://localhost/dom-angular/api/pages/profil/profil_update.php',
                data: {
                    id : infoss,
                    desc : user.desc,
                    date : user.date,
                    email : user.email,
                    file: file
                    
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });
        
        file.upload.then(function (response) {
                $timeout(function () { //Succes
                    console.log(response.data);
                    window.location.href = "#/profil?id="+infoss;
                    alert("Il faut se deconnecter pour voir les changements !");
                });
            },
            function(response) { // Erreur
                if (response.status > 0){
                    alert("Erreur Ajax : "+response.status + ': '
                        + response.data);
                }
            });
    };

}});


