@extends('admin.admin_master')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header"> Update Category information</div>
                                @if(session('errors'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('errors')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('success')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="card-body">


                                    <form action="{{url('admin/category/update/'.$editData->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update category name: </label>
                                            <input type="text" class="form-control" name="category_name" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp"

                                                   value="{{$editData->category_name}}">


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update category picture : </label>

                                            <input type="file" class="form-control" name="category_picture" id="exampleInputEmail1"
                                                   value=""     aria-describedby="emailHelp" >


                                        </div>
                                        <div class="form-group">
                                            <img src="{{asset($editData->category_picture)}}" alt="image not found"/>

                                            <input type="hidden" name="old_image" value="{{$editData->category_picture}}" />

                                        </div>

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Display in menu: </label>

                                            <select class="form-select form-control" aria-label="Default select example" id="exampleInputEmail1" name="display_in_menu">

                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Display in order </label>

                                            <input type="text" class="form-control" name="display_in_meu_order" id="exampleInputEmail1" value="{{$editData->display_in_meu_order}}" aria-describedby="emailHelp" >

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Updated By </label>

                                            <input type="text" class="form-control" name="updated_by" id="exampleInputEmail1" value="{{$editData->updatedBy->name}}" aria-describedby="emailHelp" readonly >


                                        </div>

                                        <button type="submit" class="btn btn-primary">Update category</button>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
