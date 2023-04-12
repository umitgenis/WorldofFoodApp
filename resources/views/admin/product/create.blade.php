@php use App\Helper\cityList; @endphp
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
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Product Add</h4>
                            <p class="category">You can create a product here.</p>
                        </div>
                        <div class="card-content">
                            <form
                                enctype="multipart/form-data"
                                action="{{route('admin.product.store',['restaurant_id'=>$restaurant_id,'category_id'=>$category_id])}}"
                                method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating @if(!old('name')) is-empty @endif">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   required autocomplete="name" value="{{old('name')}}" autofocus>
                                            <span class="material-input"></span></div>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating @if(!old('sku_code')) is-empty @endif">
                                            <label class="control-label">SKU Code</label>
                                            <input type="text" name="sku_code" size="13" class="form-control"
                                                    required autocomplete="sku_code" value="{{old('sku_code')}}" autofocus>
                                            <span class="material-input"></span></div>

                                        @error('sku_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating @if(!old('price')) is-empty @endif">
                                            <label class="control-label">Price</label>
                                            <input type="text" name="price" class="form-control"
                                                   required autocomplete="price" value="{{old('price')}}" autofocus>
                                            <span class="material-input"></span></div>

                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="image" class="form-control" style="opacity: 1; position: relative; padding-left: 50px"
                                                   required autocomplete="image" autofocus>
                                            <span class="material-input"></span></div>

                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Product Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
