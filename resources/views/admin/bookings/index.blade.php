<!DOCTYPE html>
<html>

<head>
    @include('includes.frontend.admin-head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
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
        
        .smallPicture{
            height: 80px;width: 80px;
        }
    </style>
</head>

<body>
    
    <section class="main_padding pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.admin_navbar')</section>

    <section class="main_padding pt-70 px-50">
        <div class="row m-0 justify-content-center">
           
            <div class="col-md-12 col-lg-12 col-sm-12 pt-4 p-0 ml-4 box_shadow1 borderRadius-12px">
                <p class="border-bottom pl-3 f-21 cl-616161">Bookings</p>

                {{-- <p class="pl-3 f-21 cl-000000">Disputes</p> --}}
                @include('common.messages')
                <div class="table-responsive UserTableData p-3" id="UserTableData">
                    {{-- <button title="Click to Add Service" data-toggle="modal" data-target="#addUserModal"
                        class="btn btn-sm bg-3AC574 text-white m-2" style="float: right;">Add User</button> --}}
                    <div class="d-flex justify-content-center mb-3 " >
                        <div class="spinner-border  text-success d-none user-loader" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped example1">
                        <thead>
                            <tr class="text-uppercase">
                                <th scope="col">#</th>
                                <th scope="col">Booking ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Client Picture</th>
                                <th scope="col">Client </th>
                                <th scope="col">Specialist Picture</th>
                                <th scope="col">Specialist </th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Service Time</th>
                                <th scope="col">Service Date</th>
                                <th scope="col">Service Cost</th>
                                <th scope="col">Specialist Earning</th>
                                <th scope="col">Review</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Description</th>
                                <th scope="col">Payment Detail</th>
                                <th scope="col">Confirm Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($bookings->count() >0)

                                @foreach($bookings as $key => $booking)
                                    <tr>          
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $booking->id }}</td>
                                        <td><span class="badge badge-sm {{ $booking->state=='2'?'badge-info':($booking->state=='3'?'badge-success':'') }}">{{ $booking->state=='2'?'Confirmed':($booking->state=='3'?'Completed':'') }}</span></td>
                                        <td><span class="badge badge-sm {{ $booking->paystate=='1'?'badge-success':'badge-danger' }}">{{ $booking->paystate=='1'?'Paid':'Pending'}}</span></td>
                                        <td><img class="smallPicture" src="{{ $booking->user!=null?asset($booking->user->picture):asset('uploads/user/default.jpg') }}" ></td>
                                        <td>{{ $booking->user!=null?$booking->user->username:'' }}</td>
                                        <td><img class="smallPicture" src="{{ $booking->specialist!=null?asset($booking->specialist->picture):asset('uploads/user/default.jpg') }}" ></td>
                                        <td>{{ $booking->specialist!=null?$booking->specialist->username:'' }}</td>
                                        <td>{{ $booking->service_name}}</td>
                                        <td>{{ $booking->service_time}} minute</td>
                                        <td>{{ $booking->service_date!=null?date('M/d/Y h:i a',$booking->service_date/1000):'' }}</td>
                                        <td>${{ $booking->service_cost}}</td>
                                        <td>${{  $booking->specialist_earning!=null?$booking->specialist_earning:($booking->service_cost-$booking->service_cost*($fee!=null?$fee->fee:20)/100)}}</td>
                                        <td>{{ $booking->review }}</td>
                                        <td>{{ $booking->rating }}</td>
                                        <td>{{ Str::limit($booking->description,50,".....") }}</td>
                                        <td>
                                            @if($booking->paymentDetails->count() >0)
                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#paymentDetailModal" onclick="bookingPaymentDetail('{{ $booking->id }}')">Details</button>
                                            @endif
                                        </td>
                                        <td id="test{{$booking->id}}"><input type="checkbox" onchange="changePaymentStatus(this);" data-id="{{ $booking->id }}" value="{{$booking->paystate=='1'?0:1}}" data-msg="{{$booking->paystate=='1'?'Do you want to un confirm the payment...?':'Do you want to confirm the payment...?'}}" class="change_payment_status" @if($booking->paystate=='1') checked @endif id="checkbox{{$booking->id}}"></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="paymentDetailModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content pl-5 pr-5 pt-3 ">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th scope="col">#</th>
                                            <th scope="col">Method</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="paymentDetailTable">
                                        
                                    </tbody>
                                </table>
                            </div>
                        
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
            </div>
        </div>
    </section>
    
    @include('includes.admin.footer')

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('assets/admin/dist/js/custome.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(".blah").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                $("#avatar_form").submit();
            }
        }
        
        function bookingPaymentDetail(id){
            $.ajax({
                url:"{{ route('booking.payment.detail') }}",
                type:"get",
                data:{id:id},
                success:function(data){
                    $('#paymentDetailTable').html(data);
                }
            });
        }

        @if(Auth::check())
                setInterval(function(){
                    $.ajax({
                        url:"{{ route('admin.user.dispute.notification') }}",
                        type:"get",
                        success:function(data){
                            var html ='';
                            // if(data.length>0){ $('.messageDropdown').children('span').addClass('green-dot'); }else{$('.messageDropdown').children('span').removeClass('green-dot');}
                            data.map(v=>{
                                var element = document.getElementById("dispute"+v.id);
                                if(typeof(element) == 'object' && element == null){
                                    html += '<a class="dropdown-item d-flex row m-0 pt-2"  id="dispute'+v.id+'" href="'+v.url+'">';
                                        html+='<div class="col-md-2 p-0">';
                                            html +='<img src="'+v.avatar+'" alt="miss" class="img-fluid">';
                                        html+='</div>';
                                        html+='<div class="col-md-9 pl-2 pt-1 p-0">';
                                            html+='<div class="row m-0"><div class="dropdown-heading">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                            html+='<div class="row m-0"><div class="dropdown-contnt">'+v.subject+'</div></div>';
                                        html+='</div>';
                                    html+="</a>";
                                } 
                            });
                            
                            $('#nav-profile').append(html);
                        }
                    });

                },1000);

                window.onload = function() {
                    $.ajax({
                        url:"{{ route('chat.user.update',Auth::user()->id) }}",
                        type:"get",
                        success:function(data)
                        {
                            console.log(data);
                        }
                    });
                }

                setInterval(function(){
                    $.ajax({
                        url:"{{ route('chat.user.update',Auth::user()->id) }}",
                        type:"get",
                        success:function(data)
                        {
                            console.log(data);
                        }
                    });
                },10000);

            @endif

    </script>

    <script>
        function changePaymentStatus(elem){
            var user = $(elem);
            var id = user.data('id');
            var status = user.val();
            var msg = user.data('msg');
            swal({
                title: "Are you sure?",
                text: msg,
                icon: "warning",
                buttons: {
                    cancel: "No",
                    confirm: "Yes"
                    },
            }).then((willConfirm) => {
                    if (willConfirm)
                    {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('admin.confirm.payment') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id:id,
                                status:status
                            },
                            success: function (response) {
                                // $('#checkbox'+response.data.id).attr('value',response.data.paystate==1?0:1);
                                // var msg = '';
                                // response.data.paystate==1?msg='Do you want to un confirm the payment...?':msg='Do you want to confirm the payment...?';
                                // $('#checkbox'+response.data.id).data('msg',msg);
                                // $('#test'+response.data.id).html("test");
                                swal({
                                    icon: "success",
                                    text: "{{ __('Payment status has been updated successfully') }}",
                                    icon: 'success'
                                });
                                setInterval(function(){
                                    window.location = '';
                                },2000)
                            }
                        });
                    } 
            });
        
        }

        setInterval(function(){
            $.ajax({
                url:"{{ route('admin.user.dispute.notification') }}",
                type:"get",
                success:function(data){
                    var html ='';
                    // if(data.length>0){ $('.messageDropdown').children('span').addClass('green-dot'); }else{$('.messageDropdown').children('span').removeClass('green-dot');}
                    data.map(v=>{
                        var element = document.getElementById("dispute"+v.id);
                        if(typeof(element) == 'object' && element == null){
                                html += '<a class="dropdown-item d-flex row m-0 pt-2"  id="dispute'+v.id+'" href="'+v.url+'">';
                                html+='<div class="col-md-2 p-0">';
                                    html +='<img src="'+v.avatar+'" alt="miss" class="img-fluid">';
                                html+='</div>';
                                html+='<div class="col-md-9 pl-2 pt-1 p-0">';
                                    html+='<div class="row m-0"><div class="dropdown-heading">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                    html+='<div class="row m-0"><div class="dropdown-contnt">'+v.subject+'</div></div>';
                                html+='</div>';
                            html+="</a>";
                        } 
                    });
                    
                    let oldHtml = $('#nav-profile').html();
                    oldHtml+=html;
                    $('#nav-profile').html(oldHtml);
                }
            });

            $.ajax({
                url:"{{ route('admin.dispute.reply.notification') }}",
                type:"get",
                success:function(data){
                    var html ='';
                    // if(data.length>0){ $('.messageDropdown').html('Messages <span class="mt-1 ml-2 green-dot"></span>'); }else{$('.messageDropdown').html('Messages <span class="mt-1 ml-2"></span>');}
                    data.map(v=>{
                        var element = document.getElementById("dispute"+v.id);
                        if(typeof(element) == 'object' && element == null){
                            html += '<a class="dropdown-item d-flex row m-0 pt-2"  id="dispute'+v.id+'" href="'+v.url+'">';
                                html+='<div class="col-md-2 p-0">';
                                    html +='<img src="'+v.avatar+'" alt="miss" class="img-fluid">';
                                html+='</div>';
                                html+='<div class="col-md-9 pl-2 pt-1 p-0">';
                                    html+='<div class="row m-0"><div class="dropdown-heading">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                    html+='<div class="row m-0"><div class="dropdown-contnt">'+v.subject+'</div></div>';
                                html+='</div>';
                            html+="</a>";
                        }
                    });
                    let oldHtml = $('#nav-profile').html();
                    oldHtml+=html;
                    $('#nav-profile').html(oldHtml);
                }
            });

        },1000);

    </script>

    <script>
        $(function () {
                $(".select2").select2();
            $(".example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    "scrollX": true,
                    // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo(".dataTables_wrapper .col-md-6:eq(0)");
            
        });
    </script>
</body>

</html>