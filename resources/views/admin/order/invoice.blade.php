@extends('admin.admin_master')

@section('content')
<div class="container px-0" id="container">
    <div class="row mt-4">
        <div class="col-12 col-lg-10 offset-lg-1">
            <div class="row">
                <div class="col-12">
                    <div class="text-center text-150"> <i class="fa fa-book fa-2x text-success-m2 mr-1"></i> <span
                            class="text-default-d3">Bootdey.com</span></div>
                </div>
            </div>
            <hr class="row brc-default-l1 mx-n1 mb-4">
            <div class="row">
                <div class="col-sm-6">
                    <div> <span class="text-sm text-grey-m2 align-middle">To:</span> <span
                            class="text-600 text-110 text-blue align-middle">{{$invoice->name}}</span></div>
                    <div class="text-grey-m2">
                        @php
                            $address = explode(",",$invoice->shipping_address);  
                         @endphp
                        
                        <div class="my-1"> {{$address[0]}}, {{$address[1]}}</div>
                        <div class="my-1"> {{$address[2]}}, Country:Bangladesh</div>
                        <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                class="text-600">{{$invoice->mobile}}</b></div>
                    </div>
                </div>
                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                    <hr class="d-sm-none">
                    <div class="text-grey-m2">
                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125"> Invoice</div>
                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                class="text-600 text-90">ID:</span> #{{$invoice->id}}</div>
                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                class="text-600 text-90">Issue Date:</span> {{$invoice->created_at}}</div>
                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                class="text-600 text-90">Status:</span> <span
                                class="badge badge-warning badge-pill px-25">{{$invoice->payment_status}}</span></div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                @php 
                    $orderProduct = \App\Models\OrderProduct::where('order_id',$invoice->id)->with('product')->get();
                   
                  
                @endphp
             
                <div class="row text-600 text-white bgc-default-tp1 py-25">
                    <div class="d-none d-sm-block col-1">#</div>
                    <div class="col-9 col-sm-5">Description</div>
                    <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                    <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                    <div class="col-2">Amount</div>
                </div>
                @php($i=1)
                <div class="text-95 text-secondary-d3">
                    @foreach ($orderProduct as $product)
                   
                    <div class="row mb-2 mb-sm-0 py-25">
                        <div class="d-none d-sm-block col-1">{{$i++}}</div>
                        <div class="col-9 col-sm-5">{{$product->product->product_name}}</div>
                        <div class="d-none d-sm-block col-2">{{$product->quantity}}</div>
                        <div class="d-none d-sm-block col-2 text-95">{{$product->rate}}</div>
                        <div class="col-2 text-secondary-d2">{{$product->total}}</div>
                    </div>  
                    @endforeach
                </div>
                <div class="row border-b-2 brc-default-l2"></div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0"> Extra note such as company or
                        payment information...</div>
                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                        <div class="row my-2">
                            <div class="col-7 text-right"> SubTotal</div>
                            <div class="col-5"> <span class="text-120 text-secondary-d1">{{$invoice->total_price}}</span></div>
                        </div>
                        <div class="row my-2">
                            <div class="col-7 text-right"> Discount</div>
                            <div class="col-5"> <span class="text-110 text-secondary-d1">{{$invoice->discount}}</span></div>
                        </div>
                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                            <div class="col-7 text-right"> Total Amount</div>
                            <div class="col-5"> <span class="text-150 text-success-d3 opacity-2">{{$invoice->total_price - $invoice->discount}}</span></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div> <span class="text-secondary-d1 text-105">Thank you for your business</span> <a href="#"
                        class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
   
    document.getElementsByTagName('body')[0].innerHTML=document.getElementById("container").innerHTML;

    window.print();


    //  function fuck(obj){

    //    obj= $(obj);
    //    obj.text('Fuck');
    //    return obj;
    // }

    
    // $("body")[0].innerHTML = $("#container").html();
    // fuck(fuck("body")[0]).html(fuck("#container").html());

    // var body = document.getElementsByTagName('body')[0];

    //  $("body")[0].innerHTML

    // console.log(body);

   

</script>
@endpush
