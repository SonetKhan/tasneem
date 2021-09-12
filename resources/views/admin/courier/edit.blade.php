@extends('admin.admin_master') 

@section('content')
 
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Basic Validation</h2>
            </div>
            <div class="card-body">
                <form action="{{url('update/courier/'.$editData->id)}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Courier Name: </label>
                            <input type="text" name="courier_name" class="form-control" id="validationServer01"  value="{{$editData->courier_name}}" required="">
                            
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Updata Courier</button>
                </form>
            </div>
        </div>
    </div>

@endsection