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
                                <h4 class="title">Orders</h4>
                                <p class="category">Here you can find the list of orders.</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Show</th>
                                        <th>Date</th>
                                        <th>Address</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr class="h5">
                                            <td>{{$order['order_number']}}</td>
                                            <td><a class="btn btn-primary btn-sm" href="{{route('admin.order.detail',[$order['order_number']])}}">Show</a></td>
                                            <td>{{$order['created_at']->format('j F Y H:i')}}</td>
                                            <td>{{$order['address']}}</td>
                                            <td>{{$order['total_price']}} <small>TL</small></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$orders->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
