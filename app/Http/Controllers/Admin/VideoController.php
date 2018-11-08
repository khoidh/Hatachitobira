<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Category;
class VideoController extends Controller
{
    protected $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
    protected $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';

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
        $API_KEY = env('YOUTUBE_API_KEY','AIzaSyAvZofftH6aljZreOzV_owDdOzFdqpvo88');
        $video = new Video;
        $url = $request->url;
        parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
        if(!$youtube)
        {
            return redirect()->back()->with('message','This url not youtube link');
        }
        else
        {
            $id =  $youtube['v'];
            $api_url = $this->BASE_URL . $id . $this->BASE_PART . $API_KEY . '';
            $result = json_decode(file_get_contents($api_url));
            if($result->items)
            {
                $video->category_id = $request->category_id;
                $video->url = $request->url; 
                $video->sort = (int)($request->sort);
                $video->type = (int)($request->type);
                $video->title = $result->items[0]->snippet->title; 
                $video->thumbnails = $result->items[0]->snippet->thumbnails->medium->url; 
                $video->embedHtml = $result->items[0]->player->embedHtml; 
                $video->viewCount = (double)($result->items[0]->statistics->viewCount); 
                $publishedAt = strtotime($result->items[0]->snippet->publishedAt);
                $video->publishedAt = date('Y-m-d H:i:s',$publishedAt);
                
                $video->save();
                return redirect()->route('videos.index');
            }
            else
            {
                return redirect()->back()->with('message','Cant not get youtube information');
            }
            
        }
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
        $API_KEY = env('YOUTUBE_API_KEY','AIzaSyAvZofftH6aljZreOzV_owDdOzFdqpvo88');

        $video = Video::find($id);
        $url = $request->url;
        parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
        if(!$youtube)
        {
            return redirect()->back()->with('message','This url not youtube link');
        }
        else
        {
            $id =  $youtube['v'];
            $api_url = $this->BASE_URL . $id . $this->BASE_PART . $API_KEY . '';
            $result = json_decode(file_get_contents($api_url));
            if($result->items)
            {
                $video->category_id = $request->category_id;
                $video->url = $request->url; 
                $video->sort = (int)($request->sort);
                $video->type = (int)($request->type);
                $video->title = $result->items[0]->snippet->title; 
                $video->thumbnails = $result->items[0]->snippet->thumbnails->medium->url; 
                $video->embedHtml = $result->items[0]->player->embedHtml; 
                $video->viewCount = (double)($result->items[0]->statistics->viewCount); 
                $publishedAt = strtotime($result->items[0]->snippet->publishedAt);
                $video->publishedAt = date('Y-m-d H:i:s',$publishedAt);
                
                $video->save();
                return redirect()->route('videos.show',['id' => $video->id]);
            }
            else
            {
                return redirect()->back()->with('message','Cant not get youtube information');
            }
            
        }
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
