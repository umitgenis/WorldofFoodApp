@extends('store.layouts.store')

@section('content')

    <!-- <section> begin Reataurant Head ============================-->
    <section class="pt-0 pb-0">

        <div class="container-fluid">
            <div class="row ">
                <div class="col-12">
                    <div class="card card-span mt-7 shadow-lg">
                        <div class="card-body py-0">
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img
                                        class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0"
                                        src="{{asset('store_assets/img/gallery/pizza.png')}}" alt="..."/></div>
                                <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                    <img class="img-fluid vh-25 rounded-3 mb-3 mt-3 "
{{--                                         src="{{asset('store_assets/img/gallery/kuakata-logo.png')}}" alt="..."--}}
                                         src="{{asset("images/restaurants/".$restaurant['image_path'])}}" alt="{{"/images/restaurants/".$restaurant['image_path']}}"
                                    />
                                    <h1 class="card-title mt-xl-5 mb-3"><span
                                            class="text-primary">Welcome to </span>{{$restaurant['name']}} </h1>
                                    <p class="fs-1">Taste our delicious products. Try it with the best deals.</p>
                                    <div>
                                        <span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="text-primary">{{$restaurant['city']}}</span>
                                    </div>
                                    <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" href="#!">PROCEED
                                            TO ORDER<i class="fas fa-chevron-right ms-2"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->
    </section>
    <!-- <section> close ============================-->

    <!-- <section> begin Reataurant Head ============================-->
    <section class="pt-3 pb-0">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mt-3 mb-3">
                    <h5 class=" fw-bold fs-3 fs-lg-5 lh-sm text-gradient">Our Products</h5>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @foreach($categories as $key => $category)
                        <h5 class="border-bottom">{{$category['name']}}</h5>
                    <div class="">
                        @foreach($category->products->chunk(6) as $products)
                            <div class="row gx-3 h-100 align-items-center">
                                @foreach($products as $item => $product)
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-3">
                                            <img class="img-fluid rounded-3 h-100"
{{--                                                 src="{{asset('store_assets/img/gallery/cheese-burger.png')}}"--}}
                                                 src="{{asset("/images/products/".$product['image_path'])}}"
                                                 alt="product image"/>
                                            <div class="card-body ps-0">
                                                <h5 class="fw-bold text-1000 text-truncate mb-1 text-capitalize">{{$product['name']}}</h5>
                                                <div>
                                                    <span class="text-warning me-2"><i
                                                            class="fas fa-map-marker-alt"></i></span>
                                                    <span class="text-primary">{{$restaurant['city']}}</span>
                                                </div>
                                                <span
                                                    class="text-1000 fw-bold">${{$product['price']}}</span>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-lg btn-danger" href="#!" role="button">Order
                                                now</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
{{--    <h3>--}}
{{--        @foreach($categories as $key => $category)--}}
{{--            <h3> {{$category['name']}}</h3>--}}
{{--            @foreach($category->products as $item => $product)--}}
{{--                --}}{{--                @dd($product)--}}
{{--                <h4>{{$product['name']}}</h4> <h5>{{$product['category_id']}}</h5>--}}
{{--            @endforeach--}}

{{--        @endforeach--}}
{{--    </h3>--}}

@endsection
