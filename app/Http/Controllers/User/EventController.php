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
use Illuminate\Support\Facades\Validator;

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
            ->orderBy('started_at', 'desc')
            ->orderBy('closed_at', 'desc')
            ->orderBy('time_from', 'desc')
            ->orderBy('time_to', 'desc')
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
        $event = Event::find($id);
        $data=[
            'event'            => $event,
        ];
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
        return view('user.event.show',$data);
    }

    //practical when registering for the event
    public function update(Request $request)
    {
        $data = User_event::where('user_id',Auth::User()->id)->where('event_id',$request->event_id)->first();
        if ($data) {
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
        }else {
            $data = $request->all();
            $validation = Validator::make($data, [
                'school' => 'required',
                'school_year' => 'required',
                'name' => 'required',
                'phone_number' => 'required',
                'email' => 'required|string|email|max:50|min:11',
            ]);

            if ($validation->fails()) {
                return redirect()->route('event.show', $request->event_id)
                    ->withErrors($validation)
                    ->withInput();
            }else {

                $userEvent = new User_event();
                $userEvent->user_id = Auth::User()->id;
                $userEvent->event_id = $request->event_id;
                $userEvent->save();

                $thisUser = User_event::select()
                    ->select('events.*', 'users.*')
                    ->join('events', 'events.id', '=', 'user_events.event_id')
                    ->join('users', 'users.id', '=', 'user_events.user_id')
                    ->where('user_events.id', $userEvent->id)
                    ->first();

                $thisUser_add = array_merge($data, $thisUser->getAttributes());
                Mail::send('email.eventusers', compact('thisUser_add'),
                    function ($mail) use ($thisUser) {
                        $mail->to($thisUser->email)->subject($thisUser->title . '｜申込確認メール');
                    }
                );
                Mail::send('email.eventusers', compact('thisUser_add'),
                    function ($mail) use ($thisUser) {
                        $mail->to(config('mail.mail_admin'))->subject($thisUser->title . '｜申込確認メール');
                    }
                );

                return view('user.event.thank_event', ['thisUser' => $thisUser]);
            }
        }

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
