@extends('layouts.frontend.app')
@section('title','terms_services')
{{-- head start --}}

@section('extra-css')


<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/utility.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/navbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/portfolio.css') }}">
<style type="text/css">
.dropdown-toggle::after {
    display: none;
}
ol li {
    padding:8px 0px 8px 8px;  
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



<section class="main_padding mt-5">
    <div class="main_Tite_div d-flex justify-content-center flex-column align-items-center robotoMedium mb-5">
        <h2 class="main_Tite">
        PRIVACY POLICY


        </h2> <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-1" alt="">
    </div>
    <div class=" ml-0 mr-0 cl-6b6b6b  robotoRegular r">
        <div class="elementor-text-editor elementor-clearfix">
            <p><strong><u>PRIVACY POLIC</u></strong><strong><u>Y</u></strong></p>
            <p>We at learnme, are committed to protecting your privacy. We have prepared this Privacy Policy to describe
                to you our practices regarding the personal data we collect from users of our website.</p>
            <p>By using the Services, users consent to the collection and use of their Personal Data by us. You also
                represent to us that you have any and all authorizations necessary to use these Services including using
                them to process Personal Data. We collect and use the information you provide to us, including
                information obtained from your use of the Services. Also, we may use the information that we collect for
                our internal purposes to develop, tune, enhance, and improve our Services, and for advertising and
                marketing consistent with this Privacy Policy.</p>
            <p>This privacy policy has been compiled to better serve those who are concerned with how their ‘Personal
                Data’ is being used online. Personal Information means data which relate to a living individual who can
                be identified – (a) from those data, or (b) from those data and other information which is in the
                possession of, or is likely to come into the possession of, the data controller, and includes any
                expression of opinion about the individual and any indication of the intentions of the data controller
                or any other person in respect of the individual.</p>
            <p>Please read our privacy policy carefully to get a clear understanding of how our website collects, uses,
                protects or otherwise handles users’ Personal Data.</p>
            <p>This Privacy Policy is intended to inform users about how our website treats Personal Data that it
                processes about users. If users do not agree to any part of this Privacy Policy, then we cannot provide
                its Services to users and users should stop accessing our services.</p>
            <p>By using the Services, You acknowledge, consent and agree that we may collect, process, and use the
                information that you provide to us and that such information shall only be used by us or third parties
                acting under our direction, pursuant to confidentiality agreements, to develop, tune, enhance, and
                improve the Services. Although we may attempt to notify you when changes are made to this Privacy
                Policy, you are responsible for periodically reviewing any changes which may be made to the Policy. We
                may, in our sole discretion, modify or revise the Policy at any time, and you agree to be bound by the
                same.</p>
            <p>Our privacy policy is subject to change at any time without notice. To make sure you are aware of any
                changes, please review this policy periodically.</p>
            <ol>
                <li><strong><u>INFORMATION WE COLLECT:</u></strong>
                    <ul>
                        <li>You provide us information about yourself – Your Full Name, Username, E-mail Address, Bank
                            Account details, Address and Geo-Location. If you correspond with us by e-mail, we may
                            retain the content of your e-mail messages, your e-mail address, and our responses.
                            Additionally, we store information about users’ contacts when users manually enter contact
                            e-mail addresses or transfer contact information from other online social networks. We also
                            collect general information about your use of our services.</li>
                        <li>We also collect information provided to us by the use of Geolocation. Geolocation identifies
                            the actual geographic location of objects such as mobile devices or any terminal connected
                            to the internet. Geolocation finds the actual geographic location of objects using their IP
                            address, MAC address, GPS coordinates, hardware and software embedded production numbers,
                            and Wi-Fi positioning system.</li>
                        <li>&nbsp;</li>
                    </ul>
                </li>
                <li><strong><u>INFORMATION WE COLLECT AUTOMATICALLY WHEN YOU USE OUR SERVICES:</u></strong></li>
            </ol>
            <ul>
                <li>When you access or use our Services, we automatically collect information about you, including:</li>
            </ul>
            <ol>
                <li><strong>Usage Information</strong>: If you choose to post messages on our message boards, online
                    chats or other message areas or leave feedback for other users, we retain this information as
                    necessary to resolve disputes, provide customer support and troubleshoot problems as permitted by
                    law. If you send us personal correspondence, such as emails or letters, or if other users or third
                    parties send us correspondence about your activities on the Website, we may collect such information
                    into a file specific to you.</li>
                <li><strong>Log Information:</strong> We log information about your use of our Website, including your
                    browser type and language, access times, pages viewed, your IP address and the Website you viewed
                    before navigating to our Website.</li>
                <li><strong>Device Information:</strong> We may collect information about the device you use to access
                    our Services, including the hardware model, operating system and version, unique</li>
            </ol>
            <p>device identifier, phone number, International Mobile Equipment Identity (“IMEI”) and mobile network
                information.</p>
            <ol>
                <li><strong>Location Information:</strong> With your consent, we may collect information about the
                    location of your device to facilitate your use of certain features of our Services, determine the
                    speed at which your device is traveling, add location-based filters (such as local weather), and for
                    any other purposes.</li>
                <li><strong>Information Collected by Cookies and Other Tracking Technologies:</strong> We use various
                    technologies to collect information, and this may include sending cookies to you.</li>
            </ol>
            <p>A “cookie” is a small data file transferred to your computer’s hard drive that allows a</p>
            <p>Website to respond to you as an individual, gathering and remembering information about your preferences
                in order to tailor its operation to your needs, likes and dislikes. Overall, cookies are safe, as they
                only identify your computer to customize your Web experience. Accepting a cookie does not provide us
                access to your computer or any Personally Identifiable Information about you, other than the information
                you choose to share. Other servers cannot read them, nor can they be used to deliver a virus. Most
                browsers automatically accept cookies, but you can usually adjust yours (Microsoft Internet Explorer,
                Firefox or Google Chrome) to notify you of cookie placement requests, refuse certain cookies, or decline
                cookies completely. If you turn off cookies completely, there may be some Website features that will not
                be available to you, and some Web pages may not display properly. To support the personalized features
                of our Website (such as your country and language codes and browsing functions) we must send a cookie to
                your computer’s hard drive and/or use cookie-based authentication to identify you as a registered
                Website user. We do not, however, use so-called “surveillance” cookies that track your activity
                elsewhere on the Web. We may also collect information using web beacons (also known as “tracking
                pixels”).</p>
            <ol>
                <li>“Web beacons” or clear .gifs are small pieces of code placed on a Web page to monitor behavior and
                    collect data about the visitors viewing a Web page. For example, Web beacons or similar technology
                    can be used to count the users who visit a Website or to deliver a cookie to the browser of a
                    visitor viewing that page. We may use Web beacons or similar technology on our Services from time to
                    time for this and other purposes.</li>
            </ol>
            <ol start="3">
                <li><strong><u>HOW WE USE YOUR INFORMATION:</u></strong></li>
                <li>We use the personal information we collect to fulfill your requests for services, improve our
                    services, contact you, conduct research, and provide anonymous reporting for internal and external
                    clients.</li>
                <li>By providing us your e-mail address, you consent to us using the e-mail address to send you our
                    Website and services related notices, including any notices required by law, in lieu of
                    communication by postal mail. You also agree that we may send notifications of activity on our
                    Website to the e-mail address you give us, in accordance with any applicable privacy settings. We
                    may use your e-mail address to send you other messages, such as newsletters, changes to our
                    features, new services, events or other information. If you do not want to receive optional e-mail
                    messages, you may modify your settings to opt out.</li>
            </ol>
            <ul>
                <li>Our settings may also allow you to adjust your communications preferences. If you do not wish to
                    receive promotional email messages from us, you may opt out by following the unsubscribe
                    instructions in those emails. If you opt out, you will still receive non-promotional emails from us
                    about our Services.</li>
            </ul>
            <ol>
                <li>Following termination or deactivation of your services, we may (but are under no obligation to)
                    retain your information for archival purposes. We will not publicly disclose any of your personally
                    identifiable information other than as described in this Privacy Policy.</li>
                <li>At our sole discretion, for any reason or no reason at all, we reserve the right to remove any
                    content or messages, if we believe that such action is necessary (a) to conform to the law, comply
                    with legal process served on us or our affiliates, or investigate, prevent, or take action regarding
                    suspected or actual illegal activities;</li>
            </ol>
            <p>to enforce this policy, to take precautions against liability, to investigate and defend ourselves
                against any third-party claims or allegations, to assist government enforcement agencies, or to protect
                the security or integrity of our Website; or (c) to exercise or protect the rights, property, or
                personal safety of the Website, our users, or others.</p>
            <ol>
                <li><strong>Business Transfers: </strong>As our businesses continue to evolve, we might sell one or more
                    of our companies, subsidiaries or business units. In such transactions, personally identifiable
                    information generally is one of the transferred business In such event, this Privacy Policy may be
                    amended as set forth below or the collection and uses of your personally identifiable information
                    may be governed by a different privacy policy.</li>
            </ol>
            <ul>
                <li><strong>Protection of Our Services and Others: </strong>We reserve the right to release personally
                    identifiable information to unaffiliated third parties when we believe its release is appropriate to
                    comply with the law, enforce or apply our Terms and Conditions and other agreements, or protect the
                    rights, property or safety of Trader Interactive, our users or others. This includes exchanging
                    information with other unaffiliated third parties in connection with fraud protection and credit
                    risk reduction.</li>
                <li><strong>With Your Consent: </strong>Other than as set out above, you will receive notice and have
                    the opportunity to withhold consent when personally identifiable information about you might be
                    shared with unaffiliated third parties.</li>
            </ul>
            <ol>
                <li>We may transmit the user data across the various Websites of the Company.</li>
                <li><strong>User Submissions: </strong>If you participate in any online forum/communities, chat sessions
                    and/or blogs, or otherwise post in any user comment field visible to other users of our Services,
                    any information that you submit or post will be visible to and may be read, collected or used by
                    others who use our Services. We are not responsible for any information, including personally
                    identifiable information, you choose to submit in any such user comment field.</li>
            </ol>
            <ol start="4">
                <li><strong><u>HOW WE SHARE YOUR INFORMATION:</u></strong></li>
                <li>As a matter of policy, we will not sell or rent information about you and we will not disclose
                    information about you in a manner inconsistent with this Privacy Policy except as required by law or
                    government regulation. We cooperate with law enforcement inquiries, as well as other third parties,
                    to enforce laws such as those regarding intellectual property rights, fraud and other personal
                    rights.</li>
                <li>We will not share the personal information we collect about you with any third-party for their own
                    marketing purposes without your consent. We may share your data with our services providers who
                    process your personal information to provide services to us or on our behalf. We have contracts with
                    our service providers that prohibit them from sharing the information about you that they collect or
                    that we provide to them with anyone else, or using it for other purposes.</li>
            </ol>
            <ul>
                <li>You may decline to submit Personally Identifiable Information through the Services; in which case we
                    may not be able to provide certain services to you. If you do not agree with our Privacy Policy or
                    Terms of Service, please discontinue use of our Service; your continued usage of the Service will
                    signify your assent to and acceptance of our Privacy Policy and Terms of Use.</li>
            </ul>
            <ol>
                <li>WE CAN (AND YOU AUTHORIZE US TO) DISCLOSE ANY INFORMATION ABOUT YOU TO LAW ENFORCEMENT, OTHER
                    GOVERNMENT OFFICIALS, ANY LAWSUIT OR ANY OTHER THIRD-PARTY THAT WE, IN OUR SOLE DISCRETION, BELIEVE
                    NECESSARY OR WEBSITEROPRIATE IN CONNECTION WITH AN INVESTIGATION OF FRAUD, INTELLECTUAL PROPERTY
                    INFRINGEMENT, OR OTHER ACTIVITY THAT IS ILLEGAL OR MAY EXPOSE US, OR YOU, TO LIABILITY.</li>
            </ol>
            <ol start="5">
                <li><strong><u>INFORMATION SHARED DURING TRANSACTION</u></strong>
                    <ol>
                        <li>You agree that you will enter into transactions with third parties through our Website and
                            will share your Personal Information with them for easy completion of the transaction. You
                            hereby expressly agree that we shall not be involved or held liable for any breach of the
                            privacy or security of that data. The said breach, if any, shall be a matter of dispute
                            between you and the third-party and we shall not be held liable or be issued a notice for
                            the same.</li>
                        <li>We STRONGLY recommend that you should be careful and vigilant while disclosing your Personal
                            Information with your transaction partner. Please do not disclose your bank and account
                            details to anyone through our website or to any individual whom you have met through our
                            website.</li>
                    </ol>
                </li>
            </ol>
            <ul>
                <li>We do not take credit card/debit card or other bank details on our website. For payment you will be
                    directed to sign in through the respective payment gateways integrated on our website and the
                    transaction would be completed therein. It is to be noted that we will not be storing any Bank
                    related information on our records and none of our staffs will hold or be exposed to this
                    information</li>
            </ul>
            <ol start="6">
                <li><strong><u>ENSURING INFORMATION IS ACCURATE AND UP-TO-DATE:</u></strong></li>
                <li>We take reasonable precautions to ensure that the Personal Information we Collect, Use and Disclose
                    is complete, relevant and up-to-date. However, the accuracy of that information depends to a large
                    extent on the information you provide. That’s why we recommend that you:</li>
                <li>Let us know if there are any errors in your Personal Information; and</li>
                <li>Keep us up-to-date with changes to your Personal Information such as your name or address.</li>
            </ol>
            <ol start="7">
                <li><strong><u>HOW WE PROTECT YOUR INFORMATION:</u></strong></li>
                <li>We are very concerned about safeguarding the confidentiality of your personally identifiable
                    information. We employ administrative, physical and electronic measures designed to protect your
                    information from unauthorized access.</li>
                <li>By using this Website or the Services or providing Personal Information to us, you agree that we can
                    communicate with you electronically regarding security, privacy, and administrative issues relating
                    to your use of this Website or Services.</li>
            </ol>
            <ul>
                <li>We use commercially reasonable physical, managerial, and technical safeguards to preserve the
                    integrity and security of your Personal Information. Your sensitive information, such as credit card
                    information, is encrypted when it is transmitted to us. Our employees are trained and required to
                    safeguard your information. We cannot, however, ensure or warrant the security of any information
                    you transmit to us and you do so at your own risk. Using unsecured wi-fi or other unprotected
                    networks to submit messages through the Service is never recommended. Once we receive your
                    transmission of information, we make commercially reasonable efforts to ensure the security of our
                    systems. However, please note that this is not a guarantee that such information may not be
                    accessed, disclosed, altered, or destroyed by breach of any of our physical, technical, or
                    managerial safeguards. If we learn of a security systems breach, then we may attempt to notify you
                    electronically so that you can take appropriate protective steps.</li>
            </ul>
            <ol>
                <li>Notwithstanding anything to the contrary in this Policy, we may preserve or disclose your
                    information if we believe that it is reasonably necessary to comply with a law, regulation or legal
                    request; to protect the safety of any person; to address fraud, security or technical issues; or to
                    protect our rights or property. However, nothing in this Policy is intended to limit any legal
                    defenses or objections that you may have to a third party, including a government’s, request to
                    disclose your information.</li>
                <li>However, no data transmission over the Internet or data storage system can be guaranteed to be 100%
                    secure. Please do not send us credit card information and/or other sensitive information through
                    email. If you have reason to believe that your interaction with us is not secure (for example, if
                    you feel that the security of any account you might have with us has been compromised), you must
                    immediately notify us of the problem by contacting us in accordance with the “Contacting Us” section
                    available on our Website.</li>
            </ol>
            <ol start="8">
                <li><strong><u>YOUR CHOICES ABOUT YOUR INFORMATION:</u></strong></li>
                <li>You have several choices regarding use of information on our Services:<ol>
                        <li><strong>Email Communications:</strong> We will periodically send you free newsletters and e-
                            mails that directly promote the use of our Website, or Services. When you receive
                            newsletters or promotional communications from us, you may indicate a preference to stop
                            receiving further communications from us and you will have the opportunity to “opt-out” by
                            following the unsubscribe instructions provided in the e-mail you receive or by contacting
                            us directly. Despite your indicated e-mail preferences, we may send you service-related
                            communications, including notices of any updates to our Terms of Use or Privacy Policy.</li>
                        <li>You may, of course, decline to submit personally identifiable information through the
                            Website, in which case, we will not be able to provide our services to you.</li>
                    </ol>
                </li>
            </ol>
            <ol start="9">
                <li><strong><u>RIGHTS OF THE DATA SUBJECT:</u></strong></li>
            </ol>
            <p>If you are a resident of the European Economic Area (EEA), you have certain data protection rights. We
                aim to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal
                Data.</p>
            <p>If you wish to be informed what Personal Data, we hold about you and if you want it to be removed from
                our systems, please contact us.</p>
            <p>In certain circumstances, you have the following data protection rights:</p>
            <ol>
                <li><strong>Right of confirmation</strong></li>
            </ol>
            <p>Each data subject shall have the right granted by the European legislator to obtain from the controller
                the confirmation as to whether or not personal data concerning him or her are being processed. If a data
                subject wishes to avail himself of this right of confirmation, he or she may, at any time, contact any
                employee of the controller.</p>
            <ol>
                <li><strong>Right of access</strong></li>
            </ol>
            <p>Each data subject shall have the right granted by the European legislator to obtain from the controller
                free information about his or her personal data stored at any time and a copy of this information.
                Furthermore, the European directives and regulations grant the data subject access to the following
                information:</p>
            <ol>
                <li>the purposes of the processing;</li>
                <li>the categories of personal data concerned;</li>
            </ol>
            <ul>
                <li>the recipients or categories of recipients to whom the personal data have been or will be disclosed,
                    in particular recipients in third countries or international organizations;</li>
            </ul>
            <ol>
                <li>where possible, the envisaged period for which the personal data will be stored, or, if not
                    possible, the criteria used to determine that period;</li>
                <li>the existence of the right to request from the controller rectification or erasure of personal data,
                    or restriction of processing of personal data concerning the data subject, or to object to such
                    processing;</li>
                <li>the existence of the right to lodge a complaint with a supervisory authority;</li>
            </ol>
            <ul>
                <li>where the personal data are not collected from the data subject, any available information as to
                    their source;</li>
                <li>the existence of automated decision-making, including profiling, referred to in Article 22(1) and
                    (4) of the GDPR and, at least in those cases, meaningful information about the logic involved, as
                    well as the significance and envisaged consequences of such processing for the data subject.</li>
            </ul>
            <ol>
                <li>Furthermore, the data subject shall have a right to obtain information as to whether personal data
                    are transferred to a third country or to an international organization. Where this is the case, the
                    data subject shall have the right to be informed of the appropriate safeguards relating to the
                    transfer. If a data subject wishes to avail himself of this right of access, he or she may, at any
                    time, contact any employee of the controller.</li>
                <li><strong>Right to rectification</strong></li>
            </ol>
            <p>Each data subject shall have the right granted by the European legislator to obtain from the controller
                without undue delay the rectification of inaccurate personal data concerning him or her. Taking into
                account the purposes of the processing, the data subject shall have the right to have incomplete
                personal data completed, including by means of providing a supplementary statement. If a data subject
                wishes to exercise this right to rectification, he or she may, at any time, contact any employee of the
                controller.</p>
            <ol>
                <li><strong>Right to erasure (Right to be forgotten)</strong></li>
            </ol>
            <p>Each data subject shall have the right granted by the European legislator to obtain from the controller
                the erasure of personal data concerning him or her without undue delay, and the controller shall have
                the obligation to erase personal data without undue delay where one of the following grounds applies, as
                long as the processing is not necessary:</p>
            <ol>
                <li>The personal data are no longer necessary in relation to the purposes for which they were collected
                    or otherwise processed.</li>
                <li>The data subject withdraws consent to which the processing is based according to the point (a) of
                    Article 6(1) of the GDPR, or point (a) of Article 9(2) of the GDPR, and where there is no other
                    legal ground for the processing.</li>
            </ol>
            <ul>
                <li>The data subject objects to the processing pursuant to Article 21(1) of the GDPR and there are no
                    overriding legitimate grounds for the processing, or the data subject objects to the processing
                    pursuant to Article 21(2) of the GDPR.</li>
            </ul>
            <ol>
                <li>The personal data have been unlawfully processed.</li>
                <li>The personal data must be erased for compliance with a legal obligation in Union or Member State law
                    to which the controller is subject.</li>
                <li>The personal data have been collected in relation to the offer of information society services
                    referred to in Article 8(1) of the GDPR.</li>
            </ol>
            <ul>
                <li>If one of the aforementioned reasons applies, and a data subject wishes to request the erasure of
                    personal data stored by us, he or she may, at any time, contact any employee of the controller. Any
                    of our Employees shall promptly ensure that the erasure request is complied with immediately.</li>
                <li>Where the controller has made personal data public and is obliged pursuant to Article 17(1) to erase
                    the personal data, the controller, taking account of available technology and the cost of
                    implementation, shall take reasonable steps, including technical measures, to inform other
                    controllers processing the personal data that the data subject has requested erasure by such
                    controllers of any links to, or copy or replication of, those personal data, as far as processing is
                    not required. Any of our employees will arrange the necessary measures in individual cases.</li>
            </ul>
            <ol>
                <li><strong>Right of restriction of processing</strong></li>
                <li>Each data subject shall have the right granted by the European legislator to obtain from the
                    controller restriction of processing where one of the following applies:</li>
                <li>The accuracy of the personal data is contested by the data subject, for a period enabling the
                    controller to verify the accuracy of the personal data. The processing is unlawful and the data
                    subject opposes the erasure of the personal data and requests instead of the restriction of their
                    use instead. The controller no longer needs the personal data for the purposes of the processing,
                    but they are required by the data subject for the establishment, exercise or defense of legal
                    claims. The data subject has objected to processing pursuant to Article 21(1) of the GDPR pending
                    the verification whether the legitimate grounds of the controller override those of the data
                    subject. If one of the aforementioned conditions is met, and a data subject wishes to request the
                    restriction of the processing of personal data stored by us, he or she may at any time contact any
                    employee of the controller. Our Employees will arrange the restriction of the processing.</li>
                <li><strong>Right to data portability</strong></li>
                <li>Each data subject shall have the right granted by the European legislator, to receive the personal
                    data concerning him or her, which was provided to a controller, in a structured, commonly used and
                    machine-readable format. He or she shall have the right to transmit those data to another controller
                    without hindrance from the controller to which the personal data have been provided, as long as the
                    processing is based on consent pursuant to point (a) of Article 6(1) of the GDPR or point (a) of
                    Article 9(2) of the GDPR, or on a contract pursuant to point (b) of Article 6(1) of the GDPR, and
                    the processing is carried out by automated means, as long as the processing is not necessary for the
                    performance of a task carried out in the public interest or in the exercise of official authority
                    vested in the controller.</li>
                <li>Furthermore, in exercising his or her right to data portability pursuant to Article 20(1) of the
                    GDPR, the data subject shall have the right to have personal data transmitted directly from one
                    controller to another, where technically feasible and when doing so does not adversely affect the
                    rights and freedoms of others.</li>
            </ol>
            <ul>
                <li>In order to assert the right to data portability, the data subject may at any time contact any of
                    our employees.</li>
            </ul>
            <ol>
                <li><strong>Right to object</strong></li>
                <li>Each data subject shall have the right granted by the European legislator to object, on grounds
                    relating to his or her particular situation, at any time, to processing of personal data concerning
                    him or her, which is based on point (e) or (f) of Article 6(1) of the GDPR. This also applies to
                    profiling based on these provisions. We shall no longer process the personal data in the event of
                    the objection, unless we can demonstrate compelling legitimate grounds for the processing which
                    override the interests, rights, and freedoms of the data subject, or for the establishment, exercise
                    or defence of legal claims. If we process personal data for direct marketing purposes, the data
                    subject shall have the right to object at any time to the processing of personal data concerning him
                    or her for such marketing. This applies to profiling to the extent that it is related to such direct
                    marketing. If the data subject objects us to the processing for direct marketing purposes, we will
                    no longer process the personal data for these purposes. In addition, the data subject has the right,
                    on grounds relating to his or her particular situation, to object to processing of personal data
                    concerning him or her by us for scientific or historical research purposes, or for statistical
                    purposes pursuant to Article 89(1) of the GDPR, unless the processing is necessary for the
                    performance of a task carried out for reasons of public interest.</li>
                <li>In order to exercise the right to object, the data subject may contact any employee of our Company.
                    In addition, the data subject is free in the context of the use of information society services, and
                    notwithstanding Directive 2002/58/EC, to use his or her right to object by automated means using
                    technical specifications.</li>
                <li><strong>Automated individual decision-making, including profiling</strong></li>
                <li>Each data subject shall have the right granted by the European legislator not to be subject to a
                    decision based solely on automated processing, including profiling, which produces legal effects
                    concerning him or her, or similarly significantly affects him or her, as long as the decision (1) is
                    not is necessary for entering into, or the performance of, a contract between the data subject and a
                    data controller, or (2) is not authorized by Union or Member State law to which the controller is
                    subject and which also lays down suitable measures to safeguard the data subject’s rights and
                    freedoms and legitimate interests, or (3) is not based on the data subject’s explicit consent. If
                    the decision (1) is necessary for entering into, or the performance of, a contract between the data
                    subject and a data controller, or (2) it is based on the data subject’s explicit consent, we shall
                    implement suitable measures to safeguard the data subject’s rights and freedoms and legitimate
                    interests, at least the right to obtain human intervention on the part of the controller, to express
                    his or her point of view and contest the decision.</li>
                <li>If the data subject wishes to exercise the rights concerning automated individual decision-making,
                    he or she may, at any time, contact any our employee.</li>
                <li><strong>Right to withdraw data protection consent</strong></li>
                <li>Each data subject shall have the right granted by the European legislator to withdraw his or her
                    consent to the processing of his or her personal data at any time.</li>
                <li>If the data subject wishes to exercise the right to withdraw the consent, he or she may, at any
                    time, contact any of our employees.</li>
                <li><strong>Right to request access </strong></li>
            </ol>
            <p>You also have a right to access information we hold about you. We are happy to provide you with details
                of your Personal Information that we hold or process. To protect your personal information, we follow
                set storage and disclosure procedures, which mean that we will require proof of identity from you prior
                to disclosing such information. You can exercise this right at any time by contacting us on the above
                details.</p>
            <ol>
                <li><strong>Right to withdraw consent</strong></li>
                <li>Where the legal basis for processing your personal information is your consent, you have the right
                    to withdraw that consent at any time by contacting us on the above details..</li>
                <li><strong><u>STORING PERSONAL DATA: </u></strong></li>
            </ol>
            <p>We retain your information only for as long as is necessary for the purposes for which we process the
                information as set out in this policy. However, we may retain your Personal Data for a longer period of
                time where such retention is necessary for compliance with a legal obligation to which we are subject,
                or in order to protect your vital interests or the vital interests of another natural person.</p>
            <p><strong><u>&nbsp;</u></strong></p>
            <ol start="11">
                <li><strong><u>CHILDREN’S PRIVACY:</u></strong></li>
            </ol>
            <p>Our services are available only to persons who can form a legally binding contract with us as per the
                applicable laws. Protecting the privacy of young children is especially important. Thus, we do not
                knowingly collect or solicit personal information from anyone under the age of 18 or knowingly allow
                such persons to register without the supervision and consent of their Parent or Legal Guardian. If you
                are under 18, please do not attempt to register for the Service or send any information about yourself
                to us, including your name, address, telephone number, email address and Bank account details without
                the supervision and consent of your parent or legal guardian who also must agree to be bound by the
                terms of the website. No one under the age of 13 may provide any personal information for listing any
                service.</p>
            <ol start="12">
                <li><strong><u>GOOGLE:</u></strong></li>
                <li>This website uses the Google AdWords remarketing service to advertise on third-party websites
                    (including Google) to previous visitors to our site. It could mean that we advertise to previous
                    visitors who haven’t completed a task on our site, for example using the contact form to make an
                    enquiry or complete a checkout. This could be in the form of an advertisement on the Google search
                    results page, or a site in the Google Display Network. Third-party vendors, including Google, use
                    cookies to serve ads based on someone’s past visits to our websites. Of course, any data collected
                    will be used in accordance with our own privacy policy and Google’s privacy policy.</li>
                <li>This website also uses Google Analytics which is web analytics tool provided by Google to help
                    analyze the website traffic. Google analytics puts lines of tracking codes on the website, codes
                    records activities of users such as when they visit website, age of the users, gender and their
                    interests. The data is collected on Google analytics server.</li>
                <li>This website also makes use of Google AdSense which is platform provided by google to display ads
                    right next to the content of the website. It displays relevant and engaging ads to the visitors and
                    users of the website. The Google AdSense works by matching ads to website’s content and visitors.
                    These ads are created and paid by the advertisers who want to promote their products on the
                    platform.</li>
            </ol>
            <ol start="13">
                <li><strong><u>MERGER AND ACQUISITIONS:</u></strong></li>
            </ol>
            <p>In case of a merger or acquisition, we reserve the right to transfer all the information, including
                personally identifiable information, stored with us to the new entity or company thus formed. Any change
                in the Website’s policies and standing will be notified to you through email.</p>
            <ol start="14">
                <li><strong><u>LINKS TO THIRD-PARTY WEBSITE:</u></strong></li>
            </ol>
            <p>Our website contains links to other websites. The fact that we link to a website is not an endorsement,
                authorization or representation of our affiliation with that third party. We do not exercise control
                over third-party websites. These other websites may place their own cookies or other files on your
                computer, collect data or solicit personally identifiable information from you. Other websites follow
                different rules regarding the use or disclosure of the personally identifiable information you submit to
                them. We encourage you to read the privacy policies or statements of the other websites you visit.</p>
            <ol start="15">
                <li><strong><u>NOTIFICATION PROCEDURES:</u></strong></li>
            </ol>
            <p>It is our policy to provide notifications, whether such notifications are required by law or are for
                marketing or other business-related purposes, to you via e-mail notice, written or hard copy notice, or
                through conspicuous posting of such notice on the Website, as determined by us in our sole discretion.
                We reserve the right to determine the form and means of providing notifications to you, provided that
                you may opt out of certain means of notification as described in this Privacy Policy.</p>
            <ol start="16">
                <li><strong><u>OPTING OUT OF INFORMATION SHARING:</u></strong></li>
                <li>We understand and respect that not all users may want to allow us to share their information with
                    other select users or companies. If you do not want us to share your information, please contact us
                    through the Contact Us page, and we will remove your name from lists we share with other users or
                    companies as soon as reasonably practicable or you can also click on unsubscribe. When contacting
                    us, please clearly state your request, including your name, mailing address, email address and phone
                    number. In case you do not want your name to be displayed on the Website, you may opt for the same
                    by choosing a Username other than your original name, you may also hide details of Social Networking
                    Accounts by opting for the same when you are creating an account with us.</li>
                <li>However, under the following circumstances, we may still be required to share your personal
                    information:</li>
                <li>If we respond to court orders or legal process, or if we need to establish or exercise our legal
                    rights or defend against legal claims.</li>
                <li>If we believe it is necessary to share information in order to investigate, prevent or take action
                    regarding illegal activities, suspected fraud, situations involving potential threats to the
                    physical safety of any person, violations of our Terms of Use or as otherwise required by law.<ol>
                        <li>If we believe it is necessary to restrict or inhibit any user from using any of our Website,
                            including, without limitation, by means of “hacking” or defacing any portion thereof.</li>
                    </ol>
                </li>
            </ol>
            <ol start="17">
                <li><strong><u>USER SUBMISSIONS:</u></strong></li>
            </ol>
            <p>You understand that when using the Platform, you will be exposed to Content from a variety of sources,
                and that we are not responsible for the accuracy, usefulness, safety, or intellectual property rights of
                or relating to such Content and you agree and assume all liability for your use. You further understand
                and acknowledge that you may be exposed to Content that is inaccurate, offensive, indecent, or
                objectionable, defamatory or libelous and you agree to waive, and hereby do waive, any legal or
                equitable rights or remedies you have or may have against us with respect thereto. If you find any
                content to be libelous, objectionable, defamatory, and indecent or infringing your Intellectual Property
                Rights, you may contact us directly through “Contact Us” page and we shall take appropriate action to
                remove such content from the Website.</p>
            <ol start="18">
                <li><strong><u>PHISHING OR FALSE EMAILS:</u></strong></li>
            </ol>
            <p>If you receive an unsolicited email that appears to be from us or one of our members that requests
                personal information (such as your credit card, login, or password), or that asks you to verify or
                confirm your account or other personal information by clicking on a link, that email was likely to have
                been sent by someone trying to unlawfully obtain your information, sometimes referred to as a “phisher”
                or “spoofer.” We do not ask for this type of information in an email. Do not provide the information or
                click on the link. Please contact us at <a
                    href="mailto:support@learnme.live">support@learnme.live</a>,&nbsp; if you get an email like this.
            </p>
            <ol start="19">
                <li><strong><u>CHANGES TO OUR PRIVACY POLICY:</u></strong></li>
                <li>We may update this Privacy Policy and information security procedures from time to time. If these
                    privacy and/or information security procedures materially change at any time in the future, we will
                    post the new changes conspicuously on the Website to notify you and provide you with the ability to
                    opt out in accordance with the provisions set forth above. Continued use of our Website and Service,
                    following notice of such changes shall indicate your acknowledgement of such changes and agreement
                    to be bound by the terms and conditions of such changes.</li>
            </ol>
            <ol start="20">
                <li><strong><u>COLLECTION OF INFORMATION BY THIRD-PARTY WEBSITES, SERVICES, AD SERVERS AND
                            SPONSORS:</u></strong></li>
                <li>Our Services may contain links to other Websites or services whose information practices may be
                    different than ours. For example, while using one or more of our Websites, you may link to a third
                    party’s Website via a window opened within (or on top of) our Website. Some of our Services may
                    allow users to interface with third-party Websites or services, such as Facebook and Twitter. You
                    will remain logged into those third-party Websites or services until you actively log off. By
                    interfacing with those third-party Websites or services, you are allowing our Services to access
                    your information that is or becomes available via such third-party Websites or services, and you are
                    agreeing to those third party’s applicable terms and conditions. Once you log onto any such
                    third-party Websites or services, the content you post there may also post to our Services. Our
                    Privacy Policy and procedures may or may not be consistent with the policies and procedures of such
                    third-party Websites or services, and when you visit such Websites or services our Privacy Policy
                    does not apply to personally identifiable information and other data collected by the third party.
                    You should consult, read and understand the privacy notices of such third parties before choosing to
                    provide personally identifiable information on any such Websites or services.</li>
                <li>Our Services may also use a third-party ad server to present the advertisements that you may see on
                    our Services. These third-party ad servers may use cookies, Web beacons, clear .gifs or similar
                    technologies to help present such advertisements, and to help measure and research the
                    advertisements’ effectiveness. The use of these technologies by these third-party ad servers is
                    subject to their own privacy policies and is not covered by our Privacy Policy.</li>
            </ol>
            <ol start="21">
                <li><strong><u>BREACH OF PRIVACY POLICY:</u></strong></li>
            </ol>
            <p>We reserve the right to terminate or suspend your usage of this Website immediately if you are found to
                be in violation of our privacy policy. We sincerely request you to respect privacy and secrecy concerns
                of others. The jurisdiction of any breach or dispute shall <u>be in the state of Delaware.</u></p>
            <ol start="22">
                <li><strong><u>NO RESERVATIONS:</u></strong></li>
            </ol>
            <p>We do not accept any reservation or any type of limited acceptance of our privacy policy. You expressly
                agree to each and every term and condition as stipulated in this policy without any exception
                whatsoever.</p>
            <ol start="23">
                <li><strong><u>NO CONFLICT:</u></strong></li>
            </ol>
            <p>The policy constitutes a part of the user terms. We have taken utmost care to avoid any inconsistency or
                conflict of this policy with any other terms, agreements or guidelines available on our Website. In case
                there exists a conflict, we request you to kindly contact us for the final provision and interpretation.
            </p>
            <ol start="24">
                <li><strong><u>CONTACT US:</u></strong></li>
            </ol>
            <p>If you have any questions about this Privacy Policy, our practices relating to the website, or your
                dealings with us, please  Privacy Team at: <a
                    href="mailto:support@learnme.live">support@learnme.live</a>.</p>
        </div>
    </div>
</section>







@endsection

{{-- content section end --}}

{{-- footer section start --}}


@section('extra-script')

@endsection

{{-- footer section end --}}
<script>

</script>