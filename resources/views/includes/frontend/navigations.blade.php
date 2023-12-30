<!-- 2 N D S E C T I O N -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<style>
.dropdown-menu {
    margin-top: 0;
}

/* .dropdown-menu .dropdown-toggle::after {
    vertical-align: middle;
    border-left: 4px solid;
    border-bottom: 4px solid transparent;
    border-top: 4px solid transparent;
    display:none !important;
} */

 .dropdown-toggle::after {
    /* vertical-align: middle;
    border-left: 4px solid;
    border-bottom: 4px solid transparent;
    border-top: 4px solid transparent; */
    display:none !important;
}



.dropdown-menu .dropdown .dropdown-menu.left {
    right: 100%;
    left: auto;
}

.dropdown-menu>li a:hover,
.dropdown-menu>li.show {
    / background-color: #3AC574; /
    background-color: #fff;
    color: #3AC574 !important;
}

.dropdown-menu>li.show>a {
    color: white;
}

@media (min-width: 768px) {
    .dropdown-menu .dropdown .dropdown-menu {
        margin: 0;
        border-width: 1px;
    }
    .dropdown-menu .dropdown .dropdown-menu {
    left: -99%!important;
    top: 0%;
    margin: 0 20px;
    border-width: 0;
}
}
.dropdown-menu-1 {
    min-width: 15rem !important;
}
@media (max-width: 768px) {
    .sub_dropdown_menu{
        min-width: 16rem !important;
        left: -98px !important;
    }
    .dropdown-menu-2{
        min-width: 16rem !important;
        left: -36%!important;
    }
}
</style>
@if(count(categories()) > 0)
<section class=" main_padding pt-5">
<div>
<ul class="listStyle-none p-0 d-flex robotoRegular f-166 ul_main_tabs m-0 d-flex  align-items-center flex-directionSmall cl-3b3b3b3"
id="main_navbar">
    @foreach (parentCategories()->take(8) as $category)
        @if(App\Category::where('category_id',$category->id)->get()->count() > 0)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle cl-3b3b3b3" href="{{ route('category_specialists',$category->id) }}"
                role="button" data-bs-toggle="dropdown" onclick="categoryRedirect(this);">
                {{ ucwords($category->title) }}
                </a>
                <ul class="dropdown-menu sub_dropdown_menu">
                    @foreach(App\Category::where('category_id',$category->id)->get() as $sub)
                        <li class="nav-item">
                            <a class="dropdown-item cl-3b3b3b3" href="{{ route('category_specialists',$sub->id) }}">{{ ucwords($sub->title) }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
        <li class="pl-3"> <a href="{{ route('category_specialists',$category->id) }}"
        class="cl-3b3b3b3">{{ ucwords($category->title) }}</a></li>
        @endif
    @endforeach

    @if (count(parentCategories()->skip(8)) > 0)
        <li class="nav-item dropdown cl-3b3b3b3">
            <div class="btn-group" style='position: relative;'>
                <a href="" class="dropdown-toggle dropdown-toggle-split cl-3b3b3b3" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">More...</a>
                <ul class="dropdown-menu dropdown-menu-1">
                    @foreach (parentCategories()->skip(8) as $category)
                        @if(App\Category::where('category_id',$category->id)->get()->count() > 0)
                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="{{ route('category_specialists',$category->id) }}"
                                data-bs-toggle="dropdown" onclick="categoryRedirect(this);">{{ ucwords($category->title) }}</a>
                                <ul class="dropdown-menu dropdown-menu-2">
                                    @foreach(App\Category::where('category_id',$category->id)->get() as $sub)
                                        <li class="nav-item">
                                            <a class="dropdown-item cl-3b3b3b3" href="{{ route('category_specialists',$sub->id) }}">{{ ucwords($sub->title) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="pl-3"> <a href="{{ route('category_specialists',$category->id) }}"
                        class="cl-3b3b3b3">{{ ucwords($category->title) }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </li>
    @endif
</ul>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script>
    function categoryRedirect(elem){
        alert($(elem).attr(href));
    }

    function bootnavbar(el = 'main_navbar', options) {
        let defaultOption = {

        }

        options = {
        ...defaultOption,
        ...options
        }


        var isMobile = {
            Android: function() {
            return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
            return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
            },
            any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() ||
            isMobile.Windows());
            }
        };

        this.init = function() {
            var dropdowns = document.getElementById(el).getElementsByClassName("dropdown");
            console.log(dropdowns);
            for (var i = 0; i < dropdowns.length; i++) {
                var dropdown = dropdowns.item(i);
                dropdown.addEventListener("click", function() {
                this.classList.add('show');
                this.getElementsByClassName("dropdown-menu")[0].classList.add('show');
                });
                // dropdown.addEventListener("mouseout", function() {
                // this.classList.remove('show');
                // this.getElementsByClassName("dropdown-menu")[0].classList.remove('show');
                // });
            }

        }
        this.init();
    }
    new bootnavbar();

</script>
@endif