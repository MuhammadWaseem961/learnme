<link rel="stylesheet" href="{{ asset('assets/frontend/css/navbar.css') }}">
<nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0 pt-2">
    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/frontend/images/navlogo.png') }}"
            alt="navbar logo" class="img-fluid" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto d-flex justify-content-center align-items-center f-20 ">

            <li class="nav-item dropdown  pl-4 robotoRegular">
                <a class="nav-link cl-ffffff cl-ffffff messageDropdown" href="#" id="navbarDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="">
                    Messages
                    <span class="mt-1 ml-2"></span>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                    <nav>
                        <div class="nav nav-tabs row m-0" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link col-md-6 text-center" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                Notifications</a>
                            <a class="nav-item nav-link active col-md-6 text-center" id="nav-home-tab" data-toggle="tab"
                                href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inbox</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            
                        </div>
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            
                        </div>

                        {{-- <div class="dropdown-footer mt-5">
                            <div class="bg-3ac574 row m-0 pt-2 pb-3">
                                <div class="col-md-6 d-flex p-0 pl-4">
                                    <div><i class="fa fa-cog text-white" aria-hidden="true"></i></div>
                                    <div><i class="fa fa-volume-up text-white pl-2" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0 pr-3 text-white text-right">
                                    <a href="{{ route('chat.index') }}" style="color: #ffffff;"><h6>See all in inbox</h6></a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </li>
            <li class="nav-item  pl-4">
                <a class="nav-img" data-toggle="dropdown" href="#">
                    @if (Session::get('admin')->picture != null)
                        <img src="{{ asset(Session::get('admin')->picture) }}"  onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"' class="img-fluid rounded-circle w-40 h-40"
                        alt="profile" />
                    @else
                        <img src="{{ asset('uploads/user/default.jpg') }}" onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"' class="img-fluid w-40 h-40" alt="profile" width="40" />
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ url('/dashboard/profile') }}" class="dropdown-item">Setting</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<script>
    function search_function() {
        var input = document.getElementById('search').value;
        if (input != '') {
            var form = document.getElementById("search_form");
            form.submit();
        }
    }

    function submit_function() {
        var input = document.forms["search_form"]["search"].value;
        if (input == "") {
            return false;
        }
    }

</script>
