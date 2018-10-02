<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\Video;
use App\Category;
use App\Column;
use App\Favorite;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    public function index()
    {
        return view('user.mypage');
    }

    public function searchCategory() {
    	$api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';

    	$categories = Category::all();

    	if (isset($_GET['search'])) {
    		$categories_id = $_GET['search'];
    	}else {
	    	$categories_id = $categories[0]->id;
    	}

    	$events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
    		->where('events.category_id','=',$categories_id)->paginate(5);
        
    	$columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->where('columns.category_id','=',$categories_id)->paginate(5);

    	$videos = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->where('videos.category_id','=',$categories_id)->get();
    	
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

            array_push($results,$result);
        }

        /*Pagination */

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($results);
        $perPage = 6;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath('search-category');
        $results = $paginatedItems;
        
    	return view('user.searchcategory',compact('categories','events','columns','results'));
    }

    public function paginateColumn(Request $request){
        $input = $request->all();
        $columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->where('columns.category_id','=',$input['category'])->paginate(5);

        return view('user.searchcategory.column',compact('columns'));
    }

    public function paginateVideo(Request $request){
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';

        $input = $request->all();
        $videos = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->where('videos.category_id','=',$input['category'])->paginate(6);

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
            array_push($results,$result);
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($results);
        $perPage = 6;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath('search-category');
        $results = $paginatedItems;

        return view('user.searchcategory.video',compact('results'));
    }

    public function paginateEvent(Request $request){
        $input = $request->all();
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->where('events.category_id','=',$input['category'])->paginate(5);
        return view('user.searchcategory.event',compact('events'));
    }       
}
