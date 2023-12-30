<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Image as Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('makeThumbnail',function(){
    ini_set('max_execution_time', 1000000000000000);
    $users = User::where('type','seller')->where('id','>',1449)->get();
    foreach($users as $user){
        $user = User::find($user->id);
        $destinationPath = public_path('uploadfiles/userphoto/thumbnails');
        $image_changed_name = $user->id.'_'.time().'.'.'jpg';
        $header_response = get_headers($user->picture, 1);
        if(strpos($header_response[0], "404") == false){
            $img = Image::make($user->picture)->resize(132, 132);
            $img->save($destinationPath.'/'.$image_changed_name);
            $user->thumbnail = url('/public/uploadfiles/userphoto/thumbnails'.'/'.$image_changed_name);
            $user->save();
        }
        $img = null;
    }
});

Route::get('/cache-clear', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    // Artisan::call('route:cache');
    Artisan::call('view:clear');
    echo "Cache clear successfully";
});

Route::get('/getUserDetail','ProfileController@setCurrentTimezone')->name('setCurrentTimezone');

Route::get('/update-public-profile-in-db',function(){
    $users = User::where('type','seller')->get();
    foreach($users as $user){
        $user = User::find($user->id);
        $user->public_profile = str_replace(' ','',$user->username).'.learnme.live';
        $user->save();
    }
});

Route::get('/migrate', function() {
    Artisan::call('migrate');
});

Route::view('semail','emails.admin.disapprove_user');
Route::view('sasademail','emails.admin.approve_user');
Route::view('check', 'check');
Route::view('terms-of-services', 'frontend.terms_services')->name('terms_services');
Route::view('about', 'frontend.about')->name('about');
Route::view('somethingWrong','frontend.something_wrong')->name('something_wrong');
Route::view('notFound','frontend.not_found')->name('not_found');
Route::get('blog', 'BlogPostController@blogs')->name('blog');
Route::resource('subscriber', 'NewsLetterController');
Route::get('blog/{slug}', 'BlogPostController@blogDetail')->name('blogDetail');
Route::view('blogdetails', 'frontend.blogdetails')->name('blogdetails');
Route::view('posts', 'frontend.settings.posts')->name('posts');
Route::view('addPosts', 'frontend.settings.addPosts')->name('addPosts');
Route::view('events_paymentOption', 'frontend.events_paymentOption')->name('events_paymentOption');
Route::view('concert_tickets', 'frontend.concert_tickets')->name('concert_tickets');
Route::view('events_tickets', 'frontend.events_tickets')->name('events_tickets');
Route::view('partnerships', 'frontend.partnerships')->name('partnerships');
Route::view('contact', 'frontend.contact')->name('contact');
Route::get('events', 'EventController@getEvents')->name('events');
Route::get('e/{name}/{id}', 'EventController@getCategoryEvents')->name('category.events');
Route::view('careers', 'frontend.careers')->name('careers');
Route::view('helpandsupport', 'frontend.helpandsupport')->name('helpandsupport');
Route::view('trustsaftey', 'frontend.trustsaftey')->name('trustsaftey');
Route::view('eventsfooter', 'frontend.eventsfooter')->name('eventsfooter');
Route::view('privacy_policy', 'frontend.privacy_policy')->name('privacy_policy');
Route::get('admin-login','Admin\UserController@login')->name('admin.login');
Route::post('admin-login','Admin\UserController@loginCheck')->name('admin.login');
Route::post('uploadFile','HomeController@uploadAllFiles')->name('uploadFile');
Route::get('search', 'HomeController@search')->name('search');
Route::get('/unauthorize', function () {
    return view('unauthorize');
})->name('unauthorize.user');

Route::get('/','HomeController@home')->name('index');
Route::get('userNameCheck','UserController@usernameCheck')->name('usernameCheck');

Auth::routes();

// Social logins
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');


