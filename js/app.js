var app = angular.module('myApp', ['ui.router','blockUI']);

/**
 * Filesize Filter
 * @Param length, default is 0
 * @return string
 */
app.filter('Filesize', function () {
		return function (size) {
			if (isNaN(size))
				size = 0;

			if (size < 1024)
				return size + ' Bytes';

			size /= 1024;

			if (size < 1024)
				return size.toFixed(2) + ' Kb';

			size /= 1024;

			if (size < 1024)
				return size.toFixed(2) + ' Mb';

			size /= 1024;

			if (size < 1024)
				return size.toFixed(2) + ' Gb';

			size /= 1024;

			return size.toFixed(2) + ' Tb';
		};
	});

/**
 * Usage
 * var myFile = 5678;
 *
 * {{myText|filesize}}
 *
 * Output
 * "5.54 Kb"
 *
 */
 app.filter('myDateFilter', function($filter){
    return function(input) {
        var convertedDate = new Date(input * 1000);
        return $filter('date')(convertedDate,'dd/MM/yyyy');
    }
});
 
app.filter('byDevice', function() {
  return function(names, search) {
    if(angular.isDefined(search)) {
      var results = [];
      var i;
      var searchVal = search.toLowerCase();
      for(i = 0; i < names.length; i++){
        var name = names[i].name.toLowerCase();
        var codename = names[i].codename.toLowerCase();
        if(name.indexOf(searchVal) >=0 || codename.indexOf(searchVal) >=0){
          results.push(names[i]);
        }
      }
      return results;
    } else {
      return names;
    }
  };
});

app.config(['$stateProvider', '$urlRouterProvider','$httpProvider',
 function ($stateProvider, $urlRouterProvider, $httpProvider) {
	//Enable cross domain calls
    $httpProvider.defaults.useXDomain = true;

    //Remove the header used to identify ajax call  that would prevent CORS from working
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
	$httpProvider.defaults.headers.common["Accept"] = "application/json";
	$httpProvider.defaults.headers.common["Content-Type"] = "application/json"; 

    $urlRouterProvider.otherwise('/');
    $stateProvider
    .state('home', {
        url: '/',
		cache: false,
        templateUrl: 'templates/home.html',
        controller: 'HomeCtrl'
    })

    .state('device', {
        url: '/device',
		cache: false,
        templateUrl: 'templates/device.html',
        controller: 'DeviceCtrl'
    });
}]);


app.controller('HomeCtrl', ['$scope','$rootScope','$http','$state','blockUI',
 function ($scope, $rootScope, $http, $state, blockUI) {
     blockUI.start();
    /* Get device list */
    $http({
            method: 'GET',
            url: 'https://raw.githubusercontent.com/crdroid-devices/crdroid_official_devices/crdroid.net-7.1/devices.json'
        }).then(function (response){
            $scope.devices = response.data;
            //console.log($scope.devices);
             blockUI.stop();
        },function (error){
            //console.log("No data found");
			blockUI.stop();
        });

    /*get Device details */
    $scope.get_device = function(codename,folder_id){
        $rootScope.codename = codename;
         $state.go('device');
    }
    
}]);

app.controller('DeviceCtrl', ['$scope','$rootScope','$http','$filter','blockUI','$sce',
 function ($scope, $rootScope, $http, $filter, blockUI,$sce) {
    blockUI.start();
	
    /* Get device list */
    $http({
            method: 'GET',
            url: 'https://raw.githubusercontent.com/crdroid-devices/crdroid_official_devices/crdroid.net-7.1/devices.json'
        }).then(function (response){
            $scope.devices = response.data;


            /*Get device maintainer info */
            var device_list =  JSON.parse(JSON.stringify($scope.devices));
            device_maintainer = $filter('filter')(device_list, {codename: $rootScope.codename })[0];
            $scope.device_maintainer = device_maintainer;
            //console.log($scope.device_maintainer);
            $scope.folder_id = $scope.device_maintainer.afh_folder_id;
			//var cors_api_host = 'http://thingproxy.freeboard.io/fetch/'; 

            /*Get device download folder details from AFH */
            $http({
                method: 'GET',
                headers: {
                    "x-requested-with": "XMLHttpRequest",
                    "Referer": "https://androidfilehost.com/&fid="+$scope.folder_id,
                    "Origin": "https://androidfilehost.com",
                    "X-MOD-SBB-CTYPE": "xhr"
                },
                url: 'https://crdroid.net/cors/https://androidfilehost.com/api/?action=folder&flid='+$scope.folder_id+'&uid=24369303960687706'
                }).then(function (response){
                    $scope.afh_details = response.data.DATA.files;
                    console.log(response);
                },function (error){
                    console.log("No data found");
					blockUI.stop();
                }); 
                blockUI.stop();
        },function (error){
            //console.log("No data found");
        }); 

}]);
