'use strict';

var rpgApp = angular.module('rpgApp', [ 'ngRoute', 'restangular',
	'ui.bootstrap', 'infinite-scroll', ]);

rpgApp.config([ '$routeProvider', function($routeProvider) {
    $routeProvider.when('/index', {
	templateUrl : 'perfil/index.html',
	controller : 'perfilIndexCtrl'
    }).when('/post', {
	templateUrl : 'perfil/post.html',
	controller : 'perfilPostCtrl'
    }).when('/list', {
	templateUrl : 'perfil/list.html',
	controller : 'perfilListCtrl'
    }).otherwise({
	redirectTo : '/index'
    });
} ]);

rpgApp.config([ 'RestangularProvider', function(RestangularProvider) {
    RestangularProvider.setBaseUrl("http://localhost/rpg/");
    RestangularProvider.setRestangularFields({
	selfLink : "_links.self.href"
    });
    RestangularProvider.setDefaultHeaders({
	'Content-Type' : 'application/json'
    });
} ]);