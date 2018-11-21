<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Column;
use App\Video;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function companyEntrance() {
        return view('company_entrance');
    }

    public function recruitmentStaff() {
        return view('recruitment-staff');
    }

    public function topPage() {
        $categories = Category::where('display',1)->where('id','!=',Category::DEFAULT)->get();
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        // $event = Event::all();
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->where('events.display' , 1)
            ->orderBy('id','desc')
            ->take(3)->get();

        $columns = Column::select()
            ->select('columns.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'columns.category_id')
            ->where('columns.display' , 1)
            ->orderBy('id','desc')
            ->take(3)->get();

        $videos_1 = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display' , 1)
            ->where('videos.type',Video::JOB_SHADOW_TYPE)
            ->orderBy('id','desc')->get();

        $video_concept = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display' , 1)
            ->orderBy('sort','asc')
            ->where('videos.type',Video::CONCEPT_MOVIE_TYPE)
            ->first();

        $videos_2 = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display' , 1)
            ->orderBy('id','desc')
            ->where('videos.type',Video::ROLE_PLAY_TYPE)
            ->get();

        return view('top',compact('columns','events','videos_1','videos_2','categories','video_concept'));
    }
}
