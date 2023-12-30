@extends('layouts.frontend.app')
@section('title','Bid Payment')
{{-- head start --}}

@section('extra-css')


<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/utility.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/navbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/portfolio.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.elementor-160 .elementor-element.elementor-element-125959e5 .elementor-icon {
    border-radius: 100px 100px 100px 100px;
}

.elementor-160 .elementor-element.elementor-element-125959e5 .elementor-social-icon {
    background-color: rgba(99, 115, 129, 0.5);
    --icon-padding: 1em;
}

.hide{
    display: none;
}

.elementor-icon {
    display: inline-block;
    line-height: 1;
    -webkit-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
    color: #818a91;
    font-size: 50px;
    text-align: center;
}

.dropdown-toggle::after {
    display: none;
}

.main_Tite_div {
    width: fin;
}
</style>
@endsection
{{-- head end --}}
<style>
.main_Tite {

    letter-spacing: 4px;
}

.w-fit-content {
    width: fit-content;
}

.hover1:hover {
    transform: translateY(-8px);
    transition: 0.4s linear;
}
</style>

{{-- content section start --}}

@section('content')

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">
    @include('includes.frontend.navbar')
</section>

@include('includes.frontend.navigations')

<section class="main_padding my-5">
    <form action="{{route('stripe.post')}}" id="create-order" class="my-3 require-validation needs-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ $admin->stripe_public_key }}" method="post" novalidate>
        @csrf
    
        <input type="hidden" name="specialist_id" value="{{ $bid->specialist_id }}">
        <input type="hidden" name="id" value="{{ $bid->id }}">
        <input type="hidden" name="payment_for" value="bid">
        <input type="hidden" name="amount" value="{{ $bid->budget - $bid->payment_amount }}">
        <div class="row m-0 g-0">
            <div class="col-lg-8 p_Sm-0">
                <div class="form-check p-0 d-flex align-items-center">
                    <div class="col-md-3 p_Sm-0 p-0">
                        <input class="form-check-input" type="radio" name="payment_method" value="stripe" checked onclick="paymentRadio(this, 'creditCard')"
                            id="creditCard">
                            <label class="form-check-label wsnw" for="creditCard"> <img src="{{ asset('assets/frontend/images/creditCard.png')}}" class="w-220px"
                                alt="" /></label>
                    </div>
                    {{-- <div class="col-md-9 pr-0 p-0 txt_Align_Center"><img src="{{ asset('assets/frontend/images/creditCard.png')}}" class="w-220px"
                            alt="" /></div> --}}
                </div>
                <div id="creditCardDiv" class="bg-f8f8f8  px-3 rounded shadow my-3 py-2">
                    <h5 class="cl-444444 ml-0">Secure Payment via Credit/Debit Card</h5>
                    <div class="w-75 paymentOptionForm mt-3">

                        <div class="form-group heightFifty mb-2 mt-2 ">
                            <input type="text" class="form-control card-name" id="exampleInputEmail1" placeholder="Name on Card"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group heightFifty mb-2 mt-2">
                            <input type="number" class="form-control card-number" id="exampleInputEmail1" placeholder="Card Number"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="row m-0">
                            <div class="col-lg-6 col-md-6 col-12 col-sm-12 pl-0 padding_0">
                                <div class="form-group heightFifty mb-2 mt-2">
                                    <input type="number" class="form-control card-expiry-month" id="exampleInputEmail1"
                                        placeholder="01" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;"  onfocusout="checkMonth(this);" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 col-sm-12 pr-0 padding_0">
                                <div class="form-group heightFifty mb-2 mt-2">
                                    <input type="number" class="form-control card-expiry-year" onfocusout="checkYear(this);" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" id="exampleInputEmail1" placeholder="21"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>

                        <div class="row m-0">
                            <div class="col-lg-6 col-md-6 col-12 col-sm-12 pl-0 padding_0">
                                <div class="form-group heightFifty mb-2 mt-2">
                                    <input type="number" class="form-control card-cvc" id="exampleInputEmail1" placeholder="CVC"
                                    aria-describedby="emailHelp">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- Payment Section code end -->
                <!-- Payment Section code start -->
                <div class="form-check p-0 d-flex align-items-center mt-4">
                    <div class="col-md-3 p_Sm-0 p-0">
                        <input type="radio" id="paypal" name="payment_method" value="paypal" onclick="paymentRadio(this, 'paypal')">
                        <label for="paypal" class="font-w-600" id="paypal">
                            <img class="mt-1" src="{{ asset('assets/frontend/images/paypal.png')}}" width="46" alt="">
                            {{-- <div class="col-md-9 pr-0 p-0"> <img src="{{ asset('assets/frontend/images/paypal.png')}}" width="46" alt=""></div> --}}
                        </label>
                    </div>
                    {{-- <div class="col-md-9 pr-0 p-0"> <img src="{{ asset('assets/frontend/images/paypal.png')}}" width="46" alt=""></div> --}}
                </div>
                <div id="paypalEmail" class="d-none">
                    {{-- b****************s@gmail.com --}}
                </div>

                <!-- <div class="row m-0 g-0">
                    <button class="btn bg-7E13AE text-white col-12 f-22 font-w-600" type="submit">Place
                        Order</button>
                </div> -->
            </div>
            <div class="col-lg-4 p_Sm-0">
                <div class="bg-f8f8f8 px-2 py-3">
                    <div class="d-flex w-100">
                        <div><img src="{{ asset($bid->specialist->picture)}}" style="border-radius:50%;width:80px; height:80px" alt=""></div>
                        <div class="pl-3 w-100">
                            <div class="h5 m-0 robotoMedium">{{$bid->serviceRequest->title}}</div>
                            <div class="f-18 m-0 robotoRegular"><span class="cl-3ac754 ">By:</span> {{$bid->specialist->username}}</div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom pb-3">
                    <div class="d-flex pt-3 pb-2">
                        <div class="col-lg-8  p-0 f-18 robotoMedium ">Total Service Rate</div>
                        <div class="col-lg-4 p-0 text-right f-18 robotoRegular">${{$bid->budget - $bid->payment_amount}}</div>
                    </div>
                    <div class="d-flex py-2">
                        <div class="col-lg-8 p-0 f-18 cl-a9a9a9 robotoRegular ">Specialist Rate</div>
                        <div class="col-lg-4 p-0 text-right f-18 cl-a9a9a9 robotoRegular">${{($bid->budget - $bid->payment_amount)}}</div>
                    </div>
                </div>

                <div class="d-flex py-3">
                    <div class="col-lg-8 p-0 f-18 robotoMedium ">Total </div>
                    <div class="col-lg-4 p-0 text-right f-18 robotoRegular">${{$bid->budget - $bid->payment_amount}}</div>
                </div>

                <div class="form-row row">
                    <div class="col-md-12 error form-group hide">
                        <div class="alert-danger alert">Please correct the errors and try again.</div>
                    </div>
                </div>
                @if(!Session::has('success'))
                    <button type="submit" class="btn bg-3ac574 w-100 robotoMedium  text-white">Confirm and Pay</button>
                @endif
                <div class="pt-2 text-center">SSL Secure Payment</div>
            </div>
        </div>
    </form>
