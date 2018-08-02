<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Category;
use Illuminate\Support\Facades\DB;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->get();

        return view('admin.video.index', ['videos' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.video.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->category_id = $request->category_id;
        $video->url = $request->url;
        $video->description = $request->description;
        $video->image = $request->image;
        $video->sort = $request->sort;
        $video->save();
        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::select()
            ->where('videos.id', $id)
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->first();

        // viewにデータを渡す
        return view('admin.video.show', ['video' => $video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $categories = Category::all();
        return view('admin.video.edit', ['video' => $video, 'categories' => $categories]);
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
        $video = Video::find($id);
        $video->category_id = $request->category_id;
        $video->url = $request->url;
        $video->description = $request->description;
        $video->image = $request->image;
        $video->sort = $request->sort;
        $video->save();
        return redirect()->route('videos.show',$video->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
