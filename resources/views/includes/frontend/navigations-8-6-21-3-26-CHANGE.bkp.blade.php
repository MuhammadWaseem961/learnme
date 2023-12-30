<!-- 2 N D S E C T I O N -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<style>
.dropdown-menu {
margin-top: 0;
}
.dropdown-menu .dropdown-toggle::after {
vertical-align: middle;
border-left: 4px solid;
border-bottom: 4px solid transparent;
border-top: 4px solid transparent;
}
.dropdown-menu .dropdown .dropdown-menu {
left: 100%;
top: 0%;
margin:0 20px;
border-width: 0;
}
.dropdown-menu .dropdown .dropdown-menu.left {
right: 100%;
left: auto;
}

.dropdown-menu > li a:hover,
.dropdown-menu > li.show {
background: #007bff;
color: white;
}
.dropdown-menu > li.show > a{
color: white;
}

@media (min-width: 768px) {
.dropdown-menu .dropdown .dropdown-menu {
margin:0;
border-width: 1px;
}
}
</style>
@if(count(categories()) > 0)
<section class=" main_padding pt-5">
<div>
    <ul class="listStyle-none p-0 d-flex robotoRegular f-16 ul_main_tabs m-0 d-flex justify-content-around" id="main_navbar">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Dropdown
            </a>
            <ul class="dropdown-menu">
                <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    Dropdown
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>

                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script src="js/bootnavbar.js"></script>
<script>
function bootnavbar(el = 'main_navbar', options){
let defaultOption ={

}

options = {...defaultOption, ...options }


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
return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
}
};

this.init = function(){
var dropdowns = document.getElementById(el).getElementsByClassName("dropdown");
console.log(dropdowns);
for (var i = 0; i < dropdowns.length; i++) {
var dropdown = dropdowns.item(i);
dropdown.addEventListener("mouseover", function(){
this.classList.add('show');
this.getElementsByClassName("dropdown-menu")[0].classList.add('show');
});
dropdown.addEventListener("mouseout", function(){
this.classList.remove('show');
this.getElementsByClassName("dropdown-menu")[0].classList.remove('show');
});
}
// document.getElementById(el).getElementsByClassName("dropdown").forEach(dropdown => {
// dropdown.addEventListener("mouseover", function(){
// dropdown.classList.add('show');
// dropdown.getElementsByClassName("dropdown-menu")[0].classList.add('show');
// });
// dropdown.addEventListener("mouseout", function(){
// dropdown.classList.remove('show');
// dropdown.getElementsByClassName("dropdown-menu")[0].classList.remove('show');
// });
// });
}

this.init();
}
new bootnavbar();
// (function () {
// });
</script>
@endif