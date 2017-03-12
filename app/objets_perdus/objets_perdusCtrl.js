function gup( name, url ) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    return results == null ? null : results[1];
}

app.controller('ObjPerduController', function($scope, $http) {


    if (gup('id')) {
        var infoss = gup('id');
        var eventType = {
            method: 'POST',
            url: 'http://localhost/dom-angular/api/pages/objets_perdus/article_objets_perdus.php',
            data: {
                id: infoss
            }
        };

        $http(eventType).success(function (data, status, headers, config) {
            console.log(status);
            console.log("ENVOYE A PHP: OUI");
            console.log("article_objets_type_says: " + data);
            $scope.article = data;
            // window.location.href = '../pages/actualites';
        }).error(function (data, status, headers, config) {
            // si jamais ca merde sur l'envoi
            console.log("Erreur: " + data + status);
        });
    }
    
});