<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->paginate(10);

        return view('admin.event.index', ['events' => $events]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.event.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Event::create($data);

        return redirect()->route('events.index');
    }

    public function show($id)
    {
        $event = Event::select()
            ->where('events.id', $id)
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->first();

        return view('admin.event.show', ['event' => $event]);
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $categories = Category::all();

        return view('admin.event.edit', ['event' => $event, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $data = $request->all();
        $event->update($data);

        return redirect()->route('events.show',$event->id);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('events.index');
    }
}
