<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;
use App\Event;
use App\Column;
use App\Video;
use App\Models\VideoType;
use App\Category;
use Carbon\Carbon;
use Auth;

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
        $timenow=Carbon::now();

        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->where('events.display' , 1)
            ->where('time_from', '<=' , $timenow)
            ->where('time_to', '>=', $timenow)
            ->orderBy('started_at', 'desc')
            ->orderBy('closed_at', 'desc')
            ->orderBy('time_from', 'desc')
            ->orderBy('time_to', 'desc')
            ->get();

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
            ->where('videos.type',VideoType::JOB_SHADOW_TYPE)
            ->orderBy('id','desc')->get();

        $video_concept = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display' , 1)
            ->orderBy('sort','asc')
            ->where('videos.type',VideoType::CONCEPT_MOVIE_TYPE)
            ->first();

        $videos_2 = Video::select()
            ->select('videos.*','video_types.name as category_name')
            ->join('video_types','video_types.id','=','videos.type')
            ->where('videos.display' , 1)
            ->orderBy('id','desc')
            ->where('videos.type',VideoType::ROLE_PLAY_TYPE)
            ->get();

        $array=[
            'columns'       => $columns,
            'events'        => $events,
            'videos_1'      => $videos_1,
            'videos_2'      => $videos_2,
            'categories'    => $categories,
            'video_concept' => $video_concept,
        ];

        if(Auth::user())
        {
            $user_id            = Auth::user()->id;
            /*======== Event favorite list ===========*/
            $favoritable_type   = (new Event())->getTable();   //Get table name "Events"
            $favorites_id= Favorite::where([['user_id',$user_id],
                ['favoritable_type',$favoritable_type]])->pluck('favoritable_id')->toArray();
            $array['event_favorites_id'] = $favorites_id;

            /*======== Column favorite list ===========*/
            $favoritable_type   = (new Column())->getTable();   //Get table name "Columns"
            $favorites_id= Favorite::where([['user_id',$user_id],
                ['favoritable_type',$favoritable_type]])->pluck('favoritable_id')->toArray();
            $array['column_favorites_id'] = $favorites_id;
        }

        return view('top',$array);
    }
}
