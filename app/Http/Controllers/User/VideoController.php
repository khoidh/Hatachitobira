<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Video;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class VideoController extends Controller
{
    public function index()
    {
        $api_key = env('YOUTUBE_API_KEY');

        $videos = Video::all();
        $results = array();
        foreach ($videos as $video)
        {
            $url = $video->url;
            parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
            $id =  $youtube['v'];
            $api_url = 'https://www.googleapis.com/youtube/v3/videos?id=' . $id . '&part=id,contentDetails,snippet,statistics,player&key=' . $api_key . '';
            $result = json_decode(file_get_contents($api_url));
            array_push($results,$result);
        }
        /*Pagination */
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($results);
        $perPage = 9;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath('video');

        return view('user.video.index', ['videos' => $videos, 'results' => $paginatedItems]);
//        return view('user.video.index', ['videos' => $videos, 'results' => $results]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
