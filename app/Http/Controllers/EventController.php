<?php

namespace App\Http\Controllers;

use App\EventCategory;
use App\Admin;
use App\Event;
use App\EventTicket;
use App\User;
use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Session;

class EventController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = Event::where('user_id',Auth::user()->id)->where('status','pending')->get();
        $complete = Event::where('user_id',Auth::user()->id)->where('status','complete')->get();
        return view('frontend.settings.events.events',compact('pending','complete'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EventCategory::all();
        return view('frontend.settings.events.add_event',compact('categories'));
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
            'category_id'=>'required',
            'title'=>'required',
            'date_time'=>'required',
            'price'=>'required',
            'location'=>'required',
            // 'summary'=>'required|min:50|max:150',
            'description'=>'required',
            // 'image'=>'required|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
    
        $event = new Event();
        $event->user_id = Auth::user()->id;
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->slug = $request->title;
        $event->price = $request->price;
        $event->date_time = $request->date_time;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->image = $request->image;
        if($event->save()){
            return response()->json(['success' => true, 'message' =>'Event has been added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categories = EventCategory::all();
        return view('frontend.settings.events.edit_event',compact('event','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $validations = Validator::make($request->all(),[
            'category_id'=>'required',
            'title'=>'required',
            'date_time'=>'required',
            'price'=>'required',
            'location'=>'required',
            // 'summary'=>'required|min:50|max:150',
            'description'=>'required',
            // 'image'=>'mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        // $img = $this->uploadImage('image','/uploadfiles/events',$request,$event->image);
    
        $event->user_id = Auth::user()->id;
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->slug = $request->title;
        $event->price = $request->price;
        $event->date_time = $request->date_time;
        $event->location = $request->location;
        $event->image = $request->image;
        $event->description = $request->description;
        
        if($event->save()){
            return response()->json(['success' => true, 'message' =>'Event has been updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Event::where('id',$id)->delete()){
            EventTicket::where('event_id',$id)->delete();
            return response()->json(['success' => true, 'message' =>'Event has been deleted successfully']);
        }
    }

    // get category events
    public function getCategoryEvents($name,$id){
        $categories = EventCategory::join('events','event_categories.id','=','events.category_id')->where('event_categories.id','!=',$id)->where('events.date_time','>=',date('Y-m-d'))->select('event_categories.id','event_categories.title')->groupBy('event_categories.title')->get();
        // $categories = DB::select("select c.id,c.title from event_categories as c inner join events as e on c.id=e.category_id where c.id !=$id group by c.title");
        // $events = DB::select("select u.id,u.username,u.rating,e.title,e.price,e.image,e.slug,e.location,e.date_time,count('select * from tb_user as u inner join events as e on e.user_id=u.id where e.category_id=$id and date_time >= curdate() group by user_id') -1 as singleUserCount from tb_user as u inner join events as e on e.user_id=u.id where e.category_id=$id and date_time >= curdate() group by user_id order by date_time asc");
        $events = Event::where('category_id',$id)->where('date_time','>=',date('Y-m-d'))->paginate(8);
        return view('frontend.events',compact('events','categories'));
    }

    // get events 
    public function getEvents(){
        $categories = EventCategory::join('events','event_categories.id','=','events.category_id')->where('events.date_time','>=',date('Y-m-d'))->select('event_categories.id','event_categories.title')->groupBy('event_categories.title')->get();
        // $categories = DB::select("select c.id,c.title from event_categories as c inner join events as e on c.id=e.category_id group by c.title")->get();
        // $events = DB::select("select u.id,u.username,u.rating,e.title,e.price,e.image,e.slug,e.location,e.date_time,count('select * from tb_user as u inner join events as e on e.user_id=u.id where date_time >= curdate() group by user_id') -1 as singleUserCount from tb_user as u inner join events as e on e.user_id=u.id where date_time >= curdate() group by user_id order by date_time asc");
        $events = Event::where('date_time','>=',date('Y-m-d'))->paginate(8);
        return view('frontend.events',compact('events','categories'));
    }

    // get specialist events
    public function getSpecialistEvents($username)
    {
        $categories = EventCategory::join('events','event_categories.id','=','events.category_id')->where('events.date_time','>=',date('Y-m-d'))->select('event_categories.id','event_categories.title')->groupBy('event_categories.title')->get();
        $user = User::where('username',$username)->first();
        $events = Event::where('user_id',$user->id)->where('date_time','>=',date('Y-m-d'))->get();
        return view('frontend.specialist_events',compact('events','categories'));
    }

    // get event detail
    public function  getEventDetail($slug){
        $categories = EventCategory::join('events','event_categories.id','=','events.category_id')->where('events.date_time','>=',date('Y-m-d'))->select('event_categories.id','event_categories.title')->groupBy('event_categories.title')->get();
        $event = Event::where('slug',$slug)->first();
        if(Auth::check() && EventTicket::where('event_id',$event->id)->where('user_id',Auth::user()->id)->first()!=null){
            $check = false;
        }else{
            $check = true;
        }
        return view('frontend.event_detail',compact('event','check','categories'));
    }

    // load view event for ticket payment
    public function getEventTicket($slug)
    {
        $categories = EventCategory::join('events','event_categories.id','=','events.category_id')->where('events.date_time','>=',date('Y-m-d'))->select('event_categories.id','event_categories.title')->groupBy('event_categories.title')->get();
        $admin = Admin::first();
        $event = Event::where('slug',$slug)->first();
        if(EventTicket::where('event_id',$event->id)->where('user_id',Auth::user()->id)->first()!=null){
            $check = false;
        }else{
            $check = true;
        }
        return view('frontend.event_payment',compact('event','admin','check','categories'));
    }

    // get event tickets for specific user
    public function getEventTicketForSpecificUser(){
        $tickets = EventTicket::where('user_id',Auth::user()->id)->get();
        return view('frontend.settings.events.event_tickets',compact('tickets'));
    }

    // get event ticket users
    public function getEventTicketsUsers($id){
        $event = Event::where('id',$id)->first();
        $tickets = $event->tickets;
        return view('frontend.settings.events.event_tickets_detail',compact('tickets'));
    }

    // get event update 
    public function getEventUpdate(){
        date_default_timezone_set(Auth::user()->timezone);
        $currentDate = strtotime(date('Y-m-d h:i:s a'));
        $events = Event::join('event_tickets','events.id','=','event_tickets.event_id')->where('event_tickets.user_id', Auth::user()->id)->select('events.id','events.date_time','events.status','event_tickets.id as ticket_id')->get();
        $arr = [];
        foreach($events as $event)
        {
            $arrInner['id'] = $event->ticket_id;
            $arrInner['check'] = $event->status;
            if($event->status=="pending" && time()>=((strtotime($event->date_time)) - 600) && time()<=((strtotime($event->date_time)) + 600)){
                $arrInner['status'] = true;
            }else{
                $arrInner['status'] = false;
            }
            $arr[] = $arrInner;
        }
        return $arr;
    }

}
