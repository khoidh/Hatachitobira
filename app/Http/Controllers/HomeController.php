<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Column;
use App\Video;

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
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        // $event = Event::all();
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->take(3)->get();

        $columns = Column::select()
            ->select('columns.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'columns.category_id')
            ->take(3)->get();

        $videos = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->take(3)->get();

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

        return view('top',compact('columns','events','results'));
    }
}
