	
  <section class="main_padding pt-70  w-100">
        <div class="row m-0 justify-content-between flex-wrap flex-directionSmall txt_Align_Center">
            <div>
                <h4 class="m-0 cl-000000 robotoMedium f-26">Categories</h4>
                <ul class="p-0 robotoRegular footerUl">
                    @foreach(subCategories()->take(6) as $category)
                        @if($category->is_subcategory!='0')
                            <li class="listStyle-none pt-4"><a href="{{ route('category_specialists',$category->id) }}" class="f-21 cl-6b6b6b">{{ ucwords($category->title) }}</a></li>
                        @endif
                    @endforeach
                    {{-- <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Digital Marketing</a></li>
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Business</a></li>
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Lifestyle</a></li>
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Sitemap</a></li> --}}
                </ul>
            </div>
            <div>
                <h4 class="m-0 cl-000000 robotoMedium  f-26">About</h4>
                <ul class="p-0 robotoRegular footerUl">
                    {{-- 
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Partnerships</a></li>
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Privacy Policy</a></li> --}}
                    <li class="listStyle-none pt-4"><a href="{{ route('careers') }}" class="f-21 cl-6b6b6b">Careers</a></li>
                    <li class="listStyle-none pt-4"><a href="{{ route('partnerships') }}" class="f-21 cl-6b6b6b">Partnerships</a></li>
                    <li class="listStyle-none pt-4"><a href="{{ route('terms_services') }}" class="f-21 cl-6b6b6b">Terms of Service</a></li>
                    <li class="listStyle-none pt-4"><a href="{{ route('about') }}" class="f-21 cl-6b6b6b">About</a></li>
                    <li class="listStyle-none pt-4"><a href="{{ route('privacy_policy') }}" class="f-21 cl-6b6b6b">Privacy Policy</a></li>
                    {{-- <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Investor Relations</a></li> --}}

                </ul>
            </div>
            <div>
                <h4 class="m-0 cl-000000 robotoMedium f-26">Support</h4>
                <ul class="p-0 robotoRegular footerUl">
                    <li class="listStyle-none pt-4"><a href="{{ route('contact') }}" class="f-21 cl-6b6b6b">Contact</a></li>
                    <!-- <li class="listStyle-none pt-4"><a href="{{ route('helpandsupport') }}" class="f-21 cl-6b6b6b">Help & Support</a></li>  -->
                    <li class="listStyle-none pt-4"><a href="{{ route('trustsaftey') }}" class="f-21 cl-6b6b6b">Trust & Safety</a></li>
                    {{-- <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Selling</a></li>                   --}}
                    <!-- <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Buying </a></li>  -->


                </ul>
            </div>
            <div class="">
                <h4 class="m-0 cl-000000 robotoMedium f-26">Community</h4>
                <ul class="p-0 robotoRegular footerUl">
                <li class="listStyle-none pt-4"><a href="{{ route('events') }}" class="f-21 cl-6b6b6b">Events</a></li>
                    <li class="listStyle-none pt-4"><a href="{{ route('blog') }}" class="f-21 cl-6b6b6b">Blog</a></li>
                    {{-- 
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Forum</a></li>
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Podcast</a></li>
                    <li class="listStyle-none pt-4"><a href="" class="f-21 cl-6b6b6b">Affiliates
                        </a></li> --}}


                </ul>
            </div>

            <div class="col-md-2 p-0 mar_Sm-Auto">
                {{-- <div>
                <h4 class="m-0 cl-000000 robotoMedium f-26">Join Us On</h4>
            </div>
            <div class="pt-4"> <input type="email" placeholder="Enter your email..."
                    class="robotoRegular cl-6b6b6b    bg-transparent footer_input pt-2 pb-2 pl-3 w-100 rounded">
            </div>
            <div class="pt-3"><button class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574 w-100 rounded"
                    type="submit">Submit</button></div> --}}

                <div>
                    <h4 class="m-0 cl-000000 robotoMedium f-26">Apps</h4>

                </div>

                <div class="pt-3"><a href="https://apps.apple.com/app/id1522102968"><img
                            src="{{ asset('assets/frontend/images/appstore_2x.png') }}" alt="" class="w-135"
                            srcset=""></a></div>
                <div class="pt-3"><a href="https://play.google.com/store/apps/details?id=com.brandon.learnme"><img
                            src="{{ asset('assets/frontend/images/playstore_2x.png') }}" alt="" class="w-135"
                            srcset=""></a></div>




                <div class="f-26 cl-bcbcbc pt-3 footerUl">Follow us On</div>
                <div class="d-flex pt-3 jsc">
                    <div><a href="https://www.facebook.com/Learnmelive/"><img
                                src="{{ asset('assets/frontend/images/fb.png') }}" class=""></a></div>
                    <div class="pl-3"><a href="https://www.instagram.com/learnmelive/"><img
                                src="{{ asset('assets/frontend/images/insta.png') }}" alt="" srcset=""></a></div>
                    <div class="pl-3"><a href="https://twitter.com/learnmelive"><img
                                src="{{ asset('assets/frontend/images/twitter.png') }}" alt="" srcset=""></a></div>
                    <div class="pl-3"><a href="https://www.linkedin.com/company/learnme-live/about/"><img
                                src="{{ asset('assets/frontend/images/linkdin.png') }}" alt="" srcset=""></a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="main_padding bg-light text-dark mt-5 py-3  robotoRegular text-white text-center">
        <div class="d-flex justify-content-center  align-items-center h5 m-0">
        © {{ date('Y') }} learnme live™ learnme LLC.
        <!-- Copyright © {{ date('Y') }} learnme,All Right Reserved learnmelive -->
            <!-- <img
                src="{{ asset('assets/frontend/images/Copyright © 2021 learnmelive, All Right Reserved learnmelive.png') }}"
                alt="" srcset=""> -->
            </div>
    </section>
    <!-- END: Footer-->

    