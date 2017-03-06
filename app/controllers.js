

app.controller('IndexController', function($scope, $http) {

    // connectUser START
    $scope.connectUser = function(user){

        // Si on clique on déclenche forcement le debut de la fonction, donc
        console.log("CLICKED");

        // Je recupere les infos envoyer avec l'envoie du formullaire * ng-submit="connectUser(user)" *
        // on peut renomer si besoin *function(user)* par *function(mesInfosRecu)* sans soucis
        // On fait un petit pack des infos pour que ce soit plus propre
        var info = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/index.php',
            data: {
                user: user.log,
                psw: user.lepsw
            }
        };


        // on verifie les infos en cours de route
        console.log("PRET POUR ENVOI: " + info.data.user + "," + info.data.psw);

        // Ensuite viens le moment d'envoyer nos infos avec la method http
        $http(info).success(function(data, status, headers, config){
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("PHP SAYS: " + data);
            $scope.message = data;
            window.location.href = 'http://localhost/dom-angular/pages/actualites.html';
        }).error(function(data, status, headers, config){
            // si jamais ca merde sur l'envoi
            console.log("Erreur: "+data+status);
        });


    };

}); // connectUser END



app.controller('ActuController', function($scope, $http) {

    $http.get("http://localhost/dom-angular/api/pages/actualites/actualites.php")
        .then(function success(response) {
            $scope.infoUsers = response.data;
            console.log(response.data);
        }, function myError(response) {
            $scope.infoUsers = response.statusText;
            console.log(response.data);
        });

}); // connectUser END