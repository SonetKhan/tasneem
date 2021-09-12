@extends('admin.admin_master')
<?php 
use Illuminate\Support\Facades\DB;

$categories = DB::table('categories')->get();

?>

@section('content')


    <div class="col-md-8">
        <div class="card">

            <div class="card-header"> Add Product+</div>

            <div class="card-body">

                <form action="{{url('admin/product/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <label for="exampleInputEmail1">Select Category: </label>

                       

                        <select class="form-select form-control" aria-label="Default select example" name="category_id">
                            
                            <option selected>Open this select menu</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->category_name}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">Product_name: </label>

                        <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" >

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

                        <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" aria-describedby="emailHelp" >

                        @error('product_price')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="w3review">Products Details</label>

                        <textarea id ="w3review" class="form-control" name="product_details">

                        </textarea>

                        @error('product_details')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">special_price : </label>

                        <input type="text" class="form-control" value="" name="special_price" id="exampleInputEmail1" aria-describedby="emailHelp"  >

                        @error('special_price ')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">special_price_start : </label>

                        <input type="date" class="form-control" value="" name="special_price_start" id="exampleInputEmail1" aria-describedby="emailHelp"  >

                        @error('special_price_start')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1">special_price_end : </label>

                        <input type="date" class="form-control" value="" name="special_price_end" id="exampleInputEmail1" aria-describedby="emailHelp"  >

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

                        <input type="text" class="form-control" value="" name="show_in_home_serial" id="exampleInputEmail1" aria-describedby="emailHelp" >

                        @error('show_in_home_serial')

                        <span>{{$message}}</span>

                        @enderror
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>



        </div>

@endsection
