<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Video;
Use App\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Favorite;
class VideoController extends Controller
{
    public function index(Request $request)
    {
        /*
         *  API Youtube information
         *
         */
//        $api_key = env('YOUTUBE_API_KEY');
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';
        /**/

        $categories = Category::all();
        $videos = Video::select()
            ->select('videos.*','categories.name as category_name')
            ->join('categories','categories.id','=','videos.category_id')->get();

        /*Filter*/
        if($request->isMethod('post'))
        {
            if($request->category_id)
            {
                $category_id = $request->category_id;
                $videos = Video::where('category_id',$category_id)->get();
            }
            else if($request->description)
            {
                $description = $request->description;
                $videos = Video::where('description','LIKE',"%$description%")->get();
            }

        }
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
            array_push($results,$result);
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
        }
        return redirect()->route('video.index');
    }
}
