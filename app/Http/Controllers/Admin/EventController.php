<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\EventRequest;

use Illuminate\Foundation\Validation\ValidatesRequests;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('admin.event.index', ['events' => $events]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.event.create', ['categories' => $categories]);
    }

    public function store(EventRequest $request)
    {
        $data = $request->all();
        $data['time_from']  = date('Y-m-d H:i:s',strtotime($data['time_from']));
        $data['time_to']    = date('Y-m-d H:i:s',strtotime($data['time_to']));
        $data['started_at'] = date('Y-m-d H:i:s',strtotime($data['started_at']));
        $data['closed_at']   = date('Y-m-d H:i:s',strtotime($data['closed_at']));

        if($request->hasFile('image_selected')){
            $file = $request->file('image_selected');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('images/admin/event/');
            $file->move($destinationPath, $fileName);
            $data['image']= $fileName;
        }

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

    public function update(EventRequest $request, $id)
    {
        $event = Event::find($id);
        $data = $request->all();
        $data['time_from']  = date('Y-m-d H:i:s',strtotime($data['time_from']));
        $data['time_to']    = date('Y-m-d H:i:s',strtotime($data['time_to']));
        $data['started_at'] = date('Y-m-d H:i:s',strtotime($data['started_at']));
        $data['closed_at']   = date('Y-m-d H:i:s',strtotime($data['closed_at']));

        if($request->hasFile('image_selected')){
            $file = $request->file('image_selected');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('images/admin/event/');
            $file->move($destinationPath, $fileName);
            $data['image']= $fileName;
        }


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
