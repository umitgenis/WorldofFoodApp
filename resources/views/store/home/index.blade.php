@extends('store.layouts.store')

@section('content')

    <section class="py-1 overflow-hidden bg-primary" id="home">
        <div class="container">
            <div class="row flex-center">
                @if(session('status'))
                    <div class="alert alert-primary bg-white text-primary mt-6 " role="alert">
                        {{session('status')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger bg-white text-primary mt-6" role="alert">
                        {{session('error')}}
                    </div>
                @endif
                <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0">
                    <a class="img-landing-banner" href="{{url('/')}}">
                        <img class="img-fluid" src="{{asset('store_assets/img/gallery/hero-header.png')}}"
                             alt="hero-header"/>
                    </a>
                </div>
                <div class="col-md-7 col-lg-6 pb-7 @if(!session('status') || !session('status')) pt-7 @endif text-md-start text-center">
                    <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Are you starving?</h1>
                    <h1 class="text-800 mb-5 fs-4">Within a few clicks, find meals that<br class="d-none d-xxl-block"/>are
                        accessible near you</h1>
                    <div class="card w-xxl-75">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Delivery
                                    </button>
                                    <button class="nav-link mb-3" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false"><i
                                            class="fas fa-shopping-bag me-2"></i>Pickup
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content mt-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <form action="{{route('store.search.city')}}"
                                          class="row gx-2 gy-2 align-items-center">
                                        @csrf
                                        <div class="col">
                                            <div class="input-group-icon">
                                                <input class="form-control input-box form-foodwagon-control"
                                                       name="search" id="inputDelivery" type="text"
                                                       placeholder="Search | Restaurant or Food"
                                                       style="padding-left: 1rem"/>
                                            </div>
                                        </div>

                                        <div class="input-group-icon">
                                            <i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                            <label class="visually-hidden" for="selectDelivery">City</label>
                                            <select class="form-select form-select-sm " name="citySelect"
                                                    id="selectDelivery"
                                                    style="border-radius: 0.25rem ; padding-left: 2rem;background-position: right 1rem center !important;"
                                                    aria-label="Default select example">
                                                <option selected>
                                                    Select City
                                                </option>
                                                @foreach($cityList as $city)
                                                    <option value="{{strtolower($city)}}">{{$city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-grid gap-3 col-sm-auto">
                                            <button class="btn btn-danger" type="submit">Find Food</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    <form action="{{route('store.search.city')}}"
                                          class="row gx-2 gy-2 align-items-center">
                                        @csrf
                                        <div class="col">
                                            <div class="input-group-icon">
                                                <input class="form-control input-box form-foodwagon-control"
                                                       name="search" id="inputDelivery" type="text"
                                                       placeholder="Search | Restaurant or Food"
                                                       style="padding-left: 1rem"/>
                                            </div>
                                        </div>

                                        <div class="input-group-icon">
                                            <i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                            <label class="visually-hidden" for="selectDelivery">City</label>
                                            <select class="form-select form-select-sm " name="citySelect"
                                                    id="selectDelivery"
                                                    style="border-radius: 0.25rem ; padding-left: 2rem;background-position: right 1rem center !important;"
                                                    aria-label="Default select example">
                                                <option selected>
                                                    Select City
                                                </option>
                                                @foreach($cityList as $city)
                                                    <option value="{{strtolower($city)}}">{{$city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-grid gap-3 col-sm-auto">
                                            <button class="btn btn-danger" type="submit">Find Food</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- <section>  Kampanya Bitimi ============================-->
    <section class="py-0">

        <div class="container">
            <div class="row h-100 gx-2 mt-7">
                @foreach(\App\Models\Restaurant::inRandomOrder()->limit(4)->get() as $key => $value)
                    <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                        <div class="card card-span h-100">
                            <div class="position-relative">
                                <img class="img-fluid rounded-3 w-100"
                                     src="{{asset('store_assets/img/gallery/kuakata-logo.png')}}" alt="..."/>
                                <div class="card-actions">
                                    <div class="badge badge-foodwagon bg-primary p-4">
                                        <div class="d-flex flex-between-center">
                                            <div class="text-white fs-7">{{5*mt_rand(1,4)}}</div>
                                            <div class="d-block text-white fs-2">% <br/>
                                                <div class="fw-normal fs-1 mt-2">Off</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <h5 class="fw-bold text-1000 text-truncate">{{$value['name']}}</h5>
                                <h6>
                                    <span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span>
                                    <span class="text-primary">{{$value['city']}}</span>
                                </h6>
                                <span class="badge bg-soft-danger py-2 px-3">
                                <span class="fs-1 text-danger">{{mt_rand(1,5)}} days Remaining</span>
                            </span>
                            </div>
                            <a class="stretched-link"
                               href="{{route('store.restaurant.detail',['id'=>$value['id']])}}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <!-- <section> close ============================-->

    <!-- <section> begin ============================-->
    <section class="py-0 bg-primary-gradient">

        <div class="container">
            <div class="row justify-content-center g-0">
                <div class="col-xl-9">
                    <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                        <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">How does it work</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                                          src="{{asset('store_assets/img/gallery/location.png')}}"
                                                          height="112" alt="..."/>
                                <h5 class="mt-4 fw-bold">Select location</h5>
                                <p class="mb-md-0">Choose the location where your food will be delivered.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                                          src="{{asset('store_assets/img/gallery/order.png')}}"
                                                          height="112" alt="..."/>
                                <h5 class="mt-4 fw-bold">Choose order</h5>
                                <p class="mb-md-0">Check over hundreds of menus to pick your favorite food</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                                          src="{{asset('store_assets/img/gallery/pay.png')}}"
                                                          height="112" alt="..."/>
                                <h5 class="mt-4 fw-bold">Pay advanced</h5>
                                <p class="mb-md-0">It's quick, safe, and simple. Select several methods of payment</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                                          src="{{asset('store_assets/img/gallery/meals.png')}}"
                                                          height="112" alt="..."/>
                                <h5 class="mt-4 fw-bold">Enjoy meals</h5>
                                <p class="mb-md-0">Food is made and delivered directly to your home.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- <section> close ============================-->

    <!-- <section> Popular Products ============================-->
    <section class="py-2 overflow-hidden">

        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mt-2 mb-5">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Popular items</h5>
                </div>
                <div class="col-12">
                    <div class="carousel slide" id="carouselPopularItems" data-bs-touch="false"
                         data-bs-interval="false">

                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1000">
                                <div class="row gx-3 h-100 align-items-center">
                                    @foreach(\App\Models\Product::inRandomOrder()->limit(6)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100" style="min-width: 10vw">
                                            <div class="card card-span h-100 rounded-3">
                                                <img class="img-fluid rounded-3 h-100"
                                                     src="{{asset('store_assets/img/gallery/cheese-burger.png')}}"
                                                     alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="fw-bold text-1000 text-truncate mb-1"
                                                        style="white-space: nowrap;overflow: hidden; max-width: 30vw; text-overflow: ellipsis;"
                                                        >{{ucfirst($value['name'])}}</h5>
                                                    <div>
                                                        <span class="text-warning me-2"><i
                                                                class="fas fa-map-marker-alt"></i></span>
                                                        <span class="text-primary">{{$value->restaurant['city']}}</span>
                                                    </div>
                                                    <span class="text-1000 fw-bold">${{$value['price']}}</span>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <a class="btn btn-lg btn-danger" href="{{route('store.cart.add',['product_id'=>$value['id'],'quantity' => 1])}}" role="button">Order now</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item " data-bs-interval="2000">
                                <div class="row gx-3 h-100 align-items-center">
                                    @foreach(\App\Models\Product::inRandomOrder()->limit(6)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100" style="min-width: 10vw">
                                            <div class="card card-span h-100 rounded-3">
                                                <img class="img-fluid rounded-3 h-100"
                                                     src="{{asset('store_assets/img/gallery/thai-soup.png')}}"
                                                     alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="fw-bold text-1000 text-truncate mb-1"
                                                        style="white-space: nowrap;overflow: hidden; max-width: 30vw; text-overflow: ellipsis;"
                                                    >{{ucfirst($value['name'])}}</h5>
                                                    <div>
                                                        <span class="text-warning me-2"><i
                                                                class="fas fa-map-marker-alt"></i></span>
                                                        <span class="text-primary">{{$value->restaurant['city']}}</span>
                                                    </div>
                                                    <span class="text-1000 fw-bold">${{$value['price']}}</span>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <a class="btn btn-lg btn-danger" href="{{route('store.cart.add',['product_id'=>$value['id'],'quantity' => 1])}}" role="button">Order now</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="row gx-3 h-100 align-items-center">
                                    @foreach(\App\Models\Product::inRandomOrder()->limit(6)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100" style="min-width: 10vw">
                                            <div class="card card-span h-100 rounded-3">
                                                <img class="img-fluid rounded-3 h-100"
                                                     src="{{asset('store_assets/img/gallery/crispy-sandwitch.png')}}"
                                                     alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="fw-bold text-1000 text-truncate mb-1"
                                                        style="white-space: nowrap;overflow: hidden; max-width: 30vw; text-overflow: ellipsis;"
                                                    >{{ucfirst($value['name'])}}</h5>
                                                    <div>
                                                        <span class="text-warning me-2"><i
                                                                class="fas fa-map-marker-alt"></i></span>
                                                        <span class="text-primary">{{$value->restaurant['city']}}</span>
                                                    </div>
                                                    <span class="text-1000 fw-bold">${{$value['price']}}</span>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <a class="btn btn-lg btn-danger" href="{{route('store.cart.add',['product_id'=>$value['id'],'quantity' => 1])}}" role="button">Order now</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row gx-3 h-100 align-items-center">
                                    @foreach(\App\Models\Product::inRandomOrder()->limit(6)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100" style="min-width: 10vw">
                                            <div class="card card-span h-100 rounded-3">
                                                <img class="img-fluid rounded-3 h-100"
                                                     src="{{asset('store_assets/img/gallery/toffes-cake.png')}}"
                                                     alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="fw-bold text-1000 text-truncate mb-1"
                                                        style="white-space: nowrap;overflow: hidden; max-width: 30vw; text-overflow: ellipsis;"
                                                    >{{ucfirst($value['name'])}}</h5>
                                                    <div>
                                                        <span class="text-warning me-2"><i
                                                                class="fas fa-map-marker-alt"></i></span>
                                                        <span class="text-primary">{{$value->restaurant['city']}}</span>
                                                    </div>
                                                    <span class="text-1000 fw-bold">${{$value['price']}}</span>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <a class="btn btn-lg btn-danger" href="{{route('store.cart.add',['product_id'=>$value['id'],'quantity' => 1])}}" role="button">Order now</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev carousel-icon" type="button"
                                data-bs-target="#carouselPopularItems" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next carousel-icon" type="button"
                                data-bs-target="#carouselPopularItems" data-bs-slide="next">
                            <span class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span>
                            <span class="visually-hidden">Next </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- <section> close ============================-->


    <!-- <section> populer restaurant ============================-->
    <section id="testimonial" class="pt-4">
        <div class="container ">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mb-3">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5>
                </div>
            </div>
            <div class="row gx-2">
                {{--                @foreach(\App\Models\Restaurant::whereNotNull('image')->where('image','!=',"")->inRandomOrder()->limit(4)->get() as $key => $value)--}}
                @foreach(\App\Models\Restaurant::inRandomOrder()->limit(8)->get() as $key => $value)
                    <div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5">
                        <a href="{{route('store.restaurant.detail',['id'=>$value['id']])}}">
                            <div class="card card-span h-100 text-white rounded-3">
                                <img class="img-fluid rounded-3 h-100"
                                     src="{{asset('store_assets/img/gallery/kuakata.png')}}" alt="..."/>
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
                                <div class="card-body ps-0 z-index-2">
                                    <div class="d-flex align-items-center mb-3">
                                        <a href="{{route('store.restaurant.detail',['id'=>$value['id']])}}">
                                            <img class="img-fluid"
                                                 src="{{asset('store_assets/img/gallery/kuakata-logo.png')}}" alt=""/>
                                        </a>
                                        <div class="flex-1 ms-3">
                                            <h5 class="mb-0 fw-bold text-1000">{{$value['name']}}</h5>
                                            <span class="text-primary fs--1 me-1"><i class="fas fa-star"></i></span>
                                            <span class="mb-0 text-primary">{{rand(1,50)}}</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-soft-danger p-2">
                                    <span
                                        class="fw-bold fs-1 text-danger">{{$value['closed'] ==1 ? "Opens Tomorrows" : "Open"  }}</span>
                                </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-12 d-flex justify-content-center mt-1">
                    <a class="btn btn-lg btn-primary" href="#">View All <i class="fas fa-chevron-right ms-2"> </i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- <section> populer restaurant ============================-->

    <!-- <section> begin Search by Food ============================-->
    <section class="pt-4 overflow-hidden">

        <div class="container">
            <div class="row flex-center mb-6">
                <div class="col-lg-7">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm text-center text-lg-start">Search by Food</h5>
                </div>
                <div class="col-lg-4 text-lg-end text-center">
                    <a class="btn btn-lg text-800 me-2" href="#" role="button">VIEW ALL <i
                            class="fas fa-chevron-right ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-auto position-relative">
                    <button class="carousel-control-prev s-icon-prev carousel-icon" type="button"
                            data-bs-target="#carouselSearchByFood" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span
                            class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next s-icon-next carousel-icon" type="button"
                            data-bs-target="#carouselSearchByFood" data-bs-slide="next">
                        <span class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span
                            class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-12">
                    <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="false"
                         data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item " data-bs-interval="10000">
                                <div class="row h-100 align-items-center">
                                    @foreach(\App\Models\Category::inRandomOrder()->limit(5)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                            <div class="card card-span h-100 rounded-circle">
                                                <img class="img-fluid rounded-circle h-100"
                                                     src="{{asset('store_assets/img/gallery/search-pizza.png')}}"
                                                     alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="text-center fw-bold text-1000 text-truncate mb-2">{{$value['name']}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item active" data-bs-interval="5000">
                                <div class="row h-100 align-items-center">
                                    @foreach(\App\Models\Category::inRandomOrder()->limit(5)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                            <div class="card card-span h-100 rounded-circle"><img
                                                    class="img-fluid rounded-circle h-100"
                                                    src="{{asset('store_assets/img/gallery/steak.png')}}" alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="text-center fw-bold text-1000 text-truncate mb-2">{{$value['name']}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="row h-100 align-items-center">
                                    @foreach(\App\Models\Category::inRandomOrder()->limit(5)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                            <div class="card card-span h-100 rounded-circle"><img
                                                    class="img-fluid rounded-circle h-100"
                                                    src="{{asset('store_assets/img/gallery/burger.png')}}" alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="text-center fw-bold text-1000 text-truncate mb-2">{{$value['name']}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row h-100 align-items-center">
                                    @foreach(\App\Models\Category::inRandomOrder()->limit(5)->get() as $key => $value)
                                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                            <div class="card card-span h-100 rounded-circle"><img
                                                    class="img-fluid rounded-circle h-100"
                                                    src="{{asset('store_assets/img/gallery/sub-sandwich.png')}}"
                                                    alt="..."/>
                                                <div class="card-body ps-0">
                                                    <h5 class="text-center fw-bold text-1000 text-truncate mb-2">{{$value['name']}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->



    <!-- App Reklam Start-->
    <section>
        <div class="bg-holder"
             style="background-image:url({{asset('store_assets/img/gallery/cta-one-bg.png')}});background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <div class="card card-span shadow-warning" style="border-radius: 35px;">
                        <div class="card-body py-5">
                            <div class="row justify-content-evenly">
                                <div class="col-md-3">
                                    <div
                                        class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                        <img src="{{asset('store_assets/img/icons/discounts.png')}}" width="100"
                                             alt="..."/>
                                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                                            <h2 class="fw-bolder text-1000 mb-0 text-gradient">Daily<br
                                                    class="d-none d-md-block"/>Discounts </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 hr-vertical">
                                    <div
                                        class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                        <img src="{{asset('store_assets/img/icons/live-tracking.png')}}" width="100"
                                             alt="..."/>
                                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                                            <h2 class="fw-bolder text-1000 mb-0 text-gradient">Live Tracking</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 hr-vertical">
                                    <div
                                        class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                        <img src="{{asset('store_assets/img/icons/quick-delivery.png')}}" width="100"
                                             alt="..."/>
                                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                                            <h2 class="fw-bolder text-1000 mb-0 text-gradient">Quick Delivery </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-center mt-md-8">
                <div class="col-lg-5 d-none d-lg-block" style="margin-bottom: -122px;">
                    <img class="w-100" src="{{asset('store_assets/img/gallery/phone-cta-one.png')}}" alt="..."/>
                </div>
                <div class="col-lg-5 mt-7 mt-md-0">
                    <h1 class="text-primary">Install the app</h1>
                    <p>It's never been easier to order food. Look for the finest <br class="d-none d-xl-block"/>discounts
                        and you'll be lost in a world of delectable food.
                    </p>
                    <a class="pe-2" href="https://www.apple.com/app-store/" target="_blank">
                        <img src="{{asset('store_assets/img/gallery/app-store.svg')}}" width="160" alt=""/>
                    </a>
                    <a href="https://play.google.com/store/apps" target="_blank">
                        <img src="{{asset('store_assets/img/gallery/google-play.svg')}}" width="160" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- App Reklam End-->

    <!-- <section> begin ============================-->
    <section class="pb-5 pt-8">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-span mb-3 shadow-lg">
                        <div class="card-body py-0">
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img
                                        class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0"
                                        src="{{asset('store_assets/img/gallery/crispy-sandwiches.png')}}" alt="..."/>
                                </div>
                                <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                    <h1 class="card-title mt-xl-5 mb-4">Best deals <span class="text-primary"> Crispy Sandwiches</span>
                                    </h1>
                                    <p class="fs-1">Enjoy the large size of sandwiches. Complete your meal with the
                                        perfect slice of sandwiches.</p>
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

    <!-- <section> begin ============================-->
    <section class="py-0">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-span mb-3 shadow-lg">
                        <div class="card-body py-0">
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-md-0"><img
                                        class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-start rounded-md-top-0"
                                        src="{{asset('store_assets/img/gallery/fried-chicken.png')}}" alt="..."/></div>
                                <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                    <h1 class="card-title mt-xl-5 mb-4">Celebrate parties with <span
                                            class="text-primary">Fried Chicken</span></h1>
                                    <p class="fs-1">Get the best fried chicken smeared with a lip smacking lemon chili
                                        flavor. Check out best deals for fried chicken.</p>
                                    <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" href="#!">PROCEED
                                            TO ORDER<i class="fas fa-chevron-right ms-2"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- <section> close ============================-->

    <!-- <section> begin ============================-->
    <section class="pt-5">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-span mb-3 shadow-lg">
                        <div class="card-body py-0">
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img
                                        class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0"
                                        src="{{asset('store_assets/img/gallery/pizza.png')}}" alt="..."/></div>
                                <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                    <h1 class="card-title mt-xl-5 mb-4">Wanna eat hot & <span class="text-primary">spicy Pizza?</span>
                                    </h1>
                                    <p class="fs-1">Pair up with a friend and enjoy the hot and crispy pizza pops. Try
                                        it with the best deals.</p>
                                    <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" href="#!">PROCEED
                                            TO ORDER<i class="fas fa-chevron-right ms-2"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- <section> close ============================-->

@endsection
