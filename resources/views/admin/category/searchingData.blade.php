@extends('admin.admin_master')

@section('content')

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
                <div class="card-header">

                    <h2>Showing result</h2>

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">SL </th>
                            <th scope="col">Cat Name</th>
                            <th scope="col">Cat Picture</th>
                            <th scope="col">Display in menu</th>
                            <th scope="col">Display in menu order</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Updated By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php($i = 1)

                        @foreach($catData as $data)

                        <tr>
                            <th scope="row">{{$i++}}</th>

                            <td>{{$data->category_name}}</td>

                            <td><img src="{{asset($data->category_picture)}}" alt="" /></td>

                            <td>{{$data->display_in_menu}}</td>

                            <td>{{$data->display_in_meu_order}}</td>
                            <td>{{$data->createdBy->name}}</td>
                            <td>{{$data->updatedBy->name}}</td>
                            <td>
                                <a href="{{url('admin/category/edit/'.$data->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{url('admin/category/delete/'.$data->id)}}"
                                    class="btn btn-danger btn-sm">Remove</a>
                            </td>

                        </tr>
                        @endforeach



                    </tbody>

                </table>
                {{$catData->links("pagination::bootstrap-4")}}     
            </div>

        </div>

    </div>

</div>

@endsection
