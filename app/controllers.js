function gup( name, url ) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    return results == null ? null : results[1];
}

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
            url: 'http://localhost/dom-angular/visiteur/api/pages/divers/index.php',
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
            window.location.href = '../pages/actualites';
        }).error(function(data, status, headers, config){
            // si jamais ca merde sur l'envoi
            console.log("Erreur: "+data+status);
        });


    };

}); // connectUser END



app.controller('ActuController', function($scope, $http) {


    $http.get("http://localhost/dom-angular/api/pages/deconnexion/redirection.php")
        .then(function success(response) {
            console.log(response.data);
            if (response.data == "non existant"){
                window.location.href = "visiteur/#/";
            }
        });

    $http.get("http://localhost/dom-angular/api/pages/actualites/actualites.php")
        .then(function success(response) {
            $scope.donnees = response.data;
            console.log($scope.donnees);
        }, function myError(response) {
            $scope.donnees = response.statusText;
            console.log(response.data);
        });

    if (gup('id')) {
        var infoss = gup('id');
        var articletype = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/actualites/article.php',
            data: {
                id: infoss
            }
        };

        $http(articletype).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("PHP SAYS: " + data);
            $scope.message = data;
            // window.location.href = '../pages/actualites';
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    }


    $('.deconnexion').on("click", function () {
        $http.get("http://localhost/dom-angular/api/pages/deconnexion/deconnexion.php")
            .then(function success(response){
                console.log("session détruite"+response.data);
                window.location.href = "visiteur/#/";
            }, function MyError(response) {
            console.log("session existante"+response.data);
        })
    })

}); // connectUser END


app.controller('EventController', function($scope, $http) {

    if (gup('id')) {
        var infoss = gup('id');
        var eventType = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/evenements/article_evenement.php',
            data: {
                id: infoss
            }
        };

        $http(eventType).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("article_type_says: " + data);
            $scope.article = data;
            // window.location.href = '../pages/actualites';
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    }

    $http.get("http://localhost/dom-angular/api/pages/evenements/evenements.php")
        .then(function success(response){
            $scope.message = response.data;
            console.log("liste_evenements"+$scope.message);
        }, function MyError(response) {
            console.log("erreur ajax"+response.data);
        });



});

app.controller('AdminController', function($scope, $http) {

});

app.controller('MembresController', function($scope, $http) {

    $http.get("http://localhost/dom-angular/api/pages/membres/listemembres.php")
        .then(function success(response){
            $scope.message = response.data;
            console.log("liste_membre"+$scope.message);
        }, function MyError(response) {
            console.log("erreur ajax"+response.data);
        });

    $http.get("http://localhost/dom-angular/api/pages/viescolaire/objetsperdus.php")
        .then(function success(response){
            $scope.objetsperdus = response.data;
            console.log("objets_perdus"+$scope.message);
        }, function MyError(response) {
            console.log("erreur ajax"+response.data);
        });
    

    
});
app.controller('ProfilController', function($scope, $http) {

    if (gup('id')) {
        var infoss = gup('id');
        var profiltype = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/profil/profil.php',
            data: {
                id: infoss
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
    }
    
});
app.controller('VieScoController', function($scope, $http) {

});
app.controller('ObjPerduController', function($scope, $http) {

});