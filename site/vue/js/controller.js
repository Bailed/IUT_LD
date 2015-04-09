app.controller('MainCtrl', function($scope, $http) {
		


		$http.get('ressource/bibli.json')
       .then(function(res){
          $scope.donnees = res.data;                
        });


			$scope.reverseOrder = function(col) {
				$scope.maColonne = col;
				$scope.tris[col] = !$scope.tris[col];
				$scope.reverse = $scope.tris[col];

			};

		});