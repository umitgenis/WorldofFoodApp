@extends('store.layouts.store')

@section('content')

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-2 pb-0 h-100">
            @if(session('status'))
                <div class="alert alert-primary bg-white text-primary mt-0 " role="alert">
                    {{session('status')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger bg-white text-primary mt-0" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3 ">
                                        <a href="{{url()->previous()}}" class="text-body">
                                            <i class="fas fa-long-arrow-alt-left me-2 text-primary"></i>Continue
                                            shopping
                                        </a>
                                    </h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h5 class="mb-1">Shopping cart</h5>
                                            <p class="mb-0">You have 4 items in your cart</p>
                                        </div>
                                    </div>
                                    @foreach($products as $product)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img
                                                                src="{{asset("images/products/".$product['image_path'])}}"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5>{{ucfirst($product['name'])}}</h5>
                                                            <p class="small mb-0">{{$product->restaurant['name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 50px;">
                                                            <h5 class="fw-normal mb-0">
                                                                ( {{$items[$product['id']]['quantity']}} )</h5>
                                                        </div>
                                                        <div style="width: 80px;">
                                                            <h5 class="mb-0">{{$product['price']}}<small> TL</small>
                                                            </h5>
                                                        </div>
                                                        <a href="#!" style="color: #cecece;">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-lg-5">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p><u>Current Address Change:</u></p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="flex-fill">
                                                        <form action="{{route('store.profile.changeAddress')}}"
                                                              method="POST">
                                                            @csrf
                                                            <select onchange="this.form.submit()"
                                                                    class="form-select bg-soft-success border-0 "
                                                                    name="address_id" id="address_id"
                                                                    style="
                                white-space: nowrap;overflow: hidden; text-overflow: ellipsis;
                                padding-left: 0.25rem; padding-right: 0.25rem ;background-position: right 0.1rem center!important; "
                                                                    aria-label="Default select">--}}
                                                                @foreach(\App\Models\UserAddress::select('id','name','city','address')->where('user_id','=',Auth::id())->get() as $key => $address)
                                                                    <option
                                                                        @if($address['id'] == \Illuminate\Support\Facades\Session::get('current_address_id')) selected
                                                                        @endif class="" value="{{$address['id']}}">
                                                                        <span><i>{{$address['name']}}</i> | {{$address['address']}} {{$address['city']}} </span>
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{route('store.checkout.index')}}" method="POST">
                                            @csrf
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <p><u>Note:</u></p>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="flex-fill">
                                                        <textarea name="note" id="note" cols="40" rows="10"
                                                                  class="form-control resize-none"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card bg-primary text-white rounded-2">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                                        <h5 class="mb-0">Card details</h5>
                                                    </div>

                                                    <p class="small mb-2">Card type</p>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-visa fa-2x me-2"></i></a>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-amex fa-2x me-2"></i></a>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-paypal fa-2x"></i></a>

                                                    {{--                                                <form class="mt-4">--}}
                                                    <div class="form-outline form-white mb-4">
                                                        <input type="text" id="typeName"
                                                               class="form-control form-control-lg rounded-2" siez="17"
                                                               placeholder="Cardholder's Name"
                                                               style="padding-left: 1rem; padding-right: 1rem"/>
                                                        <label class="form-label" for="typeName">Cardholder's
                                                            Name</label>
                                                    </div>

                                                    <div class="form-outline form-white mb-4">
                                                        <input type="text" id="typeText"
                                                               class="form-control form-control-lg rounded-2" siez="17"
                                                               placeholder="1234 5678 9012 3457" minlength="19"
                                                               maxlength="19"
                                                               style="padding-left: 1rem; padding-right: 1rem"/>
                                                        <label class="form-label" for="typeText">Card Number</label>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col-md-6">
                                                            <div class="form-outline form-white">
                                                                <input type="text" id="typeExp"
                                                                       class="form-control form-control-lg rounded-2"
                                                                       placeholder="MM/YYYY" size="7" id="exp"
                                                                       minlength="7"
                                                                       maxlength="7"
                                                                       style="padding-left: 1rem; padding-right: 1rem"/>
                                                                <label class="form-label"
                                                                       for="typeExp">Expiration</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-outline form-white">
                                                                <input type="password" id="typeText"
                                                                       class="form-control form-control-lg rounded-2"
                                                                       placeholder="&#9679;&#9679;&#9679;" size="1"
                                                                       minlength="3" maxlength="3"
                                                                       style="padding-left: 1rem; padding-right: 1rem"/>
                                                                <label class="form-label" for="typeText">Cvv</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--                                                </form>--}}

                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between text-dark">
                                                        <p class="mb-2">Subtotal</p>
                                                        <p class="mb-2">{{$total}} <small>TL</small></p>
                                                    </div>

                                                    <div class="d-flex justify-content-between text-dark">
                                                        <p class="mb-2">vat</p>
                                                        @php $Shipping =  $total*0.18   @endphp
                                                        <p class="mb-2">{{$Shipping}} <small>TL</small></p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4 text-dark">
                                                        <p class="mb-2">Total(Incl. taxes)</p>
                                                        @php $totalPrice =  $total + $total * 0.18   @endphp
                                                        <p class="mb-2">{{$totalPrice}}<small>TL</small></p>
                                                    </div>


                                                    <div class="d-flex justify-content-between">
                                                        <button type="submit"
                                                                class="btn btn-success btn-block btn-lg rounded-2 w-100">
                                                            <span>{{$totalPrice}}<small>TL</small></span>
                                                            <span> Checkout <i
                                                                    class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                        </button>

                                                    </div>


                                                </div>
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

@endsection
