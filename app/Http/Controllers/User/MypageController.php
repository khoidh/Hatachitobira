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
    	
    	return view('user.searchcategory',compact('categories','events','columns','videos'));
    }
}
