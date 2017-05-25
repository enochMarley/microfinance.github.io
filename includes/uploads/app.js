var app = angular.module("dropNPick", ["ngRoute"]);

app.config(function($routeProvider){
  $routeProvider
  .when('/',{
    templateUrl: 'includes/pages/home.html',
    controller: 'homeCtrl'
  }).when('/home',{
    templateUrl: 'includes/pages/home.html',
    controller: 'homeCtrl'
  }).when('/dropFile',{
    templateUrl: 'includes/pages/drop.html',
    controller: 'homeCtrl'
  }).when('/pickFile',{
    templateUrl: 'includes/pages/pick.html',
    controller: 'homeCtrl'
  }).when('/initGroup',{
    templateUrl: 'includes/pages/initGroup.html',
    controller: 'homeCtrl'
  }).when('/pickGroup',{
    templateUrl: 'includes/pages/pickGroup.html',
    controller: 'homeCtrl'
  });
});
