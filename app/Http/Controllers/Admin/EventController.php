<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Category;
use App\Taggable;
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
        $cate_id = explode(',', $data['category_id']);
        if($request->hasFile('image_selected')){
            $file = $request->file('image_selected');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('images/admin/event/');
            $file->move($destinationPath, $fileName);
            $data['image']= $fileName;
        }
        $data['category_id'] = 1;
        $events = Event::create($data);
        
        foreach ($cate_id as $key => $value) {
            Taggable::create([
                'category_id' => $value,
                'taggable_id' => $events->id,
                'taggable_type' => (new Event())->getTable()
            ]);
        }

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

        $cate_id = Taggable::where('taggable_id',$event->id)->where('taggable_type',(new Event())->getTable())->pluck('category_id')->toArray();
        if (!$cate_id) {
            array_push($cate_id, $event->category_id);
        }

        return view('admin.event.edit', ['event' => $event, 'categories' => $categories,'cate_id'=>$cate_id]);
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
        $cate_id = explode(',', $data['category_id']);
        $data['category_id'] = 1;
        Taggable::where('taggable_id',$event->id)->where('taggable_type',(new Event())->getTable())->delete();
        foreach ($cate_id as $key => $value) {
            Taggable::create([
                'category_id' => $value,
                'taggable_id' => $event->id,
                'taggable_type' => (new Event())->getTable()
            ]);
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
