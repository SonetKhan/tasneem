@extends('admin.admin_master')

@section('content')
<div class="container">
  <a href="{{route('add.courier')}}" class="btn btn-success" style="float:right; margin-bottom: 20px">Add Courier++</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Courier Name: </th>
            <th scope="col">CreatedBy: </th>
            <th scope="col">UpdatedBy: </th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @php($i=1)
            @foreach($courier as $data)
          <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$data->courier_name}}</td>
            <td>{{$data->createdBy->name}}</td>
            <td>{{$data->updatedBy->name}}</td>
            <td>
                <a href="{{url('edit/courier/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{url('delete/courier/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      {{$courier->links("pagination::bootstrap-4")}}
</div>
@endsection