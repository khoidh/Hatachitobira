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
        $events = Event::all();
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
            $favorite = new Favorite();
            $favorite->user_id = $request->user_id;
            $favorite->favoritable_id = $request->event_id;
            $favorite->favoritable_type = $favorite->getTable();
            $favorite->save();
            return redirect()->route('event.index');
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
