@extends('admin.admin_master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Search Data</h2>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01">Customer Name</label>
                                <input type="text" class="form-control" id="validationServer01" name="name" value="">
    
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServer02">Shipping address</label>
                                <input type="text" class="form-control" name="shipping_address" id="validationServer02"
                                    value="">
    
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServer02">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" id="validationServer02" value="">
    
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">Alternative Mobile</label>
                                <input type="text" class="form-control" name="alternative_mobile"
                                    id="validationServerUsername" value="">
    
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">Status</label>
                                <select class="form-select form-control" name="status" aria-label="Default select example">
                                    <option value="">Select from the menu</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Complete">completed</option>
                                </select>
    
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">Payment status</label>
                                <select class="form-select form-control" name="payment_status"
                                    aria-label="Default select example">
                                    <option value="">Select from the menu</option>
                                    <option value="Due">Due</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
    
                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">Courier id</label>
                                <select class="form-select form-control" aria-label="Default select example"
                                    name="courier_id">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Shundorban courier service</option>
                                    <option value="2">Redx</option>
                                    <option value="3">Fedx</option>
                                </select>
    
                            </div>
    
                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">Special Instruction</label>
                                <input type="text" class="form-control" name="special_instruction"
                                    id="validationServerUsername" value="">
    
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">Comment</label>
                                <input type="text" class="form-control" name="comment" id="validationServerUsername"
                                    value="">
    
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Search Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h2>Order Table</h2>
    </div>
    <div class="card-body">
        <p class="mb-5"><a href="{{route('add.order')}}" class="btn btn-success btn-sm">Add Order</a></p>
        <div style="width: 100%; overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>shipping_address</th>
                        <th>mobile</th>
                        <th>alternative_mobile</th>
                        <th>total_product</th>
                        <th>total_price</th>
                        <th>discount</th>
                        <th>paid</th>
                        <th>status</th>
                        <th>payment_status</th>
                        <th>payment_details</th>
                        <th>courier_id</th>
                        <th>courier_details</th>
                        <th>special_instruction</th>
                        <th>comment</th>
                        <th>updated_by</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @php($i= 1)
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->shipping_address}}</td>
                        <td>{{$order->mobile}}</td>
                        <td>{{$order->alternative_mobile}}</td>
                        <td>{{$order->total_product}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->discount}}</td>
                        <td>{{$order->paid}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td scope="row">{{$order->payment_details}}</td>
                        <td>{{$order->courier_id}}</td>
                        <td>{{$order->courier_details}}</td>
                        <td>{{$order->special_instruction}}</td>
                        <td>{{$order->comment}}</td>
                        <td>{{$order->updatedBy->name}}</td>
                        <td>
                            <a href="{{url('process/order/'.$order->id)}}" class="btn btn-success btn-sm">Process</a>
                        </td>
                        <td>
                            <a href="{{url('edit/order/'.$order->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('delete/order/'.$order->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
@endsection
