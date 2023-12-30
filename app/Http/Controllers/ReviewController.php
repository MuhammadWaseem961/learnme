<?php

namespace App\Http\Controllers;

use App\Review;
use App\Booking;
use Illuminate\Http\Request;
use Validator;
use App\Models\Appointment;
use App\Models\Bid;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validations = Validator::make($request->all(),[
            'rating'=>'required',
            'review'=>'required|max:50',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        $review = new Review();

        if($request->review_from=='bids'){
            $booking = Booking::where('project_type','bids')->where('project_id',$request->review_item_id)->first();
            $project = Bid::where('id',$request->review_item_id)->first();
            $project->review_status =1;
            $project->save();
            $review->buyer_id = $project->serviceRequest->user->id;
            $review->seller_id = $project->specialist_id;
            $review->buyer_name = $project->serviceRequest->user->username;
            $review->buyer_picture = $project->serviceRequest->user->picture;
        }else{
            $booking = Booking::find($request->review_item_id);
            $review->buyer_id = $booking->buyer_id;
            $review->seller_id = $booking->seller_id;
            $review->buyer_name = $booking->user->username;
            $review->buyer_picture = $booking->user->picture;
            $review->service_date = $booking->service_date;
        }
        
        $review->review = $request->review;
        $review->rating = $request->rating;
        $booking->review = $request->review;
        $booking->state = '3';
        $booking->rating = $request->rating;
        $booking->save();

        if($review->save())
        {
            return response()->json(['success' => true, 'message' =>"Review has been added successfully"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
