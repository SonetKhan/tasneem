@extends('admin.admin_master')

@section('content')


    <div class="col-md-8">
        <div class="card">

            <div class="card-header">Update Product</div>

            <div class="card-body">

                <form action="{{url('admin/product/update/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <label for="exampleInputEmail1">Select Category: </label>

                        <select class="form-select form-control" name="category_id" aria-label="Default select example">
                            <option selected value={{$product->category_id}}>{{$product->categories->category_name}}</option>
                            
                          </select>
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">Product_name: </label>

                        <input type="text" class="form-control" value="{{$product->product_name}}" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" >

                        @error('product_name')

                        <span>{{$message}}</span>

                        @enderror
                    </div>

                    <div class="form-group">

                        <label for="exampleInputEmail1">product_picture: </label>

                        <input type="file" class="form-control" name="product_picture" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">Product_price: </label>

                        <input type="text" class="form-control" value="{{$product->product_price}}" name="product_price" id="exampleInputEmail1" aria-describedby="emailHelp" >

                        @error('product_price')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="w3review">Products Details</label>

                        <textarea id ="w3review" class="form-control" name="product_details">{{$product->product_details}}

                        </textarea>

                        @error('product_details')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">special_price : </label>

                        <input type="text" class="form-control" value="{{$product->special_price}}" name="special_price" id="exampleInputEmail1" aria-describedby="emailHelp"  >

                        @error('special_price ')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">special_price_start : </label>

                        <input type="date" class="form-control" value="{{$product->special_price_start}}" name="special_price_start" id="exampleInputEmail1" aria-describedby="emailHelp"  >

                        @error('special_price_start')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">special_price_end : </label>

                        <input type="date" class="form-control" value="{{$product->special_price_end}}" name="special_price_end" id="exampleInputEmail1" aria-describedby="emailHelp"  >

                        @error('special_price_end')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">show_in_home : </label>



                        <select class="form-select form-control" aria-label="Default select example" id="exampleInputEmail1" name="show_in_home">

                            <option value="Yes">Yes</option>
                            <option value="No">No</option>

                        </select>


                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">show_in_home_serial : </label>

                        <input type="text" class="form-control" value="{{$product->show_in_home_serial}}" name="show_in_home_serial" id="exampleInputEmail1" aria-describedby="emailHelp" >

                        @error('show_in_home_serial')

                        <span>{{$message}}</span>

                        @enderror
                    </div>

                    <div class="form-group">

                        <label for="exampleInputEmail1">updated_by: </label>

                        <input type="text" class="form-control" value="{{$product->updatedBy->name}}" name="updated_by" id="exampleInputEmail1" aria-describedby="emailHelp" >

                        @error('updated_by ')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>



        </div>

@endsection
