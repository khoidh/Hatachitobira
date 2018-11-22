<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Column;
use App\Video;
use App\Models\TopVideos;
use App\Models\VideoType;
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
        $categories = Category::where('display',1)->get();
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

        $videos_jobshadow = TopVideos::where('video_type_id',VideoType::JOB_SHADOW_TYPE)
                        ->orderBy('id','desc')->get();
        $videos_roleplay = TopVideos::where('video_type_id',VideoType::ROLE_PLAY_TYPE)
                        ->orderBy('id','desc')->get();
        $video_concept = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display' , 1)
            ->orderBy('sort','asc')
            ->where('videos.type',VideoType::CONCEPT_MOVIE_TYPE)
            ->first();
        
                        

        return view('top',compact('columns','events','videos_jobshadow','videos_roleplay','categories','video_concept'));
    }
}
