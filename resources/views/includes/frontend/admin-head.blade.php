<title>@yield('title')</title>
<link rel="apple-touch-icon" href="{{ asset('assets/admin/images/favicon/apple-touch-icon-152x152.png') }}">
<link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.ico') }}" type="image/x-icon">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link href="{{ asset('assets/frontend/css/google_fonts.css') }}" rel="stylesheet">-->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/utility.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />

<style>
    .overflow-y{overflow-y: scroll;}
    .height-300{height:300px;}

    ::-webkit-scrollbar-track {
        background:#D5D5D5;
        border-radius: 10px;
    }

    ::-webkit-scrollbar {
        width: 6px;
        border-radius: 10px;
    }
        
    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); */
        background:#3AC574 !important;
        height:100px;
    }
    
</style>
<script>
    var url = "{{ url('/') }}";
    var token = "{{ csrf_token() }}";
</script>