Route::get('u/{username}', 'UserController@getSpecialistDetail')->name('specialist_detail');
Route::get('e/{slug}', 'EventController@getEventDetail')->name('event_detail');
Route::get('events/{username}', 'EventController@getSpecialistEvents')->name('specialist.events');
Route::get('category/sub_categories','CategoryController@getSubCategories')->name('get.sub_categories');
Route::get('dispute/replies','DisputeReplyController@replies')->name('get.all.dispute.replies');
Route::get('getAllCommentsReplies', 'BlogPostCommentController@index')->name('getAllCommentsReplies');

Route::middleware(['admincheck'])->prefix('admin')->group(function(){
    Route::get('/','Admin\AdminController@index')->name('admin.profile');
    Route::resource('profile','Admin\AdminController');
    Route::get('fee','Admin\AdminController@getCommissionFee')->name('commission.fee');
    Route::put('fee/{id}','Admin\AdminController@updateCommissionFee')->name('dashboard.fee.update');
    Route::get('bookings','Admin\AdminController@bookings')->name('admin.bookings');
    Route::put('profile/update/{id}','Admin\AdminController@update')->name('dashboard.profile.update');
    Route::put('profile/picture/update/{id}','Admin\AdminController@update_avatar')->name('dashboard.profile.picture.update');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('eventCategories', 'Admin\EventCategoryController');
    Route::resource('users', 'Admin\UserController');
    Route::get('posts', 'Admin\BlogPostController@index')->name('adminPosts');
    Route::delete('delete/post/{id}', 'Admin\BlogPostController@destroy')->name('deleteAdminPosts');
    Route::get('posts/create', 'Admin\BlogPostController@create')->name('createPost');
    Route::post('posts/store', 'Admin\BlogPostController@store')->name('storePost');
    Route::post('posts/{id}/approve', 'Admin\BlogPostController@approve')->name('approveAdminPosts');
    Route::post('posts/{id}/disapprove', 'Admin\BlogPostController@disapprove')->name('disapproveAdminPosts');
    Route::put('posts/{id}/update', 'Admin\BlogPostController@update')->name('updatePost');
    Route::get('posts/{id}/edit', 'Admin\BlogPostController@edit')->name('editPost');
    Route::get('posts/{id}/view', 'Admin\BlogPostController@show')->name('viewPost');
    Route::get('client/postings', 'ServiceRequestController@adminClientPosting');
    Route::post('client/postings/{id}', 'ServiceRequestController@adminClientPostingUpdate')->name('admin.client.posting.update');
    Route::resource('/subcategories', 'Admin\SubCategoryController');
    Route::get('password/{id}', 'Admin\AdminController@password')->name('admin.password');
    Route::put('password/{id}', 'Admin\AdminController@update_password')->name('admin.password.update');
    Route::get('disputes','ClientSpecialistDisputeController@index')->name('admin.disputes');
    Route::get('user/disputes/notifications','ClientSpecialistDisputeController@adminUserDisputeNotifications')->name('admin.user.dispute.notification');
    //dispute
    Route::get('dispute/{id}','ClientSpecialistDisputeController@adminShow')->name('admin.dispute.show');
    Route::post('disputes-replies/store','DisputeReplyController@adminStore')->name('admin.reply.store');
    Route::get('disputes/reply/notifications','ClientSpecialistDisputeController@adminDisputeReplyNotifications')->name('admin.dispute.reply.notification');
    Route::get('update/admin/dispute/seen/status','ClientSpecialistDisputeController@updateAdminDisputeSeenStatus')->name('update.admin.dispute.seen.status');
    Route::get('disputes/reply/seen/status','ClientSpecialistDisputeController@adminDisputeReplySeenStatus')->name('admin.dispute.reply.seen.status');

    //payments
    Route::resource('payments', 'Admin\PaymentsController');
    Route::get('/stripe', 'Admin\PaymentsController@stripe');
    Route::get('/stripe/detail', 'Admin\PaymentsController@bookingPaymentDetail')->name('booking.payment.detail');
    Route::post('/stripe/pay', 'Admin\PaymentsController@stripePayment');
    Route::post('confirm/payment','Admin\PaymentsController@confirmPayment')->name('admin.confirm.payment');
});

