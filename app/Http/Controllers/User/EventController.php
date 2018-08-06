<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\User_event;
use App\Favorite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Event::paginate(3);
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->paginate(3);
        return view('user.event.index', ['events' => $events]);
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
     * Xử lý khi user đăng ký event,like event
     *
     */
    public function store(Request $request)
    {
        if($request->register)
        {
            $userEvent = new User_event();
            $userEvent->user_id = $request->user_id;
            $userEvent->event_id = $request->event_id;
            $userEvent->save();
            return redirect('/event');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        // viewにデータを渡す
        return view('user.event.show', ['event' => $event]);
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
