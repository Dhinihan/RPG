"use strict";
rpgApp.controller('perfilIndexCtrl', [ '$scope', '$rootScope' , function($scope, $rootScope) {
    $scope.navbarCollapsed = true;
    $rootScope.index = "active";
    $rootScope.post  = "inactive";
    $rootScope.list  = "inactive";
} ]);

rpgApp.controller('perfilPostCtrl', [ '$scope', '$rootScope' , function($scope, $rootScope) {
    $scope.navbarCollapsed = true;
    $rootScope.index = "inactive";
    $rootScope.post  = "active";
    $rootScope.list  = "inactive";
} ]);

rpgApp.controller('perfilListCtrl', [ '$scope', '$rootScope' , function($scope, $rootScope) {
    $scope.navbarCollapsed = true;
    $rootScope.index =  "inactive";
    $rootScope.post  =  "inactive";
    $rootScope.list  =  "active";
} ]);