var app = angular.module('plunker', ['ngTagsInput']);

app.controller('MainCtrl', function($scope, $http) {
  $scope.tags = [
    { "name": "Brazil", flag: "http://mbenford.github.io/ngTagsInput/images/flags/Brazil.png" },
    { "name": "Italy", flag: "http://mbenford.github.io/ngTagsInput/images/flags/Italy.png" },
    { "name": "Spain", flag: "http://mbenford.github.io/ngTagsInput/images/flags/Spain.png" },
    { "name": "Germany", flag: "http://mbenford.github.io/ngTagsInput/images/flags/Germany.png" },
  ];
});
