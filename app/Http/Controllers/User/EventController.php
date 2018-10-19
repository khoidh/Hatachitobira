<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\User_event;
use App\Favorite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $previous = Event::select('id', 'title')->where('id', '<', $event->id)->orderBy('id', 'desc')->first();
        if (empty($previous)) {
            $previous = $event;
        }

        // get next $event id
        $next = Event::select('id', 'title')->where('id', '>', $event->id)->orderBy('id', 'asc')->first();
        if (empty($next)) {
            $next = $event;
        }

        // get 6 random records
        $events_random = Event::inRandomOrder()->select('id', 'title')->take(6)->get();

        // get 6 nearest records
        $events_latest = Event::select('id', 'title')->orderBy('updated_at', 'desc')->take(6)->get();

        $data=[
            'event'            => $event,
            'previous'         => $previous,
            'next'             => $next,
            'events_random'    => $events_random,
            'events_latest'    => $events_latest,
        ];
        //////////////// have logged //////////////////////
        if(Auth::user())
        {
            $user_id            = Auth::user()->id;
            $favoritable_type   = (new Event())->getTable();
            $favorites_id= Favorite::where([['user_id',$user_id],
                ['favoritable_type',$favoritable_type]])->pluck('favoritable_id')->toArray();

            $data['favorites_id'] = $favorites_id;

        }
        return view('user.event.show',$data);
    }

    //practical when registering for the event
    public function update(Request $request)
    {
        if($request->register)
        {
            $userEvent = new User_event();
            $userEvent->user_id = $request->user_id;
            $userEvent->event_id = $request->event_id;
            $userEvent->save();
            return redirect()->route('event.index');
        }
        if($request->favorite)
        {
            $favorite = Favorite::where('user_id',$request->user_id)
                    ->where('favoritable_id',$request->event_id)
                    ->where('favoritable_type',(new Event())->getTable())
                    ->exists();
            if(!$favorite)
            {
                $favorite = new Favorite();
                $favorite->user_id = $request->user_id;
                $favorite->favoritable_id = $request->event_id;
                $favorite->favoritable_type = (new Event())->getTable();
                $favorite->save();
            }
            return redirect()->route('event.index');

        }
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
