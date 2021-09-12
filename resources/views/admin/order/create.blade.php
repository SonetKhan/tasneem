@extends('admin.admin_master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3>Please input your Details</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name">Full name </label>
                                <input type="text" class="form-control" id="name"  value="" required="">
                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile" aria-describedby="inputGroupPrepend3" required="">
                               
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="alt_mobile">Alternative Mobile Number</label>
                                <input type="text" class="form-control" id="alt_mobile"  aria-describedby="inputGroupPrepend3" required="">
                                
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="district">District</label>
                                    <input type="text" class="form-control is-invalid" id="district"  required="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="upzila">Upzila</label>
                                    <input type="text" class="form-control is-invalid" id="upzila" required="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="postal_code">Postal code</label>
                                    <input type="text" class="form-control is-invalid" id="postal_code" required="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <h3>Complete your order here</h3>
        <table class="table">
            <thead>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>total</th>
                <th>Action</th>
                <th><button class="btn btn-success add_btn" style="margin-top: 10px; float: right;">Add+</button></th>
            </thead>
            <tbody class="product_tbody">
                <tr class="product_tr">
                    <td>
                        <select onchange="catChanged(this)" class="form-select form-control cat_id"
                            aria-label="Default select example">

                            <option value="">Select Category</option>
                            @foreach (\App\Models\Category::with('products')->get() as $data )

                            <option value="{{$data->id}}">{{$data->category_name}}</option>

                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select onchange="productChanged(this)" class="product_name form-control">
                            <option value="">select product</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control price" name="price[]" value="" readonly/></td>
                    <td><input type="number" class="form-control qty" name="qty[]" value="" /></td>
                    <td><input type="number" class="form-control total" name="total[]" value="" readonly/></td>
                </tr>
            </tbody>
            <tfoot>
                <td><input type="text" class="form-control" value="Total" readonly></td>
                <td><input type="text" class="form-control" readonly></td>
                <td><input type="number" class="form-control total_price" readonly></td>
                <td><input type="number" class="form-control total_qty" id="total_qty" readonly></td>
                <td><input type="number" class="form-control total_amount" id="total_amount" readonly></td>
               
            </tfoot>

        </table>

    </div>
    
        <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">

            </div>
         <div class="col-md-4">   
            <h5 class="p-1">Sub Total : </h5> <input type="number" class="form-control" id="sub-total" value="" readonly>
            <h5 class="p-1">Discount : </h5> <input type="number" class="form-control" id="discount">
            <h5 class="p-1">Total : </h5> <input type="number" class="form-control" id="total" readonly>
            <h5 class="p-1">Paid : </h5> <input type="number" class="form-control" id="paid">
            <h5 class="p-1">Due : </h5> <input type="number" class="form-control" id="due" readonly>
            <h5 class="p-1">Payment Details : </h5> <input type="text" class="form-control" id="payment_details" placeholder="provide your transaction details">
            <h5 class="p-1">Comment(Optional) : </h5> <input type="text" class="form-control" id="comment" placeholder="Give suggesstion for improving services">
         </div>
            
            
        </div>
    </div>
    </div>
    <button type="button" class="btn btn-primary btn-lg btn-block confirm_order">Confirm Order</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    // tr add 
    $('.add_btn').on('click', function () {

        let html = `<tr class="product_tr">
            <td>
                    <select onchange="catChanged(this)" class="form-select form-control cat_id" aria-label="Default select example">
                        
                        <option value="">Select Category</option>
                        @foreach (\App\Models\Category::with('products')->get() as $data )

                        <option value="{{$data->id}}" >{{$data->category_name}}</option>

                        @endforeach
                      </select>
                </td>
                <td><select onchange="productChanged(this)" class="product_name form-control" id="product_name"><option value="">select product</option></select></td>
                <td><input type="number" class="form-control price" name="price[]" value="" readonly/></td>
                <td><input type="number" class="form-control qty" name="qty[]" value="" /></td>
                <td><input type="number" class="form-control total" name="total[]" value="" /></td>
                <td><button class="btn btn-danger btn-sm del_btn">Delete</button></td>
        </tr>`;
        $('.product_tbody tr:last-child').after(html);
    });
    //tr remove 

    $(document).on('click', '.del_btn', function () {

        $(this).closest('tr').remove();

        qty();

        price();

        totalAmount();
        subTotal();
    });

    function catChanged(el) {
        //    console.log(el);


        let val = $(el).val();

        val = parseInt(val);

        catDetails(val, el);
    }

    function catDetails(cat_id, target) {

        $.get('/categoryDetails', {
                id: cat_id
            },
            function (data) {

                let jsonData = data;


                var el = $(
                        $(target).closest(".product_tr")
                    ).find(".product_name")[0];




                if (jsonData) {

                    $(el).html(`<option value="">Select Proudct</option>`);

                    jsonData.forEach(element => {

                        $(el).append(
                            `<option value="${element.id}">${element.product_name}</option>`);
                    });

                } else {
                    $(el).html(`<option value="">No product for this category</option>`);
                }
            });
    }

    function productChanged(el) {

        var test = $(el);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var price = $(el).val();


        $.ajax({
            type: 'post',
            datatype: 'JSON',
            url: "{{route('setPrice')}}",
            data: {
                id: price
            },
            success: function (data) {
                
                
                test.parent('td').next('td').children('.price').val(data.product_price);
            },
            error: function (data) {
                console.log(data);
            }
        });

    }
    //product qty input

    $(document).on('input', '.price', function () {
        price();
    });

    //product price input 

    $(document).on('input', '.qty', function () {

        price();

        totalPrice();

        totalAmount();

        qty();

        subTotal();


    });

    // Discount input

    $(document).on('input','#discount',function(){

        const discount = $("#discount").val();

        const subTotal = $("#sub-total").val();

        const total = parseFloat(subTotal - discount);

        $("#total").val(total);

        
    });
    //Paid input
    $(document).on('input','#paid',function(){

        const subTotal = $("#total").val();

        const paid = $("#paid").val();

        const due = parseFloat(subTotal - paid);

        if(due <= 0 ){
            $("#due").val(0);
        }else{
            $("#due").val(due);
        }
        
        
    });
    /// product total input 


    function qty() {

        let total = 0;

        $('.qty').each(function () {

            let own_val = $(this).val();

            if (own_val) {
                total += parseInt(own_val);
            }
         $(document).find('.total_qty').val(total);
        
        });

        

    }




    function price() {

        let total = 0;

        $('.price').each(function () {

            let own_val = $(this).val();

            if (own_val) {

                total += parseInt(own_val);

            }
            $(document).find('.total_price').val(total);
            
        });
        
    }

    function totalPrice() {

        $('.total').each(function () {

            var qty = $(this).closest('tr').find('.qty').val();

            var price = $(this).closest('tr').find('.price').val();

            if (qty != 0 && price != 0) {

                var total = parseInt(qty * price);

                $(this).val(total);

            }


        });

    }

    function totalAmount() {

        let total = 0;

        $('.total').each(function () {

            let own_balance = $(this).val();

            if (own_balance) {

                total += parseInt(own_balance);
            }
            $(document).find('.total_amount').val(total);
        });
        
    }
    function subTotal() {

        let total = 0;

    $('.total').each(function () {

    let own_balance = $(this).val();

    if (own_balance) {

        total += parseInt(own_balance);
    }
    $(document).find('#sub-total').val(total);
});

}
////........................Pass value ......................./// 
////..................multiple product id search........................//
// $(document).on('input','.product_name',function(){

//     var productIdArray = [];
    

//     $('.product_name').each(function(){

//   let productId = $(this).val();

//      productIdArray.push(productId);
            
// });
// console.log(productIdArray);

// });
//.......................multiple product id search end..................


//////////.................To input data in product order table..........................//

function ordeproducts(){

    $(document).on('input','.qty',function(){

        var productIdArray = [];
        

        var productQty = [];

        $('.product_name').each(function(){

            var productId = $(this).val();

            var qty = $(this).closest('tr').find('.qty').val();

            productIdArray.push(productId);

            productQty.push(qty);

        });
    })
}

//////.............................end for input product order table......................// 

$(document).on('click','.confirm_order',function(){

 var productArray=[];

var prows=$(".product_tr");

 for(prow of prows){

    //  var qty=$(prow).find('.qty')[0].value;

    var qty=$($(prow).find('.qty')[0]).val();

    var product_id=$($(prow).find('.product_name')[0]).val();

    productArray.push({

        product_id:product_id,
        
        qty:qty
    });
 }
 var jsonProduct = JSON.stringify(productArray);

 let customer_name = $('#name').val();

 let customer_mobile = $('#mobile').val();

 let alt_mobile = $('#alt_mobile').val();

 let district = $('#district').val();

 let upzila = $('#upzila').val();

 let postal_code = $('#postal_code').val();

 let totalProduct = $('#total_qty').val();

 let totalAmount = $('#total_amount').val();

 let discount = $("#discount").val();

 let paid = $("#paid").val();

 let payment_details = $("#payment_details").val();

 let comment = $("#comment").val();


 let address = {};

  address["District"] = district;

  address["Upzila"] = upzila;

  address["Postal_code"] = postal_code;

    if(customer_name=='' || customer_name.length < 4 ){

        alert("please provide your name with minimum 4 characters");

    }
    if(customer_mobile == ''){
        alert("please provide your mobile number");
    }
    if(customer_mobile == alt_mobile){
        alert("please give another number! This number is same");
    }
    if(district == ''){
        alert('Please provide your district name');
    }
    if (upzila == '') {

        alert('Please provide your upzila name');
    }
    if(postal_code == ''){
        alert('Please provide your postal_code ');
    }
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            datatype: 'JSON',
            url: "{{route('confirm.order')}}",
            data: {
                name:customer_name,

                mobile: customer_mobile,

                alternative_mobile: alt_mobile,

                shipping_address: address,

                product_quantity: totalProduct,

                total_amount: totalAmount,
                
                discount: discount,

                paid: paid,

                payment_details: payment_details,

                comment: comment,
                
                jsonProduct: jsonProduct

            },
            success: function (data) {
                
                console.log(data);
                // test.parent('td').next('td').children('.price').val(data.product_price);
                if(data){
                    window.alert("your order has been completed! ");
                    window.location.href = "{{ route('all.orders')}}";
                }else{
                    window.alert("Technical error try agian");
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
});
</script>
@endsection
