<?php

namespace App\Http\Controllers\Client;

use App\Category;
use App\Http\Controllers\Controller;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\ServiceRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set(Auth::user()->timezone);
        $agoDate = \Carbon\Carbon::now()->addDays(2)->timezone(Auth::user()->timezone)->format('d F Y');
        $agoDate = strtotime($agoDate)*1000;
        $currentDate = strtotime(date('d F Y',time()))*1000;
        $appointments = Booking::where('buyer_id', Auth::user()->id)->whereIn('state', ['1','2'])->where('paystate','1')->whereBetween('service_date', [(string)$currentDate, (string)$agoDate])->orderBy('service_date', 'ASC')->get();
        $categories = Category::all();
        $service_requests = ServiceRequest::where('user_id',Auth::user()->id)->get();
        $popularServices = Category::join('tb_servicecategory','tb_categories.title','=','tb_servicecategory.name')->whereNotIn('tb_categories.title',['All','all'])->select(['tb_categories.id','tb_categories.title','tb_categories.image'])->groupBy('tb_categories.title')->get();
        return view('client.dashboard',compact('appointments', 'categories','service_requests','popularServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $appointments = Appointment::where('user_id',Auth::user()->id)->get();
        // return view('client.appointment',compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getSubCategories(Request $request)
    {
        $subcategories = Category::where('id', $request->id)->first()->subcategories;
        return view('specialist/services/get_subcategories', compact('subcategories'))->render();
    }
}
