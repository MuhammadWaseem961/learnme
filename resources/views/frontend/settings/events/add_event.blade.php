@extends('layouts.frontend.setting') @section('title','Add Event') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script> 


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
</style>
@endsection {{-- head end --}} {{-- content section start --}}
@section('navbar')

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.navbar')</section>
@include('includes.frontend.navigations')
@endsection
@section('content')


    <p class="border-bottom pl-3 f-21 cl-616161">Add Event</p>

    <div class="px-3 py-3">
        <form method="POST" enctype="multipart/form-data" id="create-form">

            <div class="form-group mb-1">
                <label for="exampleInputEmail1">Category</label>
                <select class="form-control" name="category_id">

                    <option disabled="" selected="">Select Category</option>
                    @if($categories->count()>0)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ucwords($category->title)}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group mb-1">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" oninput="myPrice(this)" id="Titles" aria-describedby="emailHelp">
            </div>

            <div class="form-group mb-1">
                <label for="exampleInputEmail1">Ticket Price</label>
                <div class="lable d-flex flex-nowrap align-items-center">   
                <div class="input-group-prepend ">
                    <span class="input-group-text leftRadiusTB-0">$</span>
                </div>
                    <!-- <span class="prefix pr-2">$</span>   -->
                    <input class="snehainput form-control rightRadiusTB-0" name="price" min="5" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?"  data-type="currency" onfocusout="budgetValidate(this);" placeholder="5 Minimum (USD)">
                </div> 

            </div>

            <div class="form-group mb-1">
                <label for="exampleInputEmail1">Location</label>
                <input type="text" class="form-control" name="location" placeholder="Virtual" value="Virtual" id="Titles" aria-describedby="emailHelp" readonly/>
            </div>

            <div class="form-group mb-1">
                <label for="exampleInputEmail1">Date and Time</label>
                <input type="datetime-local" class="form-control" name="date_time" id="Titles" aria-describedby="emailHelp">
            </div>

            {{-- <div class="form-group mb-1">
                <label for="exampleInputPassword1">Summary</label>
                <textarea class="form-control border" name="summary" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div> --}}
            
            <div class="form-group mb-1">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control border tinymce-editor" id="description" rows="3"></textarea>
            </div>

            {{-- <div class="form-group mb-3">
                <label for="exampleInputPassword1">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="inputGroupFile01" name="image" accept=".jpg,.jpeg,.png,.gif">
                    </div>
                </div>
            </div> --}}

            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Image</label>
                <div class="input-group">
                <div class="custom-file">
                    <input type="hidden" id="uploaded-file" name="image" value="">
                    <input type="file" class="form-control-file" id="upload-file" onchange="uploadFile($('#upload-file'));" accept=".jpg,.jpeg,.png,.gif">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="progress d-none">
                    <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                </div>
                <div class="msg"></div>
            </div>
        
            <div class="text-right">
                <button type="button" class="btn bg-3AC574 px-5 text-white submit disabled" onclick="create_resource();">Submit</button>
            </div>
        </form>
    </div>

@endsection
{{-- footer section start --}} @section('extra-script')


<script>
    function create_resource() {
        $('.all-loader').removeClass('d-none');
        var myform = document.getElementById("create-form");
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        fd.append('description',tinymce.get('description').getContent());
        $.ajax({
            url: "{{ route('events.store') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {
                $('.all-loader').addClass('d-none');
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {

                        window.location = "{{ route('events.index') }}";
                    });
                } else {
                    if (data.hasOwnProperty("message")) {
                        var wrapper = document.createElement("div");
                        var err = "";
                        $.each(data.message, function(i, e) {
                            err += "<p>" + e + "</p>";
                        });

                        wrapper.innerHTML = err;
                        swal({
                            icon: "error",
                            text: "{{ __('Please fix following error!') }}",
                            content: wrapper,
                            type: "error",
                        });
                    }
                }
            },
        });
    }

    function budgetValidate(elem){
        if($(elem).val()<5){
            $(elem).val('5');
        }
    }

</script>

<script src="{{ asset('assets/ckeditor/font/plugin.js') }}"></script> 
<script>

    $("input[data-type='currency']").on({
        keyup: function() {
        formatCurrency($(this));
        },
        blur: function() { 
        formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }

    function formatCurrency(input, blur) 
    {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.
        
        // get input value
        var input_val = input.val();
        
        // don't validate empty input
        if (input_val === "") { return; }
        
        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");
        
        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);
            
            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
            right_side += "00";
            }
            
            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val =  left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val =   input_val;
            
            // final formatting
            if (blur === "blur") {
            input_val += ".00";
            }
        }
    
        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }

</script>
@endsection {{-- footer section end --}}