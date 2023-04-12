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
                        <a href="{{route('admin.restaurant.create')}}" class="btn btn-primary">New Restaurant <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Restaurants</h4>
                                <p class="category">Here you can find the list of added restaurants.</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($restaurants as $restaurant)
                                        <tr class="h5">
                                            <td> <i class=" {{$restaurant['closed'] ==1 ? 'fa fa-lock' : 'fa fa-unlock' }} " aria-hidden="true"></i>  {{$restaurant['name']}}</td>
                                            <td><img src="{{asset("/images/restaurants/".$restaurant['image_path'])}}" style="max-height: 4vw; width: auto" alt="product image"></td>
                                            <td >
                                                <a class="btn @if($restaurant['closed'] ==1) btn-danger @else btn-primary @endif btn-sm"  href="{{route('admin.restaurant.status',[$restaurant['id']])}}">
                                                    {{$restaurant['closed'] ==1 ? "Closed" : "Open"  }}
                                                </a>
                                            </td>
                                            <td><a class="btn btn-primary btn-sm" href="{{route('admin.category.index',[$restaurant['id']])}}">Category</a></td>
                                            <td><a class="btn btn-primary btn-sm" href="{{route('admin.restaurant.edit',[$restaurant['id']])}}">Edit</a></td>
                                            <td><a class="btn btn-danger btn-sm" href="{{route('admin.restaurant.delete',[$restaurant['id']])}}">Delete</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$restaurants->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
