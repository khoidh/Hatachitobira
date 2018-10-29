<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Category;
class VideoController extends Controller
{

    public function index()
    {
        $events = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('admin.video.index', ['videos' => $events]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.video.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //Upload file image
        // if($request->hasFile('image')){
        //     //Lưu hình ảnh vào thư mục public/image/video
        //     $file = $request->file('image');
        //     $fileName = time().'_'.$file->getClientOriginalName();
        //     $destinationPath = public_path('image/video');
        //     $file->move($destinationPath, $fileName);
        //     $data['image'] = $fileName;
        // }
        Video::create($data);
        return redirect()->route('videos.index');
    }

    public function show($id)
    {
        $video = Video::select()
            ->where('videos.id', $id)
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->first();

        return view('admin.video.show', ['video' => $video]);
    }

    public function edit($id)
    {
        $video = Video::find($id);
        $categories = Category::all();
        return view('admin.video.edit', ['video' => $video, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $data = $request->all();
        $video->update($data);

        //Upload file image
        if($request->hasFile('image')) {
            //Lưu hình ảnh vào thư mục public/image/video
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('image/video');
            $file->move($destinationPath, $fileName);
        }

        return redirect()->route('videos.show',$video->id);
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
