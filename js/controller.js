app.controller('MainCtrl', function($scope) {
		$scope.reverse = false;
		$scope.maColonne='id';
		$scope.tris = [];
		$scope.tris['id']= false;
		$scope.tris['name']=false;

		
		$scope.donnees = [{id:'E746549E',name:'aaa'},
			{id:'E128949G',name:'bbb'},
			{id:'E386549J',name:'zzz'},
			{id:'E499549L',name:'yay'},
			{id:'E129949L',name:'ybb'},
			{id:'E183549K',name:'zba'},
			{id:'E128549E',name:'yyy'}];

			$scope.reverseOrder = function(col) {
				$scope.maColonne = col;
				$scope.tris[col] = !$scope.tris[col];
				$scope.reverse = $scope.tris[col];

			};

		});