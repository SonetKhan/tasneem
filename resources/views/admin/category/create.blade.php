@extends('admin.admin_master')

@section('content')


<div class="col-md-8">
    <div class="card">

        <div class="card-header"> Add Category+</div>

        <div class="card-body">

            <form action="{{route('store.category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name: </label>

                    <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('category_name')

                    <span>{{$message}}</span>

                    @enderror
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">Category Picture: </label>

                    <input type="file" class="form-control" name="category_picture" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('category_picture')

                    <span>{{$message}}</span>

                    @enderror
                </div>

                <div class="form-group">

                    <label for="exampleInputEmail1">Display in menu: </label>

                    <select class="form-select form-control" aria-label="Default select example" id="exampleInputEmail1" name="display_in_menu">

                        <option value="Yes">Yes</option>
                        <option value="No">No</option>

                    </select>
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">Display in menu order: </label>

                    <input type="text" class="form-control" name="display_in_meu_order" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('display_in_meu_order')

                    <span>{{$message}}</span>

                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>



    </div>

    @endsection
