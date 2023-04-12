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
                            <h4 class="title">Restaurant Add</h4>
                            <p class="category">You can create a restaurant here.</p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" action="{{route('admin.restaurant.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   required autocomplete="name" autofocus >
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
                                        <div class="form-group label-floating ">
                                            <label class="control-label">City</label>
                                            <select name="city" id="" class="form-control"
                                                    required autocomplete="city" autofocus>
                                                @foreach(cityList::getCity() as $city)
                                                    <option value="{{$city}}" >{{$city}}</option>
                                                @endforeach
                                            </select>
                                            <span class="material-input"></span></div>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Address</label>
                                            <input type="text" name="address" class="form-control"
                                                   required autocomplete="address" autofocus>
                                            <span class="material-input"></span></div>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Open Time</label>
                                            <input type="time" name="open_time" value="08:00" class="form-control"
                                                   required autocomplete="open_time" autofocus>
                                            <span class="material-input"></span></div>
                                        @error('open_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating" >
                                            <label class="control-label">Close Time</label>
                                            <input type="time" name="close_time" value="23:59" class="form-control"
                                                   required autocomplete="close_time" autofocus>
                                            <span class="material-input"></span></div>
                                        @error('close_time')
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

                                <button type="submit" class="btn btn-primary pull-right">Restaurant Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
