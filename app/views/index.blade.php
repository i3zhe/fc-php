<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Laravel 4 E-Commerce</title>
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("css/bootstrap.3.0.3.min.css") }}"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("css/bootstrap.theme.3.0.3.min.css") }}"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("css/shared.css") }}"
    />
    <script
      type="text/javascript"
      src="{{ asset("js/angularjs.1.2.4.min.js") }}"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset("js/angularjs.cookies.1.2.4.min.js") }}"
    ></script>    
  </head>
  <body ng-controller="main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            Laravel 4 E-Commerce
          </h1>
        </div>
      </div>
      <div style="height:100px">
        <a href="/oauth/twitter">Sign in with Twitter</a> <br>
        <a href="/oauth/github">Sign in with Github</a>
      </div>
      <div class="row">
        <div class="col-md-8" ng-controller="products">
          <h2>
            Products
          </h2>
          <div class="categories btn-group">
            <button
              type="button"
              class="category btn btn-default active"
              ng-click="products.setCategory(null)"
              ng-class="{ 'active' : products.category == null }"
            >
              All
            </button>
            <button
              type="button"
              class="category btn btn-default"
              ng-repeat="category in products.categories"
              ng-click="products.setCategory(category)"
              ng-class="{ 'active' : products.category.id == category.id }"
            >
              @{{ category.name }}
            </button>
          </div>
          <div class="products">
            <div
              class="product media"
              ng-repeat="product in products.products | filter : products.filterByCategory"
            >
            <div
              class="product media"
              ng-repeat="product in products.products"
            >
              <button
                type="button"
                class="pull-left btn btn-default"
              >
                Add to basket
              </button>
              <div class="media-body">
                <h4 class="media-heading">@{{ product.name }}</h4>
                <p>
                  Price: @{{ product.price }}, Stock: @{{ product.stock }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" ng-controller="basket">
          <h2>
            Basket
          </h2>
          <form class="basket">
            <table class="table">
              <tr class="product">
                <td class="name">
                  Product 1
                </td>
                <td class="quantity">
                  <input
                    class="quantity form-control col-md-2"
                    type="number"
                    value="1"
                  />
                </td>
                <td class="product">
                  9.99
                </td>
                <td class="product">
                  <a
                    class="remove glyphicon glyphicon-remove"
                    href="#"
                  ></a>
                </td>
              </tr>
              <tr class="product">
                <td class="name">
                  Product 2
                </td>
                <td class="quantity">
                  <input
                    class="quantity form-control col-md-2"
                    type="number"
                    value="1"
                  />
                </td>
                <td class="product">
                  9.99
                </td>
                <td class="product">
                  <a
                    class="remove glyphicon glyphicon-remove"
                    href="#"
                  ></a>
                </td>
              </tr>
              <tr class="product">
                <td class="name">
                  Product 3
                </td>
                <td class="quantity">
                  <input
                    class="quantity form-control col-md-2"
                    type="number"
                    value="1"
                  />
                </td>
                <td class="product">
                  9.99
                </td>
                <td class="product">
                  <a
                    class="remove glyphicon glyphicon-remove"
                    href="#"
                  ></a>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <script
      type="text/javascript"
      src="{{ asset("js/shared.js") }}"
    ></script>
  </body>
</html>