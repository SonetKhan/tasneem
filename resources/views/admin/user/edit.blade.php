@extends('admin.admin_master')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header"> Update user information</div>
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


                                    <form action="{{url('/admin/user/update/'.$editUser->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update user name: </label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp"

                                                   value="{{$editUser->name}}">


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update user mobile no. : </label>

                                            <input type="text" class="form-control" name="mobile" id="exampleInputEmail1"
                                                   value="{{$editUser->mobile}}"     aria-describedby="emailHelp" >


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update user's designation : </label>

                                            <input type="text" class="form-control" name="user_type" id="exampleInputEmail1"
                                                   value="{{$editUser->user_type}}"     aria-describedby="emailHelp" >


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">New Password: </label>

                                            <input type="password" class="form-control" name="new_password" id="exampleInputEmail1" value="" aria-describedby="emailHelp" >

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Confirmed Password: </label>

                                            <input type="password" class="form-control" name="new_password_confirmation" id="exampleInputEmail1" value="" aria-describedby="emailHelp" >


                                        </div>
                                        <div class="form-group">
                                            <label for="status">Choose status:</label>

                                            <select id="status" name="user_active" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Update user's Picture : </label>

                                            <input type="file" class="form-control" name="user_picture" id="exampleInputEmail1" aria-describedby="emailHelp" >

                                        </div>
                                        <div class="form-group">
                                            <img src="{{asset($editUser->user_picture)}}" alt="" height="100px" width="100px"/>

                                            <input type="hidden" name="old_image" value="{{$editUser->user_picture}}"/>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Update User</button>
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
