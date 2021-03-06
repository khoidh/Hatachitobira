<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Category;
use App\Taggable;
use App\Models\VideoType;
use App\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    protected $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
    protected $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';

    public function index()
    {
        $events = Video::select()
            ->select('videos.*','categories.name as category_name','video_types.name as type_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->join('video_types','video_types.id','=','videos.type')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('admin.video.index', ['videos' => $events]);
    }

    public function create()
    {
        $categories = Category::all();
        $types = VideoType::all();

        return view('admin.video.create', [
                'categories' => $categories,
                'types' => $types
            ]);
    }

    public function store(VideoRequest $request)
    {
        $API_KEY = config('app.youtube_api_key');
        $video = new Video;
        $url = $request->url;
        parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
        if(!$youtube)
        {
            return redirect()->back()->with('message',__('youtubeのリンクではありません。'));
        }
        else
        {
            $id =  $youtube['v'];
            $api_url = $this->BASE_URL . $id . $this->BASE_PART . $API_KEY . '';
            $result = json_decode(file_get_contents($api_url));
            if($result->items)
            {
                $video->category_id = 1;
                $video->url = $request->url; 
                $video->sort = (int)($request->sort);
                $video->type = (int)($request->type);
                $video->display = (int)($request->display);
                if($request->title)
                    $video->title = $request->title;
                else 
                    $video->title = $result->items[0]->snippet->title; 
                $video->thumbnails = $result->items[0]->snippet->thumbnails->high->url; 
                $video->embedHtml = $result->items[0]->player->embedHtml; 
                $video->viewCount = (double)($result->items[0]->statistics->viewCount); 
                $published_at = strtotime($result->items[0]->snippet->publishedAt);
                $video->published_at = date('Y-m-d H:i:s',$published_at);
                
                $video->save();

                $cate_id = explode(',', $request->category_id);
                foreach ($cate_id as $key => $value) {
                    Taggable::create([
                        'category_id' => $value,
                        'taggable_id' => $video->id,
                        'taggable_type' => (new Video())->getTable()
                    ]);
                }
                return redirect()->route('videos.index');
            }
            else
            {
                return redirect()->back()->with('message',__('youtubeの情報を取得出来ませんでした。'));
            }
            
        }
    }

    public function show($id)
    {
        $video = Video::select()
            ->where('videos.id', $id)
            ->select('videos.*','categories.name as category_name','video_types.name as type_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->join('video_types','video_types.id','=','videos.type')
            ->first();

        return view('admin.video.show', ['video' => $video]);
    }

    public function edit($id)
    {
        $video = Video::find($id);
        $types = VideoType::all();
        $categories = Category::all();

        $cate_id = Taggable::where('taggable_id',$video->id)->where('taggable_type',(new Video())->getTable())->pluck('category_id')->toArray();
        if (!$cate_id) {
            array_push($cate_id, $video->category_id);
        }

        return view('admin.video.edit', [
            'video'         => $video,
            'cate_id'       => $cate_id,
            'categories'    => $categories,
            'types'         => $types
        ]);
    }

    public function update(VideoRequest $request, $id)
    {
        $API_KEY = config('app.youtube_api_key');

        $video = Video::find($id);
        $url = $request->url;
        parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
        if(!$youtube)
        {
            return redirect()->back()->with('message', __('youtubeのリンクではありません。'));
        }
        else
        {
            $id =  $youtube['v'];
            $api_url = $this->BASE_URL . $id . $this->BASE_PART . $API_KEY . '';
            $result = json_decode(file_get_contents($api_url));
            if($result->items)
            {
                $video->category_id = 1;
                $video->url = $request->url; 
                $video->sort = (int)($request->sort);
                $video->type = (int)($request->type);
                $video->display = (int)($request->display);
                if($request->title)
                    $video->title = $request->title;
                else 
                    $video->title = $result->items[0]->snippet->title; 
                $video->thumbnails = $result->items[0]->snippet->thumbnails->high->url; 
                $video->embedHtml = $result->items[0]->player->embedHtml; 
                $video->viewCount = (double)($result->items[0]->statistics->viewCount); 
                $published_at = strtotime($result->items[0]->snippet->publishedAt);
                $video->published_at = date('Y-m-d H:i:s',$published_at);
                    
                $video->save();

                $cate_id = explode(',', $request->category_id);
                Taggable::where('taggable_id',$video->id)->where('taggable_type',(new Video())->getTable())->delete();
                foreach ($cate_id as $key => $value) {
                    Taggable::create([
                        'category_id' => $value,
                        'taggable_id' => $video->id,
                        'taggable_type' => (new Video())->getTable()
                    ]);
                }
                return redirect()->route('videos.show',['id' => $video->id]);
            }
            else
            {
                return redirect()->back()->with('message', __('youtubeの情報を取得出来ませんでした。'));
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
