@extends('layouts.admin.admin') @section('title','Users') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
<style type="text/css">
    .dropdown-toggle::after {
        display: none;
    }

    body {
        background-image: none;
    }

    .nav-pills .nav-link.active {
        background-color: #3ac574 !important;
    }

    .px-50 {
        padding-left: 50px !important;
        padding-right: 50px !important;
    }

    .swal-button--confirm {background-color: #3ac574; border:none;outline: none;}
    .swal-button:active {background-color: #3ac574; border:none;outline: none;}
    

</style>
@endsection {{-- head end --}} {{-- content section start --}}
@section('navbar')

<section class="main_padding pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.admin_navbar')</section>
@endsection
@section('content')

    @php
        function imageExists($filePath)
        {
            $header_response = get_headers($filePath, 1);
            return strpos($header_response[0], "404") !== false ? false:true;
        }
    @endphp

    <p class="border-bottom pl-3 f-21 cl-616161">Edit Your Personal Settings</p>

    <p class="pl-3 f-21 cl-000000">Users</p>
    @include('common.messages')

    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a class="nav-link active cl-000000" data-toggle="tab" href="#pending">Pending</a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link cl-000000" data-toggle="tab" href="#buyer">Buyer</a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link cl-000000" data-toggle="tab" href="#seller">Seller</a>
        </li>
    
    </ul>

    <div class="tab-content">
        <div class="tab-pane active container" id="pending">
            <div class="table-responsive UserTableData p-3" id="UserTableData">
                <div class="d-flex justify-content-center mb-3 " >
                    <div class="spinner-border  text-success d-none user-loader" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-striped example1">
                    <thead>
                        <tr class="text-uppercase">
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">User Type</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Country</th>
                            <th scope="col">Time Zone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingSeller as $key => $user)
                            <tr id="target_{{ $user->id }}">
                                            
                                <td>{{ $key+1 }}</td>
                                
                                <td><img style="height: 118px; width: 118px;" src="{{ ($user->thumbnail != null) ? imageExists($user->thumbnail)? $user->thumbnail :asset('uploadfiles/userphoto/default.jpg'): asset('uploadfiles/userphoto/default.jpg') }}" alt="" srcset=""></td>
                                <td>{{ $user->type }}</td>
                                <td >{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{{ $user->timezone }}</td>
                                <td> <span class="badge badge-sm {{ ($user->approve == '1')? 'badge-success':'badge-danger' }} badge-{{ $user->id }}">{{ ($user->approve== '1')? 'active':'inactive '}}</span></td>
                                
                                <td style="min-width: 135px !important;">
                                    <button onclick="updateStatus(this);" class="btn {{ ($user->approve== '1')? 'btn-danger':'btn-success' }}  btn-sm change_status" data-msg="Do you want to {{ ($user->approve== '1')? 'in active '.$user->username:'active '.$user->username }} ?" data-user="{{ $user->id }}" data-status="{{ ($user->approve == '1')? '0':'1' }}">{{ ($user->approve == '1')? 'Inactive':'Activate' }}</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
        <div class="tab-pane container" id="buyer">
            <div class="table-responsive UserTableData p-3" id="UserTableData">
                <div class="d-flex justify-content-center mb-3 " >
                    <div class="spinner-border  text-success d-none user-loader" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-striped example1">
                    <thead>
                        <tr class="text-uppercase">
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">User Type</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Country</th>
                            <th scope="col">Time Zone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buyer as $key => $user)
                            <tr id="target_{{ $user->id }}">
                                            
                                <td>{{ $key+1 }}</td>
                                
                                <td><img style="height: 118px; width: 118px;" src="{{ asset($user->picture!=''?$user->picture:url('/uploadfiles/userphoto/default.jpg')) }}" alt="" srcset=""></td>
                                <td>{{ $user->type }}</td>
                                <td >{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{{ $user->timezone }}</td>
                                <td> <span class="badge badge-sm {{ ($user->approve == '1')? 'badge-success':'badge-danger' }} badge-{{ $user->id }}">{{ ($user->approve== '1')? 'active':'inactive '}}</span></td>
                                
                                <td style="min-width: 135px !important;">
                                    <button onclick="updateStatus(this);" class="btn {{ ($user->approve== '1')? 'btn-danger':'btn-success' }}  btn-sm change_status" data-msg="Do you want to {{ ($user->approve== '1')? 'in active '.$user->username:'active '.$user->username }} ?" data-user="{{ $user->id }}" data-status="{{ ($user->approve == '1')? '0':'1' }}">{{ ($user->approve == '1')? 'Inactive':'Activate' }}</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
        <div class="tab-pane container" id="seller">
            <div class="table-responsive UserTableData p-3" id="UserTableData">
                <div class="d-flex justify-content-center mb-3 " >
                    <div class="spinner-border  text-success d-none user-loader" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-striped example1">
                    <thead>
                        <tr class="text-uppercase">
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">User Type</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Country</th>
                            <th scope="col">Time Zone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seller as $key => $user)
                            <tr id="target_{{ $user->id }}">
                                            
                                <td>{{ $key+1 }}</td>
                                
                                <td><img style="height: 118px; width: 118px;" src="{{ ($user->thumbnail != null) ? imageExists($user->thumbnail)? $user->thumbnail :asset('uploadfiles/userphoto/default.jpg'): asset('uploadfiles/userphoto/default.jpg') }}" alt="" srcset=""></td>
                                <td>{{ $user->type }}</td>
                                <td >{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{{ $user->timezone }}</td>
                                <td> <span class="badge badge-sm {{ ($user->approve == '1')? 'badge-success':'badge-danger' }} badge-{{ $user->id }}">{{ ($user->approve== '1')? 'active':'inactive '}}</span></td>
                                
                                <td style="min-width: 135px !important;">
                                    <button onclick="updateStatus(this);" class="btn {{ ($user->approve== '1')? 'btn-danger':'btn-success' }}  btn-sm change_status" data-msg="Do you want to {{ ($user->approve== '1')? 'in active '.$user->username:'active '.$user->username }} ?" data-user="{{ $user->id }}" data-status="{{ ($user->approve == '1')? '0':'1' }}">{{ ($user->approve == '1')? 'Inactive':'Activate' }}</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>

    

    <!-- Modal For Adding User-->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalArea" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalArea" style="font-size: 18px !important;">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('dashboard/users') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input id="name" type="text" class="form-control text-capitalize" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Enter User Name" />
                        </div>
                        <div class="custom-control custom-switch d-flex">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" checked>
                            <label class="custom-control-label p-0 m-0" for="customSwitch1">Active</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md bg-3AC574 text-white"> Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal For Editing User-->
    <div class="modal fade editUserModal" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUseredit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelUseredit" style="font-size: 18px !important;">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="requestUserData"></div>
            </div>
        </div>
    </div>

    <!-- Modal For Deleting User-->
    <div class="modal fade deleteUserModal" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUserdelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelUserdelete" style="font-size: 18px !important;">Delete Confirmation !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure, you want to delete this User?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">No, Cancel</button>
                    <button type="button" class="btn btn-md bg-3AC574 text-white deleteUserBtn" id="deleteUserBtn">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('extra-script')
    <script>
        function updateStatus(elem){
            var user = $(elem);
            var user_id = $(elem).data('user');
            var badge = $('.badge-'+user_id);
            
            var msg = $(elem).data('msg');
            var status = $(elem).attr('data-status');
            swal({
                title: "Are you sure?",
                text: msg,
                icon: "warning",
                buttons: {
                    cancel: "No",
                    confirm: "Yes"
                    },
            }).then((willDelete) => {
                    if (willDelete)
                    {
                        $.ajax({
                            type: 'post',
                            url: "{{ url('admin/users/') }}"+"/"+user_id,
                            data: {
                                _token: '{{ csrf_token() }}',
                                user_id: user_id,
                                status:$(elem).attr('data-status'),
                            _method:" put"
                            
                            },
                            beforeSend:function(){
                                $(".user-loader").removeClass('d-none');
                            },
                            success: function (data) {
                                $(".user-loader").addClass('d-none');
                                if(data == '1'){
                                    $('.badge-'+user_id).removeClass('badge-danger').addClass('badge-success').text('active');
                                    // $('.badge-'+user_id).addClass('badge-success');
                                    // $('.badge-'+user_id).text('active');
                                    user.removeClass('btn-success').addClass('btn-danger');
                                    user.text('Inactive')
                                    user.attr('data-status','inactive')
                                    swal({
                                        icon: "success",
                                        text: "{{ __('User Activated Successfully') }}",
                                        icon: 'success'
                                    });
                                }if(data == '0'){
                                    $('.badge-'+user_id).removeClass('badge-success').addClass('badge-danger').text('inactive');
                                    // $('.badge-'+user_id).addClass('badge-danger');
                                    // $('.badge-'+user_id).text('inactive');
                                    user.attr('data-status','active')
                                    user.removeClass('btn-danger').addClass('btn-success');
                                    user.text('Activate')
                                    swal({
                                        icon: "success",
                                        text: "{{ __('User In-Activated Successfully') }}",
                                        icon: 'success'
                                    });

                                }
                                window.location = '';
                            }
                        });
                    } 
            });
        
        }

    </script>
@endsection