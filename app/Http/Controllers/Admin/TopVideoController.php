<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TopVideos;
use App\Models\VideoType;
use App\Http\Requests\TopVideosRequest;

class TopVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_videos = TopVideos::select()
            ->select('top_videos.*','video_types.name as type')
            ->join('video_types','video_types.id','=','top_videos.video_type_id')
            ->orderBy('id','desc')
            ->paginate(10);
        return view('admin.top_videos.index', ['top_videos' => $top_videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = VideoType::all();

        return view('admin.top_videos.create', [
                'types' => $types
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopVideosRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $data['thumbnail'] = $fileName;
            $destinationPath = public_path('images/admin/top_videos');
            $file->move($destinationPath, $fileName);
        }
        TopVideos::create($data);
        return redirect()->route('topvideos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $top_video = TopVideos::where('top_videos.id',$id)
            ->select('top_videos.*','video_types.name as type')
            ->join('video_types','video_types.id','=','top_videos.video_type_id')
            ->first();
        return view('admin.top_videos.show', ['top_video' => $top_video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = VideoType::all();
        $top_video = TopVideos::find($id);
        return view('admin.top_videos.edit', [
                'types' => $types,
                'top_video' => $top_video
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopVideosRequest $request, $id)
    {
        $top_video = TopVideos::find($id);
        $data = $request->all();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $data['thumbnail'] = $fileName;
            $destinationPath = public_path('images/admin/top_videos');
            $file->move($destinationPath, $fileName);
        }
        $top_video->fill($data)->save();
        return redirect()->route('topvideos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = TopVideos::find($id);
        $video->delete();
        return redirect()->route('topvideos.index');
    }
}
