@extends('admin.admin_master')

@section('content')
<div class="card card-default">
    <div >
        {{-- <p class="text-right mt-n3 d-block"><a href="{{route('add.users')}}" class="btn btn-success" style="">Add User++</a></p> --}}
        <p class="text-right mt-3 d-block mr-2"><a href="{{route('add.users')}}" class="btn btn-success" style="">Add User++</a></p>
    </div>
    <div class="card-header card-header-border-bottom">

        <h2>User Information filter : </h2>  
        
    </div>

  
    <div class="card-body">
        <form action="{{route('search.data')}}" method="GET">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Name : </label>
                    <input type="text" class="form-control" name="name"  value="" >
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationServer02">Mobile</label>
                    <input type="text" class="form-control" name="mobile"   value="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationServerUsername">User type</label>
                    <select class="form-select form-control" aria-label="Default select example" name="user_type">
                        <option value="">Select from here </option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="operator">Operator</option>
                      </select>
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationServerUsername">User active</label>
                    <select class="form-select form-control" aria-label="Default select example" name="user_active">
                        <option value="">Select One from here </option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                      </select>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-md btn-block">Search Data</button>
        </form>
    </div>
</div>
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User table</h2>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="card-body">
       
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">User Type</th>
                    <th scope="col">User Active</th>
                    <th scope="col">User Picture</th>
                    <th scope="col">Action</th>

                    
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($users as $user)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->user_type}}</td>
                    @if($user->user_active == 1)
                    <td>Active</td>
                    @endif
                    @if($user->user_active == 0)
                    <td>Deactive</td>
                    @endif
                    <td><img src="{{asset($user->user_picture)}}" height="100px" width="100px" /></td>

                    <td>
                        @if(auth()->user()->user_type == 'admin')
                                        

                        @if(auth()->id()!=$user->id)
                        <a href="{{url('admin/user/edit/'.$user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{url('admin/user/delete/'.$user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    @endif 
                    @endif
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links("pagination::bootstrap-4")}}
    </div>
</div>









@endsection
