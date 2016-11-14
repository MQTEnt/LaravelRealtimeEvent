@extends('admin.master')
@section('body.content')
    <div class="row">
        <div class="col-sm-12">
            <button id="btnAdd" class="btn btn-success" data-toggle="modal" data-target="#cate-modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add New</button>
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cates as $cate)
                        <tr>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->name}}</td>
                            <td>{{$cate->desc}}</td>
                            <td><a class="btnEdit" href="#" data-toggle="modal" data-target="#cate-modal"><span class="glyphicon glyphicon-glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                            <td><a class="btnDelete" href="#"><span class="glyphicon glyphicon-glyphicon glyphicon-trash" aria-hidden="true"></a></span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div id="cate-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Category</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('cate.store')}}" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Name: </label>
                            <div class="col-sm-6"><input type="text" name="name" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Description: </label>
                            <div class="col-sm-6"><input type="text" name="desc" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-sm-offset-6">
                                <button id="btnControl" class="btn btn-success pull-right">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{asset('js/app-cate.js')}}"></script>
@stop