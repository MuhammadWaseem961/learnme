@extends('layouts.frontend.setting') @section('title','Bids') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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


    input[type='radio'].checked:after {
        width: 20px;
        height: 20px;
        border-radius: 15px;
        top: -4px;
        left: -1px;
        position: relative;
        background-color: #3AC574;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
        cursor: pointer;
    }

    .px-50 {
        padding-left: 50px !important;
        padding-right: 50px !important;
    }
    body{
        display: block !important;
    }

</style>
@endsection {{-- head end --}} {{-- content section start --}}
@section('navbar')

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.navbar')</section>
@include('includes.frontend.navigations')
@endsection
@section('content')


<p class="border-bottom pl-3 f-21 cl-616161">Bids</p>
<div class="table-responsive ServiceTableData px-3" id="ServiceTableData">
    <table id="example1" class="table table-hover example1">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">#</th>
                <th scope="col">{{ (Auth::user()->type=='buyer')?'Bid By':'Bid For' }}</th>
                <th scope="col">Duration</th>
                <th scope="col">Budget</th>
                <th scope="col">Status</th>
                <th scope="col">Work Status</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Payment Remaining</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(Auth::user()->type=='buyer')
                @foreach ($bids as $serviceRequest)
                    @foreach ($serviceRequest->bids as $k=>$bid)
                        @if ($bid->status == 'Approved')
                            <tr id="target_{{ $bid->id }}">
                                <td>{{ ++$k }}</td>
                                <td>{{ (Auth::user()->type=='buyer')?$bid->specialist->username : $bid->serviceRequest->user->username }}</td>
                                <td>{{ $bid->delivery }}</td>
                                <td>${{ $bid->budget }}</td>
                                <td><span class="badge badge-sm {{$bid->status == "Approved"?'badge-success':'badge-danger'}}">{{ $bid->status }}</span></td>
                                <td>
                                    @if ($bid->status == 'Approved')
                                        @if (Auth::user()->type == 'seller')
                                            <span class="badge badge-sm {{ ($bid->work_status == 'Completed')? 'badge-success':'badge-danger' }}">{{ $bid->work_status }}</span>
                                        @else
                                            @if ($bid->work_status == 'Completed')
                                                <span class="badge badge-sm badge-success">{{ $bid->work_status }}</span>
                                            @else
                                                <button class="btn btn-success btn-sm work_status" data-bid="{{ $bid->id }}"
                                                data-work_status="1"> Mark Completed </button>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($bid->status == 'Approved')
                                        @if ($bid->payment_status == "Pending")
                                            <span class="badge badge-sm badge-warning">{{ $bid->payment_status }}</span>
                                        @endif 

                                        @if ($bid->payment_status == "Partial Paid")
                                            <span class="badge badge-sm badge-info">{{ $bid->payment_status }}</span>
                                        @endif 

                                        @if ($bid->payment_status == "Paid")
                                            <span class="badge badge-sm badge-success">{{ $bid->payment_status }}</span>
                                        @endif

                                    @endif

                                </td>
                                <td>
                                    @if ($bid->status == 'Approved')
                                        ${{ $bid->budget - $bid->payment_amount }}
                                    @endif
                                </td>
                                <td style="min-width: 135px !important;">
                                    @if (Auth::user()->type=='buyer' && $bid->payment_status != "Paid" && $bid->status ==
                                    'Approved')
                                        <a href="{{route('bidPayment',$bid->id)}}" class="btn btn-success btn-sm ">payment</a>
                                    @endif

                                    @if (Auth::user()->type=='buyer' && $bid->payment_status == "Paid" && $bid->work_status == 'Completed' && $bid->review_status=='0')
                                        <div class="modal fade" tabindex="-1" role="dialog" id="review_modal{{$bid->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title ml-4">Add Review</h5>
                                                        <button type="button" class="close mr-2 close{{$bid->id}}" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: start" >
                                                        <form id="add-review-form-{{$bid->id}}">
                                                            <input type="hidden" name="review_from" value="bids" />
                                                            <input type="hidden" name="review_item_id" value="{{ $bid->id }}" />
                                                            <div class="ml-4 input-group mb-1 pt-2">
                                                                <div class="w-100"><label>Rating</label></div>
                                                                <div class="w-100">
                                                                    <fieldset class="rating">
                                                                        <input type="radio" id="mystar{{ $bid->id }}1" name="rating" value="1" onchange="ratingChange(this)"/>
                                                                        <label onclick="labelChange(this);" data-id="1" class="full" for="mystar{{ $bid->id }}1" title="Sucks big time - 1 star"></label>
                                                                        <input type="radio" id="mystar{{ $bid->id }}2" name="rating" value="2" onchange="ratingChange(this)"/>
                                                                        <label onclick="labelChange(this);" data-id="2" class="full" for="mystar{{ $bid->id }}2" title="Kinda bad - 2 stars"></label>
                                                                        <input type="radio" id="mystar{{ $bid->id }}3" name="rating" value="3" onchange="ratingChange(this)"/>
                                                                        <label onclick="labelChange(this);" data-id="3" class="full" for="mystar{{ $bid->id }}3" title="Meh - 3 stars"></label>
                                                                        <input type="radio" id="mystar{{ $bid->id }}4" name="rating" value="4" onchange="ratingChange(this)"/>
                                                                        <label onclick="labelChange(this);" data-id="4" class="full" for="mystar{{ $bid->id }}4" title="Pretty good - 4 stars"></label>
                                                                        <input type="radio" id="mystar{{ $bid->id }}5" name="rating" value="5" onchange="ratingChange(this)"/>
                                                                        <label onclick="labelChange(this);" data-id="5" class="full" for="mystar{{ $bid->id }}5" title="Awesome - 5 stars"></label>
                                                                        
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group mb-3 pt-3 ml-4 col-md-11">
                                                                    <label class="mb-2">Review Detail</label>
                                                                    <textarea type="text" class="w-100 form-control border" placeholder="Enter Message Body" name="review"></textarea>
                                                                </div>
                                                            </div>
                    
                                                            <button type="button" class="btn btn-sm btn-success ml-4" onclick="add_review(this);" data-id="{{$bid->id}}">Add</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#review_modal{{$bid->id}}"
                                        data-id="{{ $bid->id }}" data-specialist="{{ $bid->specialist_id }}">Add Review</button>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @elseif(Auth::user()->type=='seller')
                @foreach ($bids as $k=>$bid)
                    @if ($bid->status == 'Approved')
                        <tr id="target_{{ $bid->id }}">
                            <td>{{ ++$k }}</td>
                            <td>{{ (Auth::user()->type=='buyer')?$bid->specialist->username : $bid->serviceRequest->user->username }}</td>
                            <td>{{ $bid->delivery }}</td>
                            <td>${{ $bid->budget }}</td>
                            <td>
                                @if ($bid->status == "Approved")

                                <span class="badge badge-sm badge-success">{{ $bid->status }}</span>
                                @else

                                <span class="badge badge-sm badge-danger">{{ $bid->status }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($bid->status == 'Approved')
                                    @if (Auth::user()->type == 'seller')
                                        <span class="badge badge-sm {{ ($bid->work_status == 'Completed')? 'badge-success':'badge-danger' }}">{{ $bid->work_status }}</span>
                                    @else

                                        <button class="btn {{ ($bid->work_status == 'Completed')? 'btn-danger':'btn-success' }}  btn-sm work_status"
                                        data-bid="{{ $bid->id }}" data-work_status="{{ ($bid->work_status == 'Completed')? '0':'1' }}">{{ ($bid->work_status == 'Completed')? 'Mark Un-Completed':'Mark Completed' }}</button>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if ($bid->status == 'Approved')
                                    @if ($bid->payment_status == "Pending")
                                        <span class="badge badge-sm badge-warning">{{ $bid->payment_status }}</span>
                                    @endif 

                                    @if ($bid->payment_status == "Partial Paid")
                                        <span class="badge badge-sm badge-info">{{ $bid->payment_status }}</span>
                                    @endif 

                                    @if ($bid->payment_status == "Paid")
                                        <span class="badge badge-sm badge-success">{{ $bid->payment_status }}</span>
                                    @endif

                                @endif

                            </td>
                            <td>
                                @if ($bid->status == 'Approved')
                                    ${{ $bid->budget - $bid->payment_amount }}
                                @endif
                            </td>
                            <td style="min-width: 135px !important;">
                                @if (Auth::user()->type=='buyer' && $bid->payment_status != "Paid" && $bid->status ==
                                'Approved')
                                    <a href="{{route('bidPayment',$bid->id)}}" class="btn btn-success btn-sm ">payment</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="payment_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enter Detail for Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="payment_request"></div>
            </div>
        </div>
    </div>
</div>
@endsection {{-- content section end --}}
 @section('extra-script')

    <script>
        
        function labelChange(elem) {
            let e = $(elem).data("id");
            console.log("#star" + e);
            $("#star" + e).attr("checked", true);
        }

        function ratingChange(elem) {
            $(elem).addClass("checked");
            $(elem).prevAll().addClass("checked");
            $(elem).nextAll().removeClass("checked");
            $(elem).nextAll().children("input").attr("checked", false);
            $("span.checked").each(function () {
                $(this).children("input").attr("checked", true);
            });
        }

        // ajax for payment
        function payment_btn(e) {
            var specialist_id = $(e).data('specialist');
            var amount = $(e).data('amount');
            var appointment = $(e).data('id');
            var payment_for = $(e).data('payment_for');
            console.log(specialist_id,appointment,amount,payment_for)
            $('#payment_request').empty();
            $.ajax({
                type: 'get',
                url: "{{ url('stripe') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    specialist_id: specialist_id,
                    amount: amount,
                    appointment: appointment,
                    payment_for:payment_for,
                },
                success: function (data) {
                    if (data.success == true) 
                    {
                        $("#payment_request").html(data.message);
                    } 
                    else {
                        if (data.hasOwnProperty('message')) {
                            var wrapper = document.createElement('div');
                            var err = '';
                            $.each(data.message, function (i, e) {
                                err += '<p>' + e + '</p>';
                            })

                            wrapper.innerHTML = err;
                            swal({
                                icon: "error",
                                text: "{{ __('Please fix following error!') }}",
                                content: wrapper,
                                type: 'error'
                            });
                        }
                    }
                }
            })
        }
        
        $('.work_status').on('click',function(){
            var bid = $(this);
            var bid_id = $(this).data('bid');
            var work_status = $(this).attr('data-work_status');
            $.ajax({
                type: 'post',
                url: "{{ route('bid_work_status') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    bid_id: bid_id,
                    work_status:work_status,

                },
                success: function (data) {
                    if(data == 'Completed'){
                        bid.addClass('disabled')
                        swal({
                            icon: "success",
                            text: "{{ __('Work is marked as Completed and payment released it will transfer to specialist in next 7 working days Thank you!') }}",
                            icon: 'success'
                        });
                        setInterval(function(){
                            window.location = '';
                        },2000);
                    }
                }
            });
        });

        function add_review(e){
            let id = $(e).data("id");
            var myform = document.getElementById("add-review-form-" + id);
            var fd = new FormData(myform);
            fd.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('review.store') }}",
                type: "post",
                processData: false,
                contentType: false,
                data: fd,
                success: function (data) {
                    if (data.success == true) {
                        swal("success", data.message, "success").then((value) => {
                            $(".close" + id).click();
                            $(".add-review-" + id).hide();
                            window.location='';
                        });
                    } else {
                        if (data.hasOwnProperty("message")) {
                            var wrapper = document.createElement("div");
                            var err = "";
                            $.each(data.message, function (i, e) {
                                err += "<p>" + e + "</p>";
                            });

                            wrapper.innerHTML = err;
                            swal({
                                icon: "error",
                                text: "{{ __('Please fix following error!') }}",
                                content: wrapper,
                                type: "error",
                            });
                            //setTimeout("pageRedirect()", 3000);
                            //$('.actions  li:first-child a').click();
                        }
                    }
                },
            });
        }
</script>
@endsection {{-- footer section end --}}
