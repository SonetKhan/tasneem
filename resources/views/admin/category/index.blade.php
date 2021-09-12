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
                    <div class="container">

                    <div class="row">


                        <div class="col-md-8">



                            <div class="card-body">
                                <form action = "{{route('searching.data')}}" method= "GET">
                                   
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer01">Category Name : </label>
                                            <input type="text" class="form-control" name="category_name" value="">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer02">Display in menu :  </label>
                                            <select class="form-select form-control" aria-label="Default select example" name="display_in_menu">
                                                <option value="">Please Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                               
                                              </select>
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServerUsername">Display in menu order : </label>
                                            <input type="text" class="form-control" name="display_in_meu_order">
                                            
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                            </div>
                        </div>


                        <div class="col-md-4">

                            <a href="{{route('add.category')}}" class="btn btn-success float-right">Add
                                category+</a></div>

                    </div>
                </div>
                </div>

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
