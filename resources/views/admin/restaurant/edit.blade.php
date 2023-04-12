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
                            <h4 class="title">Restaurant Edit</h4>
                            <p class="category">{{$restaurant['name']}}</p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" action="{{route('admin.restaurant.update',['id'=>$restaurant['id']])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group label-floating @if(is_null($restaurant['name'])) is-empty @else '' @endif">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$restaurant['name']}}"
                                                   required autocomplete="name" autofocus>
                                            <span class="material-input"></span>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Image</label>
                                            <img src="{{asset("images/restaurants/".$restaurant['image_path'])}}"
                                                 alt="product image"
                                                 style="max-height: 4vw; width: auto; padding-left: 50px;" >
                                            <input type="file" name="image" class="form-control"
                                                   style="opacity: 1; position: relative; padding-left: 50px"
                                                   required autocomplete="image" autofocus>
                                            <span class="material-input"></span>
                                        </div>

                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group label-floating @if(is_null($restaurant['city'])) is-empty @else '' @endif">
                                            <label class="control-label">City</label>
                                            <select name="city" id="" class="form-control" required>
                                                @foreach(cityList::getCity() as $city)
                                                    <option value="{{$city}}" @if($restaurant['city'] == $city) selected @endif >{{$city}}</option>
                                                @endforeach
                                            </select>
                                            <span class="material-input"></span>
                                        </div>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group label-floating @if(is_null($restaurant['address'])) is-empty @else '' @endif">
                                            <label class="control-label">Address</label>
                                            <input type="text" name="address" class="form-control"
                                                   value="{{$restaurant['address']}}" required autocomplete="address"
                                                   autofocus>
                                            <span class="material-input"></span>
                                        </div>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group label-floating @if(is_null($restaurant['open_time'])) is-empty @else '' @endif">
                                            <label class="control-label">Open Time</label>
                                            <input type="time" name="open_time" value="{{$restaurant['open_time']}}"
                                                   class="form-control" required autocomplete="open_time" autofocus>
                                            <span class="material-input"></span>
                                        </div>
                                        @error('open_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group label-floating @if(is_null($restaurant['close_time'])) is-empty @else '' @endif">
                                            <label class="control-label">Close Time</label>
                                            <input type="time" name="close_time" value="{{$restaurant['close_time']}}"
                                                   class="form-control" required autocomplete="close_time" autofocus>
                                            <span class="material-input"></span>
                                        </div>
                                        @error('close_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Restaurant Update</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
