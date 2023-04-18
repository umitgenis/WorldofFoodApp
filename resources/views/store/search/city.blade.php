@extends('store.layouts.store')

@section('content')
    <!-- <section> begin Restaurant Kampanya Bitimi ============================-->
    <section class="py-0">

        <div class="container">

            <div class="row h-100 gx-2 mt-8">
                <div class="row h-100">
                    <div class="col-lg-7 mx-auto text-center mb-2">
                        <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3 text-gradient">Don't miss the CAMPAINGNS</h5>
                    </div>
                </div>
                @foreach(\App\Models\Restaurant::inRandomOrder()->limit(4)->get() as $key => $value)
                    <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                        <div class="card card-span h-100">
                            <div class="position-relative">
                                <img class="img-fluid rounded-3 w-75"
                                     @php
                                         $logo = ['store_assets/img/gallery/kuakata-logo.png',
                                                   'store_assets/img/gallery/donuts-hut-logo.png',
                                                   'store_assets/img/gallery/donut-hut-logo.png',
                                                   'store_assets/img/gallery/food-world-logo.png',
                                                   'store_assets/img/gallery/pizzahub-logo.png',
                                                   'store_assets/img/gallery/ruby-tuesday-logo.png',
                                                   'store_assets/img/gallery/taco-bell-logo.png',
                                                   ];
                                     @endphp
                                     src="{{asset($logo[rand(0,6)])}}" alt="logo"/>
{{--                                     src="{{asset('store_assets/img/gallery/kuakata-logo.png')}}" alt="..." />--}}
                                <div class="card-actions">
                                    <div class="badge badge-foodwagon bg-dark-gradient p-4">
                                        <div class="d-flex flex-center" style="max-width: 0.4vi; max-height: 0.4vi">
                                            <div class="text-white fs-7">{{5*mt_rand(1,4)}}</div>
                                            <div class="d-block text-white fs-0">% <br />
                                                <div class="fw-normal fs-0 mt-1 ms-1">Off</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <h5 class="fw-bold text-1000 text-truncate">{{$value['name']}}</h5><span class="badge bg-soft-danger py-2 px-3"><span class="fs-1 text-danger">{{mt_rand(1,5)}} days Remaining</span></span>
                            </div><a class="stretched-link" href="#"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <section id="testimonial" class="pt-2 pb-5">
        <div class="container">
{{--            <div class="row h-100">--}}
{{--                <div class="col-lg-7 mx-auto text-center mb-6">--}}
{{--                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row gx-2">
                @foreach($restaurants as $restaurant)
                    <div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5">
                        <div class="card card-span h-100 text-white rounded-3">
                            <img class="img-fluid rounded-3 h-100"
                                 @php
                                     $imgProducts = ['store_assets/img/gallery/ruby-tuesday.png',
                                               'store_assets/img/gallery/kuakata.png',
                                               'store_assets/img/gallery/pizza-hub.png',
                                               'store_assets/img/gallery/food-world.png',
                                               'store_assets/img/gallery/donuts-hut.png',
                                               'store_assets/img/gallery/red-square.png',
                                               'store_assets/img/gallery/taco-bell.png',
                                               ];
                                 @endphp
                                 src="{{asset($imgProducts[rand(0,6)])}}" alt="product photo"/>
{{--                                 src="{{asset('store_assets/img/gallery/kuakata.png')}}" alt="..." />--}}
                            <div class="card-img-overlay ps-0">
                            <span class="badge bg-danger p-2 ms-3">
                                <i class="fas fa-tag me-2 fs-0"></i>
                                <span class="fs-0">{{5*mt_rand(1,4)}}% off</span>
                            </span>
                                <span class="badge bg-primary ms-2 me-1 p-2">
                                <i class="fas fa-clock me-1 fs-0"></i>
                                <span class="fs-0">Fast</span>
                            </span>
                            </div>
                            <div class="card-body ps-0">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="img-fluid"
                                         @php
                                             $logo = ['store_assets/img/gallery/kuakata-logo.png',
                                                       'store_assets/img/gallery/donuts-hut-logo.png',
                                                       'store_assets/img/gallery/donut-hut-logo.png',
                                                       'store_assets/img/gallery/food-world-logo.png',
                                                       'store_assets/img/gallery/pizzahub-logo.png',
                                                       'store_assets/img/gallery/ruby-tuesday-logo.png',
                                                       'store_assets/img/gallery/taco-bell-logo.png',
                                                       ];
                                         @endphp
                                         src="{{asset($logo[rand(0,6)])}}" alt="logo"/>
{{--                                         src="{{asset('store_assets/img/gallery/kuakata-logo.png')}}" alt="" />--}}
                                    <div class="flex-1 ms-3">
                                        <h5 class="mb-0 fw-bold text-1000">{{$restaurant['name']}}</h5>
                                        <span class="text-primary fs--1 me-1"><i class="fas fa-star"></i></span>
                                        <span class="mb-0 text-primary">{{rand(1,50)}}</span>
                                    </div>
                                </div>
                                <span class="badge bg-soft-danger p-2"><span class="fw-bold fs-1 text-danger">{{$restaurant['closed'] ==1 ? "Opens Tomorrows" : "Open"  }}</span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$restaurants->links()}}
{{--                <div class="col-12 d-flex justify-content-center mt-5">--}}
{{--                    <a class="btn btn-lg btn-primary" href="#">View All <i class="fas fa-chevron-right ms-2"> </i></a>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <section id="testimonial" class="pt-2 pb-5">
        <div class="container">
            {{--            <div class="row h-100">--}}
            {{--                <div class="col-lg-7 mx-auto text-center mb-6">--}}
            {{--                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row gx-2">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5">
                        <div class="card card-span h-100 text-white rounded-3">
                            <img class="img-fluid rounded-3 h-100" src="{{asset('store_assets/img/gallery/kuakata.png')}}" alt="..." />
                            <div class="card-img-overlay ps-0">
                            <span class="badge bg-danger p-2 ms-3">
                                <i class="fas fa-tag me-2 fs-0"></i>
                                <span class="fs-0">{{5*mt_rand(1,4)}}% off</span>
                            </span>
                                <span class="badge bg-primary ms-2 me-1 p-2">
                                <i class="fas fa-clock me-1 fs-0"></i>
                                <span class="fs-0">Fast</span>
                            </span>
                            </div>
                            <div class="card-body ps-0">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="img-fluid" src="{{asset('store_assets/img/gallery/kuakata-logo.png')}}" alt="" />
                                    <div class="flex-1 ms-3">
                                        <h5 class="mb-0 fw-bold text-1000">{{$product['name']}}</h5>
                                        <span class="text-primary fs--1 me-1"><i class="fas fa-star"></i></span>
                                        <span class="mb-0 text-primary">{{rand(1,50)}}</span>
                                    </div>
                                </div>
{{--                                <span class="badge bg-soft-danger p-2"><span class="fw-bold fs-1 text-danger">{{$restaurant['closed'] ==1 ? "Opens Tomorrows" : "Open"  }}</span></span>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$products->links()}}
                {{--                <div class="col-12 d-flex justify-content-center mt-5">--}}
                {{--                    <a class="btn btn-lg btn-primary" href="#">View All <i class="fas fa-chevron-right ms-2"> </i></a>--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>
@endsection