// usercheck
Route::group(['middleware'=>['auth','specialistcheck','userstatus']],function(){
    Route::post('withdraw_request', 'Specialist\DashboardController@widthdrawRequest');
    Route::resource('posts','BlogPostController');
    Route::resource('user/events','EventController');
    Route::get('event/tickets/detail/{id}','EventController@getEventTicketsUsers')->name('getEventTicketsUsers');
    Route::get('specialist/dashboard', 'Specialist\DashboardController@index')->name('specialist.index');
});

Route::group(['middleware'=>['auth','specialistcheck','userstatus']],function(){
    // Route::resource('specialist', 'SpecialistController');
    Route::resource('services', 'Specialist\ServiceController');
    Route::get('get_service_request/{id}', 'Specialist\DashboardController@getServiceRequest')->name('get_service_request');
});

Route::group(['middleware'=>['auth','userstatus']],function(){
    Route::get('category_specialists/{id}', 'HomeController@category_specialists')->name('category_specialists');
    Route::get('user/appointment/notification','BookingController@userAppointmentNotification')->name('user.appointment.notification');
    Route::get('appointment/notification/status/update/{id}','BookingController@notificationStatusUpdate')->name('appointment.notification.status.update');
    Route::get('portfolio_setting', 'ProfileController@portfolio')->name('portfolio_setting');
    Route::post('portfolio_images', 'ProfileController@portfolioImages')->name('portfolio_images');    
    Route::post('portfolio_image_delete/{id}', 'ProfileController@deleteImage')->name('portfolio_image_delete');    
    Route::get('sub_categories', 'Specialist\ServiceController@getSubCategories')->name('service.get_subcategories');
    Route::resource('profile', 'ProfileController');
    Route::post('/profile/change_avatar', 'ProfileController@update_avatar');
    Route::get('/change-password', 'ProfileController@password');
    Route::post('/password', 'ProfileController@update_password');
    Route::get('specialist-portfolio/{id}', 'UserController@getPortfolio')->name('specialist_portfolio');
    Route::get('portfolio', function () {  return view('frontend.portfolio'); })->name('portfolio');
    Route::get('carousels', function () {  return view('frontend.carousels'); })->name('carousels');
    Route::get('getQueryServices','Specialist\ServiceController@getQueryServices')->name('getQueryServices');
    Route::resource('clients', 'ClientController');
    Route::resource('client', 'Client\ClientController');
    Route::resource('comments', 'BlogPostCommentController');
    Route::resource('replies', 'BlogPostCommentReplyController');
    Route::post('commentLikeDislike','BlogPostCommentController@commentLikeDislike')->name('commentLikeDislike');
    Route::post('replyLikeDislike','BlogPostCommentReplyController@replyLikeDislike')->name('replyLikeDislike');
    Route::resource('servicerequests', 'ServiceRequestController');
    Route::get('sub_categories', 'Client\ClientController@getSubCategories')->name('request.get_subcategories');
    Route::view('client/dashboard','client.index');
    Route::resource('review','ReviewController');
    // payemnts
    Route::get('stripe', 'StripePaymentController@stripe');
    Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
    Route::post('paypalPaymentForAppointment', 'PaypalController@paypalPaymentForAppointment')->name('paypal.payment.for.appointment');
    Route::get('appointmentPaymentStatus', array('as' => 'appointmentPaymentStatus','uses' => 'PaypalController@appointmentPaymentStatus'));
    Route::post('stripePaymentForEventTicket', 'StripePaymentController@stripePaymentForEventTicket')->name('stripe.payment.for.event.ticket');
    Route::post('paypalPaymentForEventTicket', 'PaypalController@paypalPaymentForEventTicket')->name('paypal.payment.for.event.ticket');
    Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
    Route::post('release_payment/{id}','BookingController@releasePayment');
    Route::get('getAppointmentUpdate','BookingController@getAppointmentUpdate')->name('getAppointmentUpdate');
});

