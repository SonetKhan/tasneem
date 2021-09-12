@extends('admin.admin_master')

@section('content')
<div style="display:flex; align-items:center; justify-content:center">
<div class="col-md-8 ">
    <div class="card"   >
        <div class="card-header"> Add users+</div>

        <div class="card-body">

            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"> User name: </label>

                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('name')

                    <span>{{$message}}</span>

                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">User mobile no : </label>

                    <input type="text" class="form-control" name="mobile" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('mobile')

                    <span>{{$message}}</span>

                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">User password : </label>

                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('password')

                    <span>{{$message}}</span>

                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">User type : </label>

                    <input type="text" class="form-control" name="user_type" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('user_type')

                    <span>{{$message}}</span>

                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Choose status:</label>

                    <select id="status" name="user_active" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

                    </select>

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">User picture : </label>

                    <input type="file" class="form-control" name="user_picture" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    @error('user_picture')

                    <span>{{$message}}</span>

                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">add user</button>
            </form>
        </div>



    </div>

</div>
</div>
@endsection
