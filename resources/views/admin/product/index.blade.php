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
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-input">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom">
                                    <h2>Searching Box </h2>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('result.product')}}" method="GET">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationServer01">Product name</label>
                                                <input type="text" name="product_name" class="form-control" value="">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationServer02">Product Price</label>
                                                <input type="text" name="product_price" class="form-control" value="">

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationServerUsername">Show in Home </label>
                                                <select class="form-select form-control"
                                                    aria-label="Default select example" name="show_in_home">
                                                    <option value="">Select one from here : </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                </select>

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationServerUsername">show in home serial</label>
                                                <input type="text" name="show_in_home_serial" class="form-control"
                                                    value="">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationServer03">special price</label>
                                                <input type="text" name="special_price" class="form-control" value="">

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationServer04">special price start</label>
                                                <input type="date" name="special_price_start" class="form-control"
                                                    value="">

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationServer05">special price end</label>
                                                <input type="date" name="special_price_end" class="form-control"
                                                    value="">

                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-input">
                            <a href="{{route('add.product')}}" class="btn btn-success float-right">Add
                                product+</a></div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div style="width: 100%; overflow-x: auto">
                    <table class="table display" id="myTable">

                        <thead>
                            <tr>
                                <th>SL </th>
                                <th>Category_name</th>
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
                                <td><img src="{{asset($product->product_picture)}}" alt="not found"
                                        style="border-radius: 50%;" /></td>
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

                </div>
            </div>
            {{$products->links("pagination::bootstrap-4")}}
        </div>

    </div>

</div>
</div>
</div>


@endsection
