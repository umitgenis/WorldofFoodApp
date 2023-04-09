@php use Illuminate\Support\Facades\Auth; @endphp
@extends('store.layouts.store')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-8 mb-8">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary opacity-75">My Addresses</div>
                    @if (session('status'))
                        <div class="alert alert-success m-1" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger m-1" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @empty($userAddresses->count())
                        <div class="card-body">
                            <form method="POST" action="{{route('store.profile.address_add',['id'=>Auth::id()])}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="address_name" class="col-md-4 col-form-label text-md-end">Address
                                        Title</label>

                                    <div class="col-md-6">
                                        <input id="address_name" type="text"
                                               class="form-control @error('address_name') is-invalid @enderror"
                                               name="address_name" value="{{ old ('address_name')}}" required
                                               autocomplete="address_name" autofocus>

                                        @error('address_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address_city" class="col-md-4 col-form-label text-md-end">City</label>

                                    <div class="col-md-6">
                                        <select class="form-select form-select-sm " name="address_city" id="selectDelivery" style="padding-left: 2rem;background-position: right 1rem center !important; " aria-label="Default select">
                                            @foreach($cityList as $city)
                                                <option value="{{$city}}">{{$city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                    <div class="col-md-6">
                                        <textarea id="address" cols="20" rows="5"
                                                  class="resize-none form-control @error('address') is-invalid @enderror"
                                                  name="address" required autocomplete="address"
                                                  autofocus>{{ old ('address')}}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary w-auto">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('store.profile.address_add',['id'=>Auth::id()])}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="address_name" class="col-md-4 col-form-label text-md-end">Address
                                        Title</label>

                                    <div class="col-md-6">
                                        <input id="address_name" type="text"
                                               class="form-control @error('address_name') is-invalid @enderror"
                                               name="address_name" value="{{ old ('name')}}" required
                                               autocomplete="address_name" autofocus>

                                        @error('address_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address_city" class="col-md-4 col-form-label text-md-end">City</label>

                                    <div class="col-md-6">
                                        <select class="form-select form-select-sm " name="address_city" id="selectDelivery" style="padding-left: 2rem;background-position: right 1rem center !important; " aria-label="Default select">
                                            @foreach($cityList as $city)
                                                <option value="{{$city}}">{{$city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                    <div class="col-md-6">
                                        <textarea id="address" cols="20" rows="5"
                                                  class="resize-none form-control @error('address') is-invalid @enderror"
                                                  name="address" required autocomplete="address"
                                                  autofocus>{{ old ('address')}}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary w-auto">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endempty

                    @foreach($userAddresses as $key => $address)
                        <div class="card-body">
                            <form method="POST"
                                  action="{{route('store.profile.address_update',['id'=>$id=Auth::id(),'address_id'=>$address['id']])}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="address_name" class="col-md-4 col-form-label text-md-end">Address
                                        Title</label>

                                    <div class="col-md-6">
                                        <input id="address_name" type="text"
                                               class="form-control @error('address_name') is-invalid @enderror"
                                               name="address_name" value="{{$address['name'] ?? ""}}" required
                                               autocomplete="address_name" autofocus>

                                        @error('address_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address_city" class="col-md-4 col-form-label text-md-end">City</label>

                                    <div class="col-md-6">
                                        <select class="form-select form-select-sm " name="address_city" id="selectDelivery" style="padding-left: 2rem;background-position: right 1rem center !important; " aria-label="Default select">
                                            <option >Şehir Şeçiniz</option>
                                            @foreach($cityList as $city)
                                                <option value="{{$city}}" @if($address['city'] == $city) selected @endif>{{$city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                    <div class="col-md-6">
                                        <textarea id="address" cols="20" rows="5"
                                                  class="resize-none form-control @error('address') is-invalid @enderror"
                                                  name="address" required autocomplete="address"
                                                  autofocus>{{$address['address'] ?? ""}}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary w-auto">
                                            Update
                                        </button>

                                        <a href="{{route('store.profile.address_delete',['address_id'=>$address['id']])}}">
                                            <button type="button" class="btn btn-danger w-auto">
                                                Delete
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </form>

                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif

                        @if($loop->last && ($userAddresses->count() >= 1 && $userAddresses->count() < 2))
                            <div class="card-body">
                                <form method="POST" action="{{route('store.profile.address_add',['id'=>Auth::id()])}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="address_name" class="col-md-4 col-form-label text-md-end">Address
                                            Title</label>

                                        <div class="col-md-6">
                                            <input id="address_name" type="text"
                                                   class="form-control @error('address_name') is-invalid @enderror"
                                                   name="address_name" value="{{ old ('address_name')}}" required
                                                   autocomplete="address_name" autofocus>

                                            @error('address_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="address_city" class="col-md-4 col-form-label text-md-end">City</label>

                                        <div class="col-md-6">
                                            <select class="form-select form-select-sm " name="address_city" id="selectDelivery" style="padding-left: 2rem;background-position: right 1rem center !important; " aria-label="Default select">
                                                @foreach($cityList as $city)
                                                    <option value="{{$city}}">{{$city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                        <div class="col-md-6">
                                        <textarea id="address" cols="20" rows="5"
                                                  class="resize-none form-control @error('address') is-invalid @enderror"
                                                  name="address" required autocomplete="address"
                                                  autofocus>{{ old ('address')}}</textarea>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary w-auto">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
