@extends('admin.master')
@section('body.content')
    <div id="app" ng-app='productApp' ng-controller='productCtrl'>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-sm-12">
                <button id="btnAdd" class="btn btn-success" data-toggle="modal" data-target="#product-modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add New</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Cate ID</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr ng-repeat='product in products'>
                                <td><% product.id %></td>
                                <td><% product.name %></td>
                                <td><% product.desc %></td>
                                <td><% product.price %></td>
                                <td><% product.cate_id  %></td>
                                <td><a class="btnEdit" href="#" data-toggle="modal" data-target="#product-modal"><span class="glyphicon glyphicon-glyphicon glyphicon-edit" aria-hidden="true" ng-click="editProduct(product.id)"></a></span></td>
                                <td><a class="btnDelete" href="#"><span class="glyphicon glyphicon-glyphicon glyphicon-trash" aria-hidden="true"></a></span></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div id="product-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Product</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Name: </label>
                                <div class="col-sm-6"><input type="text" name="name" class="form-control" ng-model="product.name"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Description: </label>
                                <div class="col-sm-6"><input type="text" name="desc" class="form-control" ng-model="product.desc"></div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-sm-3">Price: </label>
                                <div class="col-sm-6"><input type="text" name="desc" class="form-control" ng-model="product.price"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Category: </label>
                                <div class="col-sm-6">
                                    <select name="cate_id" id="" class="form-control" ng-model="selectedCate" ng-options="cate.name for cate in cates">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 col-sm-offset-6">
                                    <button id="btnControl" class="btn btn-success pull-right" ng-click="saveProduct()">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End #app -->
@stop
@section('script')
    <script src="{{asset('js/angular.min.js')}}"></script>
    <script src="{{asset('js/app-product.js')}}"></script>
@stop