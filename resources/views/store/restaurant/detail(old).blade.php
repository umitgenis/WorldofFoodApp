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
                                <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="{{asset('store_assets/img/gallery/pizza.png')}}" alt="..." /></div>
                                <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                                    <img class="img-fluid vh-25 rounded-3 mb-3 mt-3 " src="{{asset('store_assets/img/gallery/kuakata-logo.png')}}" alt="..." />
                                    <h1 class="card-title mt-xl-5 mb-3"><span class="text-primary">Welcome to </span>{{$data['name']}} </h1>
                                    <p class="fs-1">Taste our delicious products. Try it with the best deals.</p>
                                    <div>
                                        <span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="text-primary">{{$data['city']}}</span>
                                    </div>
                                    <div class="d-grid bottom-0"><a class="btn btn-lg btn-primary mt-xl-6" href="#!">PROCEED TO ORDER<i class="fas fa-chevron-right ms-2"></i></a></div>
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
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach($data->categories as $key => $value)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <h5><small><i>Category of _</i></small><strong>{{$value['name']}}</strong></h5>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="col-12">
                                            <div class="">
                                                @foreach($data->products->chunk(6) as $chunk)
                                                    <div class="row gx-3 h-100 align-items-center">
                                                        @foreach($chunk as $key => $value)
                                                            <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                                                <div class="card card-span h-100 rounded-3">
                                                                    <img class="img-fluid rounded-3 h-100" src="{{asset('store_assets/img/gallery/cheese-burger.png')}}" alt="..." />
                                                                    <div class="card-body ps-0">
                                                                        <h5 class="fw-bold text-1000 text-truncate mb-1">{{$value['name']}}</h5>
                                                                        <div>
                                                                            <span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span>
                                                                            <span class="text-primary">{{$value->restaurant['city']}}</span>
                                                                        </div>
                                                                        <span class="text-1000 fw-bold">${{$value['price']}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="d-grid gap-2">
                                                                    <a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->
    </section>
    <!-- <section> close ============================-->

@endsection
