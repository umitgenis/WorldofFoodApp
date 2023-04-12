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
                        <a href="{{route('admin.product.create',['restaurant_id' => $restaurant_id,'category_id'=>$category_id])}}" class="btn btn-primary"> New Product <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Products</h4>
                                <p class="category">Here you can find the list of added products.</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>SKU Code</th>
                                        <th>Price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr class="h5">
                                            <td><img src="{{asset("/images/products/".$product['image_path'])}}" style="max-height: 8vw; width: auto" alt="product image"></td>
                                            <td>{{ucfirst($product['name'])}}</td>
                                            <td>{{$product['sku_code']}}</td>
                                            <td>{{$product['price']}} <small>TL</small></td>
                                            <td><a class="btn btn-primary btn-sm" href="{{route('admin.product.edit',[$product['id']])}}">Edit</a></td>
                                            <td><a class="btn btn-danger btn-sm" href="{{route('admin.product.delete',[$product['id']])}}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
