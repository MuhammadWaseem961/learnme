<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\NewsLetter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetterMailToAdmin;

class NewsLetterController extends Controller
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
            'email'=>'required|email|unique:news_letters'
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $letter = new NewsLetter();
        $letter->email = $request->email;
        if($letter->save()){
            Mail::to('newsletter@learnme.live')->send(new NewsLetterMailToAdmin($letter));
            return response()->json(['success' => true, 'message' =>'You has been subscribed successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
