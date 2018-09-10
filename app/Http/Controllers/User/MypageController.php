<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\Video;
use App\Category;
use App\Column;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    		->where('events.category_id','=',$categories_id)->get();
        
    	$columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->where('columns.category_id','=',$categories_id)->get();

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
            array_push($results,$result);
        }


    	return view('user.searchcategory',compact('categories','events','columns','results'));
    }
}
