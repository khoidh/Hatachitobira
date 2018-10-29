<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\User_event;
use App\Favorite;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{

    public function index()
    {
//        // $events = Event::paginate(3);
//        $events = Event::select()
//            ->select('events.*','categories.name as category_name')
//            ->join('categories','categories.id','=','events.category_id')
//            ->paginate(3);
//        return view('user.event.index', ['events' => $events]);

        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->where('categories.display', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        if(Auth::user())
        {
            $user_id            = Auth::user()->id;
            $favoritable_type   = (new Event())->getTable();   //Get table name "Events"
            $favorites_id= Favorite::where([['user_id',$user_id],
                ['favoritable_type',$favoritable_type]])->pluck('favoritable_id')->toArray();
            return view('user.event.index', ['events' => $events,'favorites_id'=>$favorites_id]);
        }
        return view('user.event.index', ['events' => $events]);
    }

    public function show($id)
    {
//        $event = Event::find($id);
//
//        return view('user.event.show', ['event' => $event]);

        $event = Event::find($id);
        // get previous $event id
//        $previous = Event::select('id', 'title')->where('id', '<', $event->id)->orderBy('id', 'desc')->first();
//        if (empty($previous)) {
//            $previous = $event;
//        }

        // get next $event id
//        $next = Event::select('id', 'title')->where('id', '>', $event->id)->orderBy('id', 'asc')->first();
//        if (empty($next)) {
//            $next = $event;
//        }

        // get 6 random records
//        $events_random = Event::inRandomOrder()->select('id', 'title')->take(6)->get();

        // get 6 nearest records
//        $events_latest = Event::select('id', 'title')->orderBy('updated_at', 'desc')->take(6)->get();

        $data=[
            'event'            => $event,
//            'previous'         => $previous,
//            'next'             => $next,
//            'events_random'    => $events_random,
//            'events_latest'    => $events_latest,
        ];
        //////////////// have logged //////////////////////
        $data['user_event_register'] = 0;
        if(Auth::user())
        {
            $user_id            = Auth::user()->id;
            $favoritable_type   = (new Event())->getTable();
            $favorites_id= Favorite::where([['user_id',$user_id],
                ['favoritable_type',$favoritable_type]])->pluck('favoritable_id')->toArray();

            $data['favorites_id'] = $favorites_id;

            $data_register = User_event::where('event_id',$id)->where('user_id',$user_id)->first();
            if ($data_register) {
                $data['user_event_register'] = 1;
            }

        }

        $time_now = Carbon::now();
        $time_from = Carbon::parse($event->started_at);
        $time_to = Carbon::parse($event->closed_at);
        $check=$time_now->between($time_from,$time_to);
        if($check)
            $data['event_state']=1;
        else
            $data['event_state']=0;
        return view('user.event.show',$data);
    }

    //practical when registering for the event
    public function update(Request $request)
    {
        $userEvent = new User_event();
        $userEvent->user_id = Auth::User()->id;
        $userEvent->event_id = $request->event_id;
        $userEvent->save();
        

        $thisUser = User_event::select()
            ->select('events.*','users.*')
            ->join('events','events.id','=','user_events.event_id')
            ->join('users','users.id','=','user_events.user_id')
            ->where('user_events.id',$userEvent->id)
            ->first();
        
        Mail::send('email.eventusers',compact('thisUser'),
           function($mail) use($thisUser)
           {
               $mail->to($thisUser->email)->subject('Hatachi Tobira');
           }
        );

        return view('thank_enquiry');
           
    }

    public function delete(Request $request){
        User_event::where('event_id',$request->event_id)->where('user_id',Auth::User()->id)->delete();
        return redirect()->route('event.show', $request->event_id);
    }

    public function favorite(Request $request)
    {
        $favorite = Favorite::where('user_id',$request->user_id)
            ->where('favoritable_id',$request->video_id)
            ->where('favoritable_type',(new Event())->getTable())
            ->exists();
        if(!$favorite)
        {
            $favorite = new Favorite();
            $favorite->user_id = $request->user_id;
            $favorite->favoritable_id = $request->video_id;
            $favorite->favoritable_type = (new Event())->getTable();
            $favorite->save();
            return json_encode("ok");
        }else {
            $favorite = Favorite::where('user_id',$request->user_id)
            ->where('favoritable_id',$request->video_id)
            ->where('favoritable_type',(new Event())->getTable())
            ->delete();
            return json_encode("notok");
        }
    }

}
