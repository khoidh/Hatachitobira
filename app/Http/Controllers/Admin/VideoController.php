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
        $video = new Video;
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        $url = $request->url;
        parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
        $id =  $youtube['v'];
        $api_url = $BASE_URL . $id . $BASE_PART . $api_key . '';
        $result = json_decode(file_get_contents($api_url));

        $video->category_id = $request->category_id;
        $video->url = $request->url; 
        $video->sort = $request->sort;
        $video->type = $request->type;
        $video->title = $result->items[0]->snippet->title; 
        $video->thumbnails = $result->items[0]->snippet->thumbnails->standard->url; 
        $video->embedHtml = $result->items[0]->player->embedHtml; 
        $video->viewCount = $result->items[0]->statistics->viewCount; 
        $video->save();
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
        
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        $url = $request->url;
        parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
        $id =  $youtube['v'];
        $api_url = $BASE_URL . $id . $BASE_PART . $api_key . '';
        $result = json_decode(file_get_contents($api_url));

        $video->category_id = $request->category_id;
        $video->url = $request->url; 
        $video->sort = $request->sort;
        $video->type = $request->type;
        $video->title = $result->items[0]->snippet->title; 
        $video->thumbnails = $result->items[0]->snippet->thumbnails->standard->url; 
        $video->embedHtml = $result->items[0]->player->embedHtml; 
        $video->viewCount = $result->items[0]->statistics->viewCount; 
        $video->save();

        return redirect()->route('videos.show',$video->id);
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
