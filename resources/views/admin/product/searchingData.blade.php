@extends('admin.admin_master')

@section('content')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h2>Showing result</h2>

        </div>
        <div class="card-body">
            <div class="row">
                <div style="width: 100%; overflow-x: auto">
                    <table class="table display" id="myTable">

                        <thead>
                            <tr>
                                <th>SL </th>
                                <th>Category name</th>
                                <th>product_name</th>
                                <th>product_picture</th>
                                <th>product_price</th>
                                <th class="text-break" style="min-width:300px; max-width:400px;">product_details</th>
                                <th>special_price</th>
                                <th>special_price_start</th>
                                <th>special_price_end</th>
                                <th>show_in_home</th>
                                <th>show_in_home_serial </th>
                                <th>created_by</th>
                                <th>updated_by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php($i = 1)

                            @foreach($products as $product)




                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{$product->categories->category_name}}</td>

                                <td>{{$product->product_name}}</td>
                                <td><img src="{{asset($product->product_picture)}}" alt="not found" /></td>
                                <td>{{$product->product_price}}</td>
                                <td class="text-break" style="min-width:300px; max-width:400px;">
                                    <div style=" max-height:200px; overflow:auto;">{{$product->product_details}}</div>
                                </td>
                                <td>{{$product->special_price}}</td>
                                <td>{{$product->special_price_start}}</td>
                                <td>{{$product->special_price_end}}</td>
                                <td>{{$product->show_in_home}}</td>
                                <td>{{$product->show_in_home_serial}}</td>
                                <td>{{$product->createdBy->name}}</td>
                                <td>{{$product->updatedBy->name}}</td>
                                <td>
                                    <a href="{{url('admin/product/edit/'.$product->id)}}"
                                        class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('admin/product/delete/'.$product->id)}}"
                                        class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                            
                        </tbody>

                    </table>
                    {{$products->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
