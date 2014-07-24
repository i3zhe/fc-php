var app = angular.module("app", ["ngCookies"]);
app.controller("main", function($scope) {
  console.log("main.init");
  this.shared = "hello world";
  $scope.main = this;
});
app.controller("products", function($scope) {
  console.log("products.init:", $scope.main.shared);
  $scope.products = this;
});
app.controller("basket", function($scope) {
  console.log("basket.init:", $scope.main.shared);
  $scope.basket = this;
});

app.factory("CategoryService", function($http) {
  return {
    "getCategories": function() {
      return $http.get("/category/index");
    }
  };
});
app.factory("ProductService", function($http) {
  return {
    "getProducts": function() {
      return $http.get("/product/index");
    }
  };
});
app.controller("products", function(
  $scope,
  CategoryService,
  ProductService
) {
  
  var self = this;
  var categories = CategoryService.getCategories();
  categories.success(function(data) {
    self.categories = data;
  });
  var products = ProductService.getProducts();
  products.success(function(data) {
    self.products = data;
  });
  $scope.products = this;
});