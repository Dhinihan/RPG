"use strict";
rpgApp.controller('perfilIndexCtrl', [ '$scope', '$rootScope' , function($scope, $rootScope) {
    $scope.navbarCollapsed = true;
    $rootScope.index = "active";
    $rootScope.post  = "inactive";
    $rootScope.list  = "inactive";
} ]);

rpgApp.controller('perfilPostCtrl', [ '$scope', '$rootScope' , 'Perfil',  function($scope, $rootScope, Perfil) {
    $scope.navbarCollapsed = true;
    $scope.success = false;
    $scope.perfil = {};
    $rootScope.index = "inactive";
    $rootScope.post  = "active";
    $rootScope.list  = "inactive";
    
    $scope.criar = function(perfil) {
	
	Perfil.post(perfil);
	$scope.perfil = {};
	$scope.success = true;
    };
    
} ]);

rpgApp.controller('perfilListCtrl', [ '$scope', '$rootScope', 'Perfil' , function($scope, $rootScope, Perfil) {
    $scope.navbarCollapsed = true;
    $scope.perfis = Perfil.getList().$object;
    console.log("teste");
    $rootScope.index =  "inactive";
    $rootScope.post  =  "inactive";
    $rootScope.list  =  "active";
    
    
    
    
} ]);