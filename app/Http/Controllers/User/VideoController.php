<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Video;
Use App\Category;
Use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{

    public function index(Request $request)
    {
        /*
             *  API Youtube information
             *
             */
    //        $api_key = env('YOUTUBE_API_KEY');
            
            /**/

        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        
        $categories = Category::where('display',1)->get();
        $videos = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->orderBy('id','desc');

        
        /*End filter*/
        $videos = $videos->get();
        $results = array();
        foreach ($videos as $video)
        {

            $url = $video->url;
            parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
            $id =  $youtube['v'];
            $api_url = $BASE_URL . $id . $BASE_PART . $api_key . '';
            $result = json_decode(file_get_contents($api_url));
            $result->id = $video->id;
            $result->category = $video->category_name;
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
            $result->favorite = $like;
            if (isset($result->items[0])) {
                $date1 = new DateTime();
                $date2 = new DateTime($result->items[0]->snippet->publishedAt);
                $interval = $date2->diff($date1);
                $result->date_diff = $interval->m;
                
                array_push($results,$result);
            }
        }
       
        /*Pagination */

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($results);
        /*Sau này sẽ sửa perPage = 9*/
        $perPage = 9;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath('video');
        /*End pagination*/

        return view('user.video.index', ['videos' => $videos, 'results' => $paginatedItems,'categories'=>$categories]);
//        return view('user.video.index', ['videos' => $videos, 'results' => $results]);
    }

    public function videoSearchCategory(Request $request) {
        $data = $request->all();
        

        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        
        $categories = Category::where('display',1)->get();
        $videos = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id');

        if (isset($data['category']) && $data['category'] != 0) {
            $videos =$videos->where('category_id',$data['category']);
        }

        $videos =$videos->orderBy('id','desc')->get();

        /*End filter*/
        $results = array();
        foreach ($videos as $video)
        {
            $url = $video->url;
            parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
            $id =  $youtube['v'];
            $api_url = $BASE_URL . $id . $BASE_PART . $api_key . '';
            $result = json_decode(file_get_contents($api_url));
            $result->id = $video->id;
            $result->category = $video->category_name;
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
            $result->favorite = $like;
            if (isset($result->items[0])) {
                $date1 = new DateTime();
                $date2 = new DateTime($result->items[0]->snippet->publishedAt);
                $interval = $date2->diff($date1);
                $result->date_diff = $interval->m;
                array_push($results,$result);
            }
        }

        /*Pagination */

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($results);
        $perPage = 9;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath('video');
        /*End pagination*/
        return view('user.video.search', ['results' => $paginatedItems]);
    }

    public function videoSearchText(Request $request) {
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        
        $videos = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id');

        
        if($request->category_id !='')
        {
            $category_id = $request->category_id;
            $videos = $videos->where('category_id',$category_id);
        }
        
        
        /*End filter*/
        $videos = $videos->orderBy('id','desc')->get();
        $results = array();
        foreach ($videos as $key => $video)
        {
            $url = $video->url;
            parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
            $id =  $youtube['v'];
            $api_url = $BASE_URL . $id . $BASE_PART . $api_key . '';
            $result = json_decode(file_get_contents($api_url));
            $result->id = $video->id;
            $result->category = $video->category_name;
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
            $result->favorite = $like;
            if (isset($result->items[0])) {
                $date1 = new DateTime();
                $date2 = new DateTime($result->items[0]->snippet->publishedAt);
                $interval = $date2->diff($date1);
                $result->date_diff = $interval->m;

                if($request->description != '')
                {
                    $description = $request->description;
                    
                    // $videos = $videos->where('videos.description','like',"%$description%");
                    if (stristr($result->items[0]->snippet->title,$description)) {
                        array_push($results,$result);
                    }
                }else {
                    array_push($results,$result);
                }
            }
        }
       
        /*Pagination */

        $currentPage = $request->page;
        $itemCollection = collect($results);
        /*Sau này sẽ sửa perPage = 9*/
        $perPage = 9;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath('video');

        return view('user.video.search', ['results' => $paginatedItems]);
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
