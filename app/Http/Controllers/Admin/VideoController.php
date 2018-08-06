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
            ->get();

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
        return redirect()->route('videos.show',$video->id);
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
