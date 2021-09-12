@extends('admin.admin_master')

@section('content')
<div class="container">
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update Order</h2>
        </div>
        <div class="card-body">
            <form action="{{url('update/order/'.$editData->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">Customer Name</label>
                        <input type="text" class="form-control" id="validationServer01" name="name" value="{{$editData->name}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServer02">Shipping address</label>
                        <input type="text" class="form-control" name="shipping_address" id="validationServer02"  value="{{$editData->shipping_address}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServer02">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="validationServer02"  value="{{$editData->mobile}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Alternative Mobile</label>
                        <input type="text" class="form-control" name="alternative_mobile" id="validationServerUsername" value="{{$editData->alternative_mobile}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Total product</label>
                        <input type="text" class="form-control" name="total_product" id="validationServerUsername" value="{{$editData->total_product}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Total price</label>
                        <input type="text" class="form-control" name="total_price" id="validationServerUsername" value="{{$editData->total_price}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Discount</label>
                        <input type="text" class="form-control" name="discount" id="validationServerUsername" value="{{$editData->discount}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Paid</label>
                        <input type="text" class="form-control" name="paid" id="validationServerUsername" value="{{$editData->paid}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Status</label>
                        <select class="form-select form-control" name="status" aria-label="Default select example">
                            <option value="{{$editData->status}}">{{$editData->status}}</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Complete">completed</option>
                          </select>
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Payment status</label>
                        <select class="form-select form-control" name="payment_status" aria-label="Default select example">
                            <option value="{{$editData->payment_status}}">{{$editData->payment_status}}</option>
                            <option value="Due">Due</option>
                            <option value="Paid">Paid</option>
                          </select>
                        
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Payment details</label>
                        <input type="text" class="form-control" name="payment_details" id="validationServerUsername" value="{{$editData->payment_details}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Courier id</label>
                        <input type="text" class="form-control" name="courier_id" id="validationServerUsername" value="{{$editData->courier_id}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Courier details</label>
                        <input type="text" class="form-control" name="courier_details" id="validationServerUsername" value="{{$editData->courier_details}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Special Instruction</label>
                        <input type="text" class="form-control" name="special_instruction" id="validationServerUsername" value="{{$editData->special_instruction}}">
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Comment</label>
                        <input type="text" class="form-control" name="comment" id="validationServerUsername" value="{{$editData->comment}}">
                        
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Update Data</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection