// On crée l'application "app" et on utilise une injection "ngRoute" pour l'url

var app = angular.module('app', ['ngRoute']);

app.config(function ($httpProvider) {
    $httpProvider.defaults.headers.common = {};
    $httpProvider.defaults.headers.post = {};
    $httpProvider.defaults.headers.put = {};
    $httpProvider.defaults.headers.patch = {};
});