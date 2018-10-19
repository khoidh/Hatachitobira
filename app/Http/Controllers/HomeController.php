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
        // $event = Event::all();
        $event = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->take(3)->get();

        $columns = Column::select()
            ->select('columns.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'columns.category_id')
            ->take(3)->get();

        $video = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')
            ->take(3)->get();

        return view('top',compact('columns'));
    }
}
