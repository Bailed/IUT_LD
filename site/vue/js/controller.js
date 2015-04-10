app.controller('MainCtrl', function($scope, $http) {

	$scope.renvoi = ["","",""];

		$http.get('ressource/bibli.json')
       .then(function(res){
          $scope.donnees = res.data; 
          	$scope.test = function(type,uri,label) {
       		$scope.renvoi = [type,uri,label];
       		console.log($scope.renvoi);
       	}

                  
        });


       


			$scope.reverseOrder = function(col) {
				$scope.maColonne = col;
				$scope.tris[col] = !$scope.tris[col];
				$scope.reverse = $scope.tris[col];

			};

		});