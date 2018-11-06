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
         'content' => 'required',
         'image' => 'required',
         'sort' => 'required',
         'time_from_date'    => 'required|date',
         'time_from_time'    => 'required|date_format:H:i',
         'time_to_date'    => 'required|date',
         'time_to_time'    => 'required|date_format:H:i',
         'started_at_date'    => 'required|date',
         'started_at_time'    => 'required|date_format:H:i',
         'closed_at_date'    => 'required|date',
         'closed_at_time'    => 'required|date_format:H:i',
//         'time_to'      => 'required|date|after_or_equal:time_from',
      ]);

        // Gộp ngày tháng và thời gian làm 1
        if (isset($data['time_from_date']) and isset($data['time_from_time'])) {
            $data['time_from'] = $data['time_from_date'] . ' ' . $data['time_from_time'];
            unset($data['time_from_date']);
            unset($data['time_from_time']);
        }
        if (isset($data['time_to_date']) and isset($data['time_to_time'])) {
            $data['time_to'] = $data['time_to_date'] . ' ' . $data['time_to_time'];
            unset($data['time_to_date']);
            unset($data['time_to_time']);
        }
        if (isset($data['started_at_date']) and isset($data['started_at_time'])) {
            $data['started_at'] = $data['started_at_date'] . ' ' . $data['started_at_time'];
            unset($data['started_at_date']);
            unset($data['started_at_time']);
        }
        if (isset($data['closed_at_date']) and isset($data['closed_at_time'])) {
            $data['closed_at'] = $data['closed_at_date'] . ' ' . $data['closed_at_time'];
            unset($data['closed_at_date']);
            unset($data['closed_at_time']);
        }
        // end Gộp ngày tháng và thời gian làm 1

        Event::create($data);

        //Upload file image
        if($request->hasFile('image')){
            //Lưu hình ảnh vào thư mục public/image/event
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('image/event');
            $file->move($destinationPath, $fileName);

            $data["image"]= $fileName;
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

        $this->validate($request,[
            'title'=>'required',
            'category_id' => 'required',
            'content' => 'required',
//            'image' => 'required',
            'sort' => 'required',
//            'time_from_date'    => 'required|date',
//            'time_from_time'    => 'required|date_format:H:i',
//            'time_to_date'    => 'required|date',
//            'time_to_time'    => 'required|date_format:H:i',
//            'started_at_date'    => 'required|date',
//            'started_at_time'    => 'required|date_format:H:i',
//            'closed_at_date'    => 'required|date',
//            'closed_at_time'    => 'required|date_format:H:i',
//         'time_to'      => 'required|date|after_or_equal:time_from',
        ]);

        // Gộp ngày tháng và thời gian làm 1
        if (isset($data['time_from_date']) and isset($data['time_from_time'])) {
            $data['time_from'] = $data['time_from_date'] . ' ' . $data['time_from_time'];
            unset($data['time_from_date']);
            unset($data['time_from_time']);
        }
        if (isset($data['time_to_date']) and isset($data['time_to_time'])) {
            $data['time_to'] = $data['time_to_date'] . ' ' . $data['time_to_time'];
            unset($data['time_to_date']);
            unset($data['time_to_time']);
        }
        if (isset($data['started_at_date']) and isset($data['started_at_time'])) {
            $data['started_at'] = $data['started_at_date'] . ' ' . $data['started_at_time'];
            unset($data['started_at_date']);
            unset($data['started_at_time']);
        }
        if (isset($data['closed_at_date']) and isset($data['closed_at_time'])) {
            $data['closed_at'] = $data['closed_at_date'] . ' ' . $data['closed_at_time'];
            unset($data['closed_at_date']);
            unset($data['closed_at_time']);
        }
        // end Gộp ngày tháng và thời gian làm 1

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
