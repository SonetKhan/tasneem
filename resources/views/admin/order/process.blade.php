@extends('admin.admin_master')

@section('content')
<div class="container">
    <table class="table table-borderless">
      <thead>

      </thead>
      <tbody>

        <tr>
          <td>Name:</td>
          <td>{{$process->name}}</td>
        </tr>
        <tr>
          <td>Mobile</td>
          <td>{{$process->mobile}}</td>
        </tr>
        <tr>
          <td>Alter Mobile</td>
          <td>{{$process->alternative_mobile}}</td>
        </tr>
        <tr>
          <td>Shipping Addresss</td>
          <td>{{$process->shipping_address}}</td>
        </tr>
      </tbody>
    </table>

    <table class="table table-striped">
      <thead>

        <th>SL</th>

        <th>Product Name: </th>

        <th>Rate: </th>

        <th>Quantity: </th>

        <th>Total</th>

      </thead>

      <tbody>
        @php
        $i = 1;
        
        $total = $process->total_price - $process->discount;

         $allData  =  DB::table('order_products')->where('order_id','=',$process->id)->get();

        @endphp
        
        @foreach($allData as $data)
        <tr>
          <td>{{$i++}}</td>
          <td>{{\App\Models\Product::find($data->product_id)->product_name}}</td>
          <td>{{$data->rate}}</td>
          <td>{{$data->quantity}}</td>
          <td>{{$data->total}}</td>
        </tr>
          
        @endforeach

       
      </tbody>

    </table>
    <div class="container">
   <form action="{{url('process/update/order/'.$process->id)}}" method="POST">
      @csrf
      <div class="row mb-5">
          <div class="col-md-8">

          </div>
          <div class="col-md-4">   
              <h5 class="p-1">Sub Total : </h5> <input type="number" name="total_price" class="form-control" id="sub-total" value="{{$process->total_price}}" readonly>
              <h5 class="p-1">Discount : </h5> <input type="number" name="discount" class="form-control" id="discount" value="{{$process->discount}}">
              <h5 class="p-1">Total : </h5> <input type="number" name="total" class="form-control" id="total" value="{{$process->total_price - $process->discount}}" readonly>
              <h5 class="p-1">Paid : </h5> <input type="number" name="paid" class="form-control" id="paid" value="{{$process->paid}}">
              <h5 class="p-1">Due : </h5> <input type="number" name="due" class="form-control" id="due" value = "{{$total - $process->paid}}" readonly >
              <h5 class="p-1">Payment Details : </h5> <input type="text" name="payment_details" class="form-control" id="payment_details" value={{$process->payment_details}}>
              <h5 class="p-1">Comment(Optional) : </h5> <input type="text" name="comment" class="form-control" id="comment" placeholder="Give suggesstion for improving services">
          
         </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          Status:
          <select class="form-select form-control mb-2" aria-label="Default select example" name="status">
            <option value="">select from this menu</option>
            <option value="Pending" <?php if($process->status =='Pending') echo 'selected';?> >Pending</option>
            <option value="Processing" <?php if($process->status =='Processing') echo 'selected';?>>Processing</option>
            <option value="Shipped" <?php if($process->status =='Shipped') echo 'selected';?> >Shipped</option>
            <option value="Complete" <?php if($process->status =='Complete') echo 'selected';?>>Complete</option>
          </select>
          Payment Status: 
          <select class="form-select form-control mb-2" aria-label="Default select example" name="payment_status">
            <option Value="">Select from this menu</option>
            <option value="Due" <?php if($process->payment_status =='Due') echo 'selected'; ?> >Due</option>
            <option value="Paid" <?php if($process->payment_status =='Paid') echo 'selected'; ?> >Paid</option>
            
          </select>
          Courier Name:
          <select class="form-select form-control mb-2" aria-label="Default select example" name="courier_id">
            <option Value="">Select from this menu</option>
            @foreach (\App\Models\Courier::orderBy('courier_name','asc')->get() as $courier)
                <option value="{{$courier->id}}" @if($courier->id==$process->courier_id) selected @endif>{{$courier->courier_name}}</option>
            @endforeach
            
          </select>

          Courier Details: 
            
          <textarea name="courier_details" id="" cols="30" rows="10" class="form-control">{{$process->courier_details}}</textarea>

          Special Instruction: 

          <input type="text" name="special_instruction" class="form-control" id="" name="" value="{{($process->special_instruction)?$process->special_instruction :""}}">

          comment: 

          <input type="text" name="comment" class="form-control" id=""  value="{{($process->comment)?$process->comment:""}}">
         

        </div>
      </div>
      <div class="d-grid gap-2 mt-4">
        <button type="submit" class="btn btn-primary btn-lg btn-block confirm_order">Update</button>
        
      </div>
    </form>
  </div>
</div>
@endsection