Route::group(['middleware'=>['auth','userstatus']],function(){
    Route::view('video', 'video');
    Route::view('createEventCallToken', 'php/sample/RtcTokenBuilderForEvent')->name("createEventCallToken");
    Route::view('test-token', 'php/sample/RtcTokenBuilderSample');
    Route::get('call-checker', 'FirebaseController@callChecker');
    Route::get('call-event-checker', 'FirebaseController@callEventChecker');
    Route::get('getUserInfo','UserController@getUserInfo')->name('getUserInfo');
    Route::get('end-event-call', 'FirebaseController@endEventCall')->name('endEventCall');
    Route::get('update-event-stream-id', 'FirebaseController@updateEventStreamId')->name('updateEventStreamId');
    Route::get('get-event-stream-id', 'FirebaseController@getEventStreamId')->name('getEventStreamId');
    Route::post('call-end', 'FirebaseController@callEnd')->name('call-end');
    Route::resource('bids', 'Specialist\BidController');
    Route::get('event/ticket/{slug}', 'EventController@getEventTicket')->name('get_event_ticket');
    Route::post('bid-work-status', 'Specialist\BidController@changeWorkStatus')->name('bid_work_status');
    Route::resource('appointments', 'BookingController');
    Route::get('getEventUpdate','EventController@getEventUpdate')->name('getEventUpdate');
    Route::get('getCallEndUpdate','FirebaseController@getCallEndUpdate')->name('getCallEndUpdate');
    Route::get('clientRequest', function () {return view('frontend.client_request'); })->name('client_request');
    // Route::get('appointment-request/{id}','AppointmentController@create')->name('appointment_request');
    // Route::post('store-appointment','AppointmentController@storeAppointment')->name('store.appointment');
    Route::get('appointment-request/{id}','BookingController@create')->name('appointment_request');
    Route::post('store-appointment','BookingController@store')->name('store.appointment');
    Route::get('appointmentPayment/{id}','BookingController@loadPaymentView')->name('appointmentPayment');
    Route::get('bidPayment/{id}','Specialist\BidController@loadPaymentView')->name('bidPayment');
    Route::resource('clients', 'ClientController');
    Route::resource('servicerequests', 'ServiceRequestController');
    Route::get('eventTickets','EventController@getEventTicketForSpecificUser')->name('getEventTicketForSpecificUser');
    Route::get('sub-categories', 'Client\ClientController@getSubCategories')->name('request.get_subcategories');
    Route::get('raise-dispute/{project}/{id}',"ClientSpecialistDisputeController@disputeAraise")->name('dispute-araise');
    Route::resource('disputes','ClientSpecialistDisputeController');
    Route::resource('disputes-replies','DisputeReplyController');
    Route::get('user/disputes/notifications','ClientSpecialistDisputeController@userDisputeNotifications')->name('user.dispute.notification');
    Route::get('user/disputes/reply/notifications','ClientSpecialistDisputeController@userDisputeReplyNotifications')->name('user.dispute.reply.notification');
    Route::get('user/disputes/reply/seen/status','ClientSpecialistDisputeController@userDisputeReplySeenStatus')->name('user.dispute.reply.seen.status');
    Route::get('update/dispute/seen/status','ClientSpecialistDisputeController@updateDisputeSeenStatus')->name('update.dispute.seen.status');
});

Route::middleware(['auth'])->group(function(){
    Route::post('save-token','FirebaseController@save_token')->name('save-token');
    Route::get('chat/{id}', 'FirebaseController@singleChat')->name('single.chat');
    Route::get('chat/user/switch/{id}', 'FirebaseController@chatUserSwitch')->name('chat.user.switch');
    Route::get('users/chat', 'FirebaseController@index')->name('chat.index');
    Route::post('chat/store', 'FirebaseController@store')->name('chat.store');
    Route::get('chat/user/update/{id}', 'FirebaseController@chatUserUpdate')->name('chat.user.update');
    Route::get('chat/user/status/{id}', 'FirebaseController@chatUserStatus')->name('chat.user.status');
    Route::get('chat/update/users/{id}', 'FirebaseController@chatUpdatedUsers')->name('chat.updated.users');
});