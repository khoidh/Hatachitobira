<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\User_event;
use App\Favorite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    public function index()
    {
        // $events = Event::paginate(3);
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->paginate(3);
        return view('user.event.index', ['events' => $events]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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
                return redirect('/event');

        }
    }

    public function show($id)
    {
        $event = Event::find($id);

        return view('user.event.show', ['event' => $event]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
