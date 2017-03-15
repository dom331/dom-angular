
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
            window.location.href = '../';
        }).error(function(data, status, headers, config){
            // si jamais ca merde sur l'envoi
            console.log("Erreur: "+data+status);
        });


    };

}); // connectUser END

app.controller('InscrEtudController', function($scope, $http) {
    $scope.choix = "étudiant";

    $scope.inscription = function(user){

        // Si on clique on déclenche forcement le debut de la fonction, donc
        console.log("CLICKED");

        // Je recupere les infos envoyer avec l'envoie du formullaire * ng-submit="connectUser(user)" *
        // on peut renomer si besoin *function(user)* par *function(mesInfosRecu)* sans soucis
        // On fait un petit pack des infos pour que ce soit plus propre
        var info = {
            method: 'POST',
            url: 'http://localhost/dom-angular/visiteur/api/pages/inscriptions/inscription_mmi.php',
            data: {
                prenom: user.prenom,
                nom: user.nom,
                identifiant : user.identifiant,
                psw : user.psw,
                email : user.email
            }
        };


        // on verifie les infos en cours de route
        console.log("PRET POUR ENVOI: " + info.data.prenom + "," + info.data.nom +"," + info.data.identifiant + "," + info.data.psw +"," + info.data.email);

        // Ensuite viens le moment d'envoyer nos infos avec la method http
        $http(info).success(function(data, status, headers, config){
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("PHP SAYS: " + data);
            window.location.href = '#/';
            alert('Votre inscription a bien été enregistré. Vous êtes en attente d\'approbation');
        }).error(function(data, status, headers, config){
            // si jamais ca merde sur l'envoi
            console.log("Erreur: "+data+status);
        });


    };
});

app.controller('InscrPedagController', function($scope, $http) {
    $scope.choix = "Pédagogie";

    $scope.inscription = function(user){

        // Si on clique on déclenche forcement le debut de la fonction, donc
        console.log("CLICKED");

        // Je recupere les infos envoyer avec l'envoie du formullaire * ng-submit="connectUser(user)" *
        // on peut renomer si besoin *function(user)* par *function(mesInfosRecu)* sans soucis
        // On fait un petit pack des infos pour que ce soit plus propre
        var info = {
            method: 'POST',
            url: 'http://localhost/dom-angular/visiteur/api/pages/inscriptions/inscription_mmi.php',
            data: {
                prenom: user.prenom,
                nom: user.nom,
                identifiant : user.identifiant,
                psw : user.psw,
                email : user.email
            }
        };


        // on verifie les infos en cours de route
        console.log("PRET POUR ENVOI: " + info.data.prenom + "," + info.data.nom +"," + info.data.identifiant + "," + info.data.psw +"," + info.data.email);

        // Ensuite viens le moment d'envoyer nos infos avec la method http
        $http(info).success(function(data, status, headers, config){
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("PHP SAYS: " + data);
            window.location.href = '#/';
            alert('Votre inscription a bien été enregistré. Vous êtes en attente d\'approbation');
        }).error(function(data, status, headers, config){
            // si jamais ca merde sur l'envoi
            console.log("Erreur: "+data+status);
        });


    };
});