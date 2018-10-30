<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

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

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request,[
         'title'=>'required',
         'category_id' => 'required',
         'image' => 'required',
         'sort' => 'required',
         'time_from'    => 'required|date',
         'time_to'      => 'required|date|after_or_equal:time_from',
      ]);

        Event::create($data);

        //Upload file image
        if($request->hasFile('image')){

            //Lưu hình ảnh vào thư mục public/image/event
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('image/event');
            $file->move($destinationPath, $fileName);
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

        return view('admin.event.edit', ['event' => $event, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $data = $request->all();

        //Upload file image
        if($request->hasFile('image')) {
            if (isset($data['image_edited_check']) && (bool)$data['image_edited_check'] == true)
            {//if changed image
                //Lưu hình ảnh vào thư mục public/image/event
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('image/event');
                $file->move($destinationPath, $fileName);

                $data["image"] = $fileName;
            }
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
