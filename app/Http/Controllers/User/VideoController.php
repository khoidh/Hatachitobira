<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Video;
Use App\Models\VideoType;
Use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{

    public function index(Request $request)
    {
        $video_types = VideoType::all();
        $videos = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display', 1)
            ->where('videos.type', '!=', 3)
            ;

        $selected_video_type_id = '';
        if ($request->has('slug')) {
            $videos = $videos->where('video_types.slug', $request->get('slug'));
            $selected_video_type = VideoType::where('slug', $request->get('slug'))->first();
            if (isset($selected_video_type)) {
                $selected_video_type_id = $selected_video_type->id;
            }
        }
        $videos =$videos->orderBy('sort','desc')->orderBy('published_at','desc')->orderBy('id','desc')->paginate(9);
        foreach ($videos as $video)
        {

            $like = 0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $favorite = Favorite::where('user_id',$user_id)
                ->where('favoritable_id',$video->id)
                ->where('favoritable_type','videos')->get();
                if (count($favorite)>0) {
                    $like =1;
                }
            }
            $video->favorite = $like;
            $date1 = new DateTime();
            $date2 = new DateTime($video->published_at);
            $interval = $date2->diff($date1);
            $video->date_diff = $interval->m;

        }

        return view('user.video.index', [
            'videos' => $videos,
            'video_types'=>$video_types,
            'selected_video_type_id'=>$selected_video_type_id
        ]);
    }

    public function videoSearchCategory(Request $request) {
        $data = $request->all();
        
        $categories = VideoType::all();
        $videos = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display', 1)
            ->where('videos.type', '!=', 3)
            ;

        if (isset($data['category']) && $data['category'] != 0) {
            $videos =$videos->where('category_id',$data['category']);
        }

        $videos =$videos->orderBy('sort','desc')->orderBy('published_at','desc')->orderBy('id','desc')->paginate(9);

        /*End filter*/
        $videos = $videos->get();
        foreach ($videos as $video)
        {
            $like = 0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $favorite = Favorite::where('user_id',$user_id)
                ->where('favoritable_id',$video->id)
                ->where('favoritable_type','videos')->get();
                if (count($favorite)>0) {
                    $like =1;
                }
            }
            $video->favorite = $like;
            $date1 = new DateTime();
            $date2 = new DateTime($video->published_at);
            $interval = $date2->diff($date1);
            $video->date_diff = $interval->m;
        }

        return view('user.video.search', ['videos' => $videos]);
    }

    public function videoSearchText(Request $request) {
       
        
        $videos = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display', 1)
            ->where('videos.type', '!=', 3)
            ;

        if($request->video_type !='')
        {
            $video_type = $request->video_type;
            $videos = $videos->where('type',$video_type);
        }
        
        if($request->description !='')
        {
            $description = $request->description;
            $videos = $videos->where('title','like',"%$description%");
        }
        
        /*End filter*/
        $videos = $videos->orderBy('sort','desc')->orderBy('published_at','desc')->orderBy('id','desc')->paginate(9);

        foreach ($videos as $key => $video)
        {
            $like =0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $favorite = Favorite::where('user_id',$user_id)
                ->where('favoritable_id',$video->id)
                ->where('favoritable_type','videos')->get();
                if (count($favorite)>0) {
                    $like =1;
                }
            }
            $video->favorite = $like;
            
            $date1 = new DateTime();
            $date2 = new DateTime($video->published_at);
            $interval = $date2->diff($date1);
            $video->date_diff = $interval->m;

        }
        return view('user.video.search', ['videos' => $videos]);
    }

    public function favorite(Request $request)
    {

        $favorite = Favorite::where('user_id',$request->user_id)
            ->where('favoritable_id',$request->video_id)
            ->where('favoritable_type',(new Video())->getTable())
            ->exists();
        if(!$favorite)
        {
            $favorite = new Favorite();
            $favorite->user_id = $request->user_id;
            $favorite->favoritable_id = $request->video_id;
            $favorite->favoritable_type = (new Video())->getTable();
            $favorite->save();
            return json_encode('ok');
        }
        else {
            $favorite = Favorite::where('user_id',$request->user_id)
            ->where('favoritable_id',$request->video_id)
            ->where('favoritable_type',(new Video())->getTable())
            ->delete();
            return json_encode('notok');
        }
    }
}
