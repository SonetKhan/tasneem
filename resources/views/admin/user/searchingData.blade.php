@extends('admin.admin_master')

@section('content')



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('success')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="card-header">All User: <a href="{{route('add.users')}}" class="btn btn-success btn-sm float-right">Add users+</a></div>
                                <div class="card-header">
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="5%">SL </th>
                                        <th scope="col" width="10%">Name</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @php($i=1)

                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>

                                            <td>{{$user->name}}</td>

                                            <td>Hide</td>



                                            <td>{{$user->mobile}}</td>

                                            <td><img src="{{asset($user->user_picture)}}" alt="" height="100px" width="100px"/></td>

                                            <td>{{$user->user_type}}</td>

                                            @if($user->user_active == 1)

                                             <td>Active</td>
                                            @else
                                                <td>Inactive</td>
                                            @endif

                                            <td>
                                                @if(auth()->user()->user_type == 'admin')

                                                    @if(auth()->id()!=$user->id)

                                                    <a href="{{url('admin/user/edit/'.$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{url('admin/user/delete/'.$user->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</a>
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

                    </div>

                </div>
            </div>







        </div>

    </div>






@endsection
