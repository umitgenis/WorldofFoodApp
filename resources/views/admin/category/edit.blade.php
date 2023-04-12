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
                            <h4 class="title">Category Edit</h4>
                            <p class="category">{{$category['name']}}</p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.category.update',['category_id'=>$category['id']])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group label-floating @if(is_null($category['name'])) is-empty @else '' @endif">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$category['name']}}"
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

                                <button type="submit" class="btn btn-primary pull-right">Category Update</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
