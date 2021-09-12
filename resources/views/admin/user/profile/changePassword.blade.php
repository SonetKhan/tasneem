@extends('admin.admin_master')

@section('content')

    <div class="content-wrapper">
        <div class="content">							<div class="bg-white border rounded">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-xl-3">
                        <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                            <div class="card text-center widget-profile px-0 border-0">
                                <div class="card-img mx-auto rounded-circle">
                                    <img src="{{asset($profile->user_picture)}}" alt="user image">
                                </div>
                                <div class="card-body">
                                    <h4 class="py-2 text-dark">{{$profile->name}}</h4>
                                    <p>{{$profile->mobile}}</p>
                                    <a class="btn btn-primary btn-pill btn-lg my-4" href="#">Follow</a>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="contact-info pt-4">
                                <h5 class="text-dark mb-1">Contact Information</h5>

                                <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                                <p>{{$profile->mobile}}</p>

                                <p class="text-dark font-weight-medium pt-4 mb-2">Designation</p>
                                <p>{{$profile->user_type}}</p>

                                @if($profile->user_active == 1)
                                    <p class="text-dark font-weight-medium pt-4 mb-2">Designation</p>
                                    <p>Active</p>


                                @else
                                    <p class="text-dark font-weight-medium pt-4 mb-2">Designation</p>
                                    <p>Inactive</p>
                                @endif



                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="profile-content-right py-5">
                            <div class="tab-content px-3 px-xl-5" id="myTabContent">
                                <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                                    <div class="row">
                                        @if(session('errors'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>{{session('errors')}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <form action="{{url('/admin/user/profile/change/password/'.auth()->user()->id)}}" method="Post" >
                                            @csrf
                                            <div class="col-md-10">
                                                <div class="form-row mb-3">
                                                    <label for="validationServerUsername">Current Password</label>
                                                    <input type="password" name ="current_password" value="" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3">

                                                </div>
                                                <div class="form-row mb-3">
                                                    <label for="validationServerUsername">New Password</label>
                                                    <input type="password" name="new_password" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3">
                                                </div>
                                                <div class="form-row mb-3">
                                                    <label for="validationServerUsername">Confirm Password</label>
                                                    <input type="password" name="new_password_confirmation" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3">
                                                </div>


                                                <button type="submit" class="btn btn-success">Update Password</button>
                                            </div>
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