</section>

@endsection

{{-- content section end --}}
{{-- footer section start --}}


@section('extra-script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>

        function checkMonth(elem){
            if($(elem).val() > 12){
                $(elem).val(12);
            }

            if($(elem).val()<=0 ){
                $(elem).val(1);
            }
        }

        function checkYear(elem){
            var date = new Date(); // date object
            var getYear =  date.getFullYear(); // get current year
            var getTwodigitYear = getYear.toString().substring(2);
            if($(elem).val() < getTwodigitYear){
                $(elem).val(getTwodigitYear);
            }
        }

        $(function () {
            var $form = $(".require-validation");
            $("form.require-validation").bind("submit", function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ["input[type=email]", "input[type=password]", "input[type=text]", "input[type=file]", "textarea"].join(", "),
                    $inputs = $form.find(".required").find(inputSelector),
                    $errorMessage = $form.find("div.error"),
                    valid = true;
                $errorMessage.addClass("hide");

                $(".has-error").removeClass("has-error");
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === "") {
                        $input.parent().addClass("has-error");
                        $errorMessage.removeClass("hide");
                        e.preventDefault();
                    }
                });

                if (!$form.data("cc-on-file") && $('input[name=payment_method]:checked').val()=='stripe') {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data("stripe-publishable-key"));
                    Stripe.createToken(
                        {
                            number: $(".card-number").val(),
                            cvc: $(".card-cvc").val(),
                            exp_month: $(".card-expiry-month").val(),
                            exp_year: $(".card-expiry-year").val(),
                        },
                        stripeResponseHandler
                    );
                }
                else{
                    $('.all-loader').removeClass('d-none');
                    $('#create-form').submit();
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $(".error").removeClass("hide").find(".alert").text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response["id"];
                    // insert the token into the form so it gets submitted to the server
                    $form.find("input[type=text]").empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $('.all-loader').removeClass('d-none');
                    $form.get(0).submit();
                }
            }
        });

        const paymentRadio=(e, sectionName)=>{
            console.log(sectionName);
            if(sectionName == 'creditCard'){
            // console.log('chal rhaa');
                $('#create-order').attr('action',"{{route('stripe.post')}}");
                $('#creditCardDiv').addClass('d-block')
                $('#creditCardDiv').removeClass('d-none')
                $('#paypalEmail').addClass('d-none')
                $('#paypalEmail').removeClass('d-block')
            }

            if(sectionName == 'paypal'){
                $('#create-order').attr('action',"{{route('paypal.payment.for.appointment')}}")
                // console.log('chal rhaa');
                $('#creditCardDiv').addClass('d-none')
                $('#creditCardDiv').removeClass('d-block')
                $('#paypalEmail').addClass('d-block')
                $('#paypalEmail').removeClass('d-none')
            }
        }

        setTimeout(() => {
        
            @if(Session::has('success'))
                swal("Payment Successful!", "{{Session::get('success')}}", "success").then((value) => { if(value){window.location = '{{route("bids.index")}}';} });
            @endif

            @if(Session::has('error'))
                swal("Payment Failed!", "{{Session::get('error')}}", "error").then((value) => {if(value){ window.location = '';}});
            @endif
            
        }, 1000);

    </script>

@endsection

{{-- footer section end --}}
