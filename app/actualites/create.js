app.directive("fileInput", function ($parse) {
    return{
        link: function ($scope, element, attrs) {
            element.on("change", function (event) {
                var files = event.target.files;
                console.log(files[0].name);
                $parse(attrs.fileInput).assign($scope, element[0].files);
                $scope.$apply();
            })
        }
    }
});


app.controller('AjoutActuController', function ($scope, $http) {
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

    $scope.uploadFile = function() {
        var form_data = new FormData();
        angular.forEach($scope.files, function (file) {
            form_data.append('file', file);
        });
        $http.post('http://localhost/dom-angular/api/pages/actualites/add_actualite.php', form_data,
            {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            }).success(function (response) {
            console.log(response);
        });




        // $scope.AjoutActu = function (actu) {
        //
        //     // Si on clique on déclenche forcement le debut de la fonction, donc
        //     console.log("CLICKED");
        //     var form_data = new FormData();
        //     angular.forEach($scope.files, function (file) {
        //         form_data.append('file', file);
        //     });
        //
        //     // Je recupere les infos envoyer avec l'envoie du formullaire * ng-submit="connectUser(user)" *
        //     // on peut renomer si besoin *function(user)* par *function(mesInfosRecu)* sans soucis
        //     // On fait un petit pack des infos pour que ce soit plus propre
        //     var newActu = {
        //         method: 'POST',
        //         url: 'http://localhost/dom-angular/api/pages/actualites/add_actualite.php',
        //         data: {
        //             titre: actu.titre,
        //             desc: actu.desc,
        //             responsables: actu.responsables,
        //             // image: form_data,
        //             urgent: actu.urgent
        //         }
        //     };
        //
        //
        //     // on verifie les infos en cours de route
        //     console.log("PRET POUR ENVOI: " + newActu.data.titre + "," + newActu.data.desc + "," + newActu.data.responsables + "," + newActu.data.image + "," + newActu.data.urgent);
        //     //
        //     // Ensuite viens le moment d'envoyer nos infos avec la method http
        //     $http(newActu).success(function (data, status, headers, config) {
        //         console.log(status);
        //         console.log("ENVOYE A PHP: OUI");
        //         console.log("PHP SAYS: " + data);
        //         // window.location.href = '#/';
        //         // alert('Votre inscription a bien été enregistré. Vous êtes en attente d\'approbation');
        //     }).error(function (data, status, headers, config) {
        //         // si jamais ca merde sur l'envoi
        //         console.log("Erreur: " + data + status);
        //     });
        // };
    }
    });

    

