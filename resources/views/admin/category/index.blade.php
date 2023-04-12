@extends('admin.layouts.admin')

    @section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('status'))
                            <div class="alert alert-primary" role="alert">
                                {{session('status')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('error')}}
                            </div>
                        @endif
                        <a href="{{route('admin.category.create',['restaurant_id'=>$restaurant_id])}}" class="btn btn-primary">New Category  <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Category</h4>
                                <p class="category">Here you can find the list of added categories.</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="h5">
                                            <td>{{$category['name']}}</td>
                                            <td><a class="btn btn-primary btn-sm" href="{{route('admin.product.index',[$restaurant_id,$category['id']])}}">Product</a></td>
                                            <td><a class="btn btn-primary btn-sm" href="{{route('admin.category.edit',[$category['id']])}}">Edit</a></td>
                                            <td><a class="btn btn-danger btn-sm" href="{{route('admin.category.delete',[$category['id']])}}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
