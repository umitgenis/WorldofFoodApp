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
                                <h4 class="title">Order Items Detail</h4>
                                <p class="category"> Order Item List</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>SKU Code</th>
                                        <th>Date</th>
                                        <th>Unit Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_items as $order_item)
                                        <tr class="h5">
                                            <td>{{ucfirst($order_item['product_name'])}} ( {{$order_item['quantity']}} )</td>
                                            <td>{{$order_item['product_sku_code']}}</td>
                                            <td>{{$order_item['created_at']->format('j.m.Y')}}</td>
                                            <td>{{$order_item['unit_price']}} <small>TL</small></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
