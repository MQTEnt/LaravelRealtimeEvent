var app = angular.module('productApp', [], function($interpolateProvider) {
	//Using <% %> instead {{}} (2 way binding)
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
//Create controller
app.controller('productCtrl',function($scope, $http){
	$scope.product = {};
	$scope.cates = {};
	var selectedProductID;
	$http.get('/product/data')
		.success(function(data){
			$scope.products=data.products;
			$scope.cates=data.cates;
		});
	$scope.saveProduct = function(){
		if($('#btnControl').text()=='Add')
		{
			//Case: Create product
			var data = {
				'name': $scope.product.name,
				'desc': $scope.product.desc,
				'price': $scope.product.price,
				'cate_id': $scope.selectedCate.id
			};
			data = $.param(data);
			$http({
				method: 'POST',
				url: '/product',
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(dataResponse){
				alert(dataResponse);
				//Reload view table product
				$http.get('/product/data')
					.success(function(data){
						$scope.products=data.products;
					});
				//Close modal
				$('#product-modal').modal('toggle');
			});
		}
		else
		{
			//Case: Update product
			var data = {
				'name': $scope.product.name,
				'desc': $scope.product.desc,
				'price': $scope.product.price,
				'cate_id': $scope.selectedCate.id
			};
			data = $.param(data);
			console.log(data);
			$http({
				method: 'POST',
				url: '/product/'+selectedProductID,
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(dataResponse){
				alert(dataResponse);
				//Reload view table product
				$http.get('/product/data')
					.success(function(data){
						$scope.products=data.products;
					});
				//Reset input text
				$scope.product = {};
				$scope.selectedCate = {};
				//Close modal
				$('#product-modal').modal('toggle');
			});
		}
	};
	$scope.editProduct = function(id){
		selectedProductID = id;
		$http.get('/product/'+id+'/edit')
			.success(function(data){
				$('#btnControl').text('Update');
				$scope.product.name = data.product.name;
				$scope.product.desc = data.product.desc;
				$scope.product.price = data.product.price;
				angular.forEach($scope.cates, function(value, key){
					if(value.id==data.product.cate_id)
					{
						$scope.selectedCate = value;
						return;
					}
				});
			});
	}
});