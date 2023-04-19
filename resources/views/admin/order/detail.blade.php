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
                            <h4 class="title">Detail</h4>
                            <p class="category"><strong><u>{{$order->user['name']}}</u></strong></p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th>Order Num.</th>
                                    <th>Order Items</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="h5">
                                    <td>{{$order['order_number']}}</td>
                                    <td><a class="btn btn-primary btn-sm"
                                           href="{{route('admin.order.orderItems',[$order['id']])}}">Order Items</a>
                                    </td>
                                    <td>{{$order['created_at']->format('j.m.Y')}}</td>
                                    <td>
                                        <ul style="list-style: none;">
                                            <li>{{$order['city']}}</li>
                                            <li>{{$order['address']}}</li>
                                            <li class="text-info">Note: {{$order['note']}}</li>
                                        </ul>
                                    </td>
                                    <td>{{$order['total_price']}} <small>TL</small></td>
                                    <td class="text-info">{{ucfirst($order['status'])}}</td>
                                    <td>
                                        <div class="btn-group-vertical" role="group" aria-label="status-buttons">
                                            @if($order['status'] == \App\Models\Order::PENDING || $order['status'] == \App\Models\Order::CANCELLED)
                                                <a class="btn btn-success"
                                                   href="{{route('admin.order.status',['order_id'=>$order['id'],'status'=>\App\Models\Order::APPROVED])}}">Approved</a>
                                                <a class="btn btn-danger"
                                                   href="{{route('admin.order.status',['order_id'=>$order['id'],'status'=>\App\Models\Order::REJECTED])}}">Rejected</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
