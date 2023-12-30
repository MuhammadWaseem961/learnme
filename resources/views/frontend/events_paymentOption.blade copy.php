@extends('layouts.frontend.app')
@section('title','Events')
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
    {{-- <nav class="navbar navbar-expand-lg navbar-light p-0">
        <a class="navbar-brand" href="#"
          ><img
            src="{{ asset('assets/frontend/images/navlogo.png') }}"
    alt="navbar logo"
    class="img-fluid"
    /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0 bg-transparent border rounded">
            <input class="form-control mr-sm-2 w-18 bg-transparent text-white border-0" type="search"
                value="what are you looking for ?" aria-label="Search" />
            <img src="{{ asset('assets/frontend/images/search2.png') }}" alt="" class="img-fluid p-2 search-img" />
        </form>
        <ul class="navbar-nav ml-auto d-flex align-self-center f-20">
            <li class="nav-item col-md-2">
                <a class="nav-link cl-white" href="#">Blog <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item col-md-3 p-0">
                <a class="nav-link cl-white" href="#">About us</a>
            </li>
            <li class="nav-item dropdown col-md-3 p-0">
                <a class="nav-link cl-white" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="">
                    Messages
                    <span class="green-dot mt-1 ml-2"></span>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                    <nav>
                        <div class="nav nav-tabs row m-0" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link  col-md-6 text-center" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                Notifications</a>
                            <a class="nav-item nav-link active col-md-6 text-center" id="nav-home-tab" data-toggle="tab"
                                href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inbox</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            ...
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <a class="dropdown-item d-flex row m-0 pt-2" href="#">
                                <div class="col-md-2 p-0">
                                    <img src="{{ asset('assets/frontend/images/GettyImages-1136599956-hair-stylist-1200x630-min.png') }}"
                                        alt="" class="img-fluid" />
                                    <span class="green-dot ml--1 mt-1"></span>
                                </div>
                                <div class="col-md-6 pl-2 pt-1 p-0">
                                    <div class="row m-0">
                                        <div class="dropdown-heading">Heading is here</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="dropdown-contnt">
                                            there is some text below heading
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-0">
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="green-dot-nmbr">3</span>
                                    </div>
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="dropdown-contnt">3:34 pm</span>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex row m-0 pt-2" href="#">
                                <div class="col-md-2 p-0">
                                    <img src="{{ asset('assets/frontend/images/GettyImages-1136599956-hair-stylist-1200x630-min.png') }}"
                                        alt="" class="img-fluid" />
                                    <span class="green-dot ml--1 mt-1"></span>
                                </div>
                                <div class="col-md-6 pl-2 pt-1 p-0">
                                    <div class="row m-0">
                                        <div class="dropdown-heading">Heading is here</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="dropdown-contnt">
                                            there is some text below heading
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-0">
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="green-dot-nmbr">3</span>
                                    </div>
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="dropdown-contnt">3:34 pm</span>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex row m-0 pt-2" href="#">
                                <div class="col-md-2 p-0">
                                    <img src="{{ asset('assets/frontend/images/navlogo.png') }}" alt=""
                                        class="img-fluid" />
                                    <span class="green-dot ml--1 mt-1"></span>
                                </div>
                                <div class="col-md-6 pl-2 pt-1 p-0">
                                    <div class="row m-0">
                                        <div class="dropdown-heading">Heading is here</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="dropdown-contnt">
                                            there is some text below heading
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-0">
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="green-dot-nmbr">3</span>
                                    </div>
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="dropdown-contnt">3:34 pm</span>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex row m-0 pt-2" href="#">
                                <div class="col-md-2 p-0">
                                    <img src="{{ asset('assets/frontend/images/navlogo.png') }}" alt=""
                                        class="img-fluid" />
                                    <span class="green-dot ml--1 mt-1"></span>
                                </div>
                                <div class="col-md-6 pl-2 pt-1 p-0">
                                    <div class="row m-0">
                                        <div class="dropdown-heading">Heading is here</div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="dropdown-contnt">
                                            there is some text below heading
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-0">
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="green-dot-nmbr">3</span>
                                    </div>
                                    <div class="row m-0 justify-content-end mt-1">
                                        <span class="dropdown-contnt">3:34 pm</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="dropdown-footer mt-5">
                            <div class="bg-3ac574 row m-0 pt-2 pb-3">
                                <div class="col-md-6 d-flex p-0 pl-4">
                                    <div><i class="fa fa-cog text-white" aria-hidden="true"></i></div>
                                    <div><i class="fa fa-volume-up text-white pl-2" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-6 p-0 pr-3 text-white text-right">
                                    <h6>See all in inbox</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item col-md-2">
                <a class="nav-link cl-white " href="#">Spa</a>
            </li>
            <li class="nav-item col-md-2 ">
                <a class="nav-link" href="#"><img
                        src="{{ asset('assets/frontend/images/55881685_1284744685011014_8335587762602246144_n.png') }}"
                        alt="" class="img-fluid w-75" /></a>
            </li>
        </ul>
    </div>
    </nav> --}}
    @include('includes.frontend.navbar')
</section>



@include('includes.frontend.navigations')




