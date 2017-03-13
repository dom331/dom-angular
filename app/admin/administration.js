app.controller('AdminController', function($scope, $http) {

    $http.get("http://localhost/dom-angular/api/pages/membres/listemembres.php")
        .then(function success(response) {
            $scope.membres = response.data;
            console.log("liste_membre " + response.data);
        }, function MyError(response) {
            console.log("erreur ajax" + response.data);
        });

    $http.get("http://localhost/dom-angular/api/pages/evenements/evenements.php")
        .then(function success(response){
            $scope.events = response.data;
            console.log("liste_evenements "+response.data);
        }, function MyError(response) {
            console.log("erreur ajax"+response.data);
        });
});