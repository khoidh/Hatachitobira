<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->get();

        return view('admin.event.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.event.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->category_id = $request->category_id;

        /*TODO xử lý upload ảnh */

        $event->image = $request->image;
        $event->sort = $request->sort;
        $event->time_from = $request->time_from;
        $event->time_to = $request->time_to;
        $event->save();
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::select()
            ->where('events.id', $id)
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->first();

        // viewにデータを渡す
        return view('admin.event.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $categories = Category::all();
        return view('admin.event.edit', ['event' => $event, 'categories' => $categories]);
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
        $event = Event::find($id);
        $event->title = $request->title;
        $event->category_id = $request->category_id;
        $event->image = $request->image;
        $event->sort = $request->sort;
        $event->time_from = $request->time_from;
        $event->time_to = $request->time_to;
        $event->save();
        return redirect()->route('events.show',$event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        // 削除
        $event->delete();
        // 一覧にリダイレクト
        return redirect()->route('events.index');
    }
}