<section class="main_padding my-5">
    <div class="row m-0 g-0">
        <div class="col-lg-8 p_Sm-0">
            <div class="form-check p-0 d-flex align-items-center">
                <div class="col-md-3 p_Sm-0 p-0">
                    <input class="form-check-input" type="radio" name="payment_method" checked onclick="paymentRadio(this, 'creditCard')"
                        id="creditCard">
                    <label class="form-check-label wsnw" for="creditCard"> Credit & DebitCard</label>
                </div>
                <div class="col-md-9 pr-0 p-0 txt_Align_Center"><img src="{{ asset('assets/frontend/images/creditCard.png')}}" class="w-220px"
                        alt="" /></div>
            </div>
            <div id="creditCardDiv" class="bg-f8f8f8  px-3 rounded shadow my-3 py-2">
                <h5 class="cl-444444 ml-0">Secure Payment via Credit/Debit Card</h5>
                <form action="" class="w-75 paymentOptionForm   my-3">
                    <div class="form-group heightFifty mb-0 ">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Name on Card"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted invisible">We'll never share your email with
                            anyone
                            else.</small>
                    </div>
                    <div class="form-group heightFifty mb-0 ">
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Card Number"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted invisible">We'll never share your email with
                            anyone
                            else.</small>
                    </div>
                    <div class="row m-0">
                        <div class="col-lg-6 col-md-6 col-12 col-sm-12 pl-0 padding_0">
                            <div class="form-group heightFifty mb-0 ">
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    placeholder="Expiration Date" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted invisible">We'll never share your
                                    email with anyone
                                    else.</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 col-sm-12 pr-0 padding_0">
                            <div class="form-group heightFifty mb-0 ">
                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="CVC"
                                    aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted invisible">We'll never share your
                                    email with anyone
                                    else.</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-0 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Save as Drafts</label>
                    </div>


                </form>
            </div>
            <!-- Payment Section code end -->
            <!-- Payment Section code start -->
            <div class="form-check p-0 d-flex align-items-center">
                <div class="col-md-3 p_Sm-0 p-0">
                    <input type="radio" id="paypal" name="payment_method" onclick="paymentRadio(this, 'paypal')">
                    <label for="paypal" class="font-w-600" id="paypal">PayPal</label>
                </div>
                <div class="col-md-9 pr-0 p-0"> <img src="{{ asset('assets/frontend/images/paypal.png')}}" width="46" alt=""></div>
            </div>
            <div id="paypalEmail" class="d-none">b****************s@gmail.com</div>

            <!-- <div class="row m-0 g-0">
                <button class="btn bg-7E13AE text-white col-12 f-22 font-w-600" type="submit">Place
                    Order</button>
            </div> -->
        </div>
        <div class="col-lg-4 p_Sm-0">
            <div class="bg-f8f8f8 px-2 py-3">
                <div class="d-flex w-100">
                    <div><img src="{{ asset('assets/frontend/images/Intersection-1.png')}}" alt=""></div>
                    <div class="pl-3 w-100">
                        <div class="h5 m-0 robotoMedium">Software Engineer Services</div>
                        <div class="f-18 m-0 robotoRegular"><span class="cl-3ac754 ">Services by:</span> Specialist
                        </div>
                        <div class="d-flex pt-3 justify-content-between">
                            <div class=" m-0 robotoLight">Date: 22 Nov 2021</div>
                            <div class=" m-0 robotoLight">Time: 08:20</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom pb-3">
                <div class="d-flex pt-3 pb-2">
                    <div class="col-lg-8  p-0 f-18 robotoMedium ">Total Service Rate</div>
                    <div class="col-lg-4 p-0 text-right f-18 robotoRegular">$100</div>
                </div>
                <div class="d-flex py-2">
                    <div class="col-lg-8 p-0 f-18 cl-a9a9a9 robotoRegular ">Specialist Rate</div>
                    <div class="col-lg-4 p-0 text-right f-18 cl-a9a9a9 robotoRegular">$100</div>
                </div>
                <div class="d-flex">
                    <div class="col-lg-8 p-0 f-18 cl-a9a9a9 robotoRegular ">Service Fee</div>
                    <div class="col-lg-4 p-0 text-right f-18 cl-a9a9a9 robotoRegular">$100</div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-lg-8 p-0 f-18 robotoMedium ">Total </div>
                <div class="col-lg-4 p-0 text-right f-18 robotoRegular">$100</div>
            </div>
            <button type="button" class="btn bg-3ac574 w-100 robotoMedium  text-white">Confirm and Pay</button>
            <div class="pt-2 text-center">SSL Secure Payment</div>


            <!-- <div class="form-row row">
                            <div class="col-md-12 error form-group hide">
                                <div class="alert-danger alert">Please correct the errors and try again.</div>
                            </div>
                        </div> -->

        </div>
</section>







@endsection

{{-- content section end --}}
{{-- footer section start --}}


@section('extra-script')
@endsection

{{-- footer section end --}}
<script>
    const paymentRadio=(e, sectionName)=>{
        console.log(sectionName);
        if( sectionName == 'creditCard'){
        // console.log('chal rhaa');
            $('#creditCardDiv').addClass('d-block')
            $('#creditCardDiv').removeClass('d-none')
            $('#paypalEmail').addClass('d-none')
            $('#paypalEmail').removeClass('d-block')
        }
        if( sectionName == 'paypal'){
            // console.log('chal rhaa');
            $('#creditCardDiv').addClass('d-none')
            $('#creditCardDiv').removeClass('d-block')
            $('#paypalEmail').addClass('d-block')
            $('#paypalEmail').removeClass('d-none')
        }
      
    }
// const paymentRadio=(e)=>{
//     if(e.checked === true){
//         creditCardDiv.classList.add('d-none')
//     }
//     else{
//         creditCardDiv.classList.remove('d-none')
//         creditCardDiv.classList.add('d-block')
//     }
// }
</script>