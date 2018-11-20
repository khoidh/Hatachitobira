<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\Video;
use App\User_event;
use App\Category;
use App\Column;
use App\Favorite;
use App\Mytheme;
use App\UserCategory;
use DateTime;
use Date;
use Response;
use Image;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MypageController extends Controller
{

    public function index()
    {
       
        /* Get category list */
        $categories = Category::where('display',1)->get();
        
        $user_id = Auth::User()->id;
        

        $favorite_e = User_event::where('user_id', $user_id)->pluck('event_id')->toArray();
        $favorite_c = Favorite::where('user_id', $user_id)->where('favoritable_type', 'columns')->pluck('favoritable_id')->toArray();
        $favorite_v = Favorite::where('user_id', $user_id)->where('favoritable_type', 'videos')->pluck('favoritable_id')->toArray();

        /* Get video faverite list */
        $videos = Video::whereIn('id',$favorite_v)->get();

        /* Get column faverite list */
        $columns = Column::select()
            ->select('columns.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'columns.category_id')
            ->where('columns.display' , 1)
            ->whereIn('columns.id',$favorite_c)->get();

        /* Get event list have joined */
        $events = Event::select()
            ->select('events.*','categories.name as category_name')
            ->join('categories','categories.id','=','events.category_id')
            ->where('events.display' , 1)
            ->whereIn('events.id',$favorite_e)->get();

        $date_now = new DateTime();
        $data_date['month'] = date_format($date_now, "m");
        $data_date['year'] = date_format($date_now, "Y");
        $user_id = Auth::User()->id;
        $mytheme_first = Mytheme::where('user_id',$user_id)->where('month',$data_date['month'])->where('year',$data_date['year'])->first();

        $mytheme = Mytheme::where('user_id',$user_id)->where('month',$data_date['month'])->where('year',$data_date['year'])->orderBy('category_id','asc')->get();
        $mythemes = array();
        for ($i=0; $i <= 9 ; $i++) { 
            $key = $i>=4 ? $i+1 : $i;
            $mythemes[$key] = "";
            foreach ($mytheme as $k => $v) {
                if (isset($k) && $i+1 == $v->category_id) {
                    $mythemes[$key] = $v;
                }
            }
        }
        
        foreach ($videos as $video) {
            $like = 0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $favorite = Favorite::where('user_id', $user_id)
                    ->where('favoritable_id', $video->id)
                    ->where('favoritable_type', 'videos')->get();
                if (count($favorite) > 0) {
                    $like = 1;
                }
            }
            $video->favorite = $like;
            
        }

        $cat_id = UserCategory::where('user_id',$user_id)->first();
        $column_cate = array();
        $event_cate = array();
        $videos_cate = array();
        if ($cat_id) {
            $event_cate = Event::where('category_id',$cat_id->categories_id)
                ->where('events.display' , 1)
                ->first();
            $videos_cate = Video::where('category_id',$cat_id->categories_id)
                ->where('videos.display' , 1)
                ->where('videos.type', '!=', 3)
                ->first();
            $column_cate = Column::where('category_id',$cat_id->categories_id)
                ->where('columns.display' , 1)
                ->first();
        }

        $array=[
            'categories'    => $categories,
            'videos'        => $videos,
            'events'        => $events,
            'columns'       => $columns,
            'data_date'     => $data_date,
            'mythemes'      => $mythemes,
            'mytheme_first' => $mytheme_first,
            'column_cate'   => $column_cate,
            'event_cate'    => $event_cate,
            'videos_cate'   => $videos_cate,
            'cat_id'        => $cat_id,
        ];
        return view('user.mypage', $array);
    }

    public function uploadImageDelete(Request $request) {
        $data = $request->all();
        $user_id = Auth::User()->id;
        Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->delete();
        return json_encode('deleted');
    }

    public function uploadImage(Request $request) {
        $data = $request->all();

        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($data, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        $file = $request->file('file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $destinationPath = public_path('images/user/mypage/');
        $img = Image::make($file)->resize(250, 250);
        $img->orientate();
        $img->save($destinationPath.$fileName);

        unset($data['file']);
        unset($data['_token']);

        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;
        $data['content_lable'] = $fileName;

        $result = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        if ($result) {
            Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->update($data);
            $results =  Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        }
        else {
            $results= Mytheme::create($data);
        }

        return Response::json($fileName, 200);
        
    }

    public function contentCategoryNew(Request $request) {
        $data = $request->all();
        $user_id = Auth::user()->id;
        $cat_id = UserCategory::where('user_id',$user_id)->first();
        if ($cat_id) {
            $cat_id->update($data);
        }else {
            $data['user_id'] = $user_id ;
            $results= UserCategory::create($data);
        }
        $event = Event::where('category_id',$data['categories_id'])
            ->where('events.display' , 1)
            ->first();
        $videos = Video::where('category_id',$data['categories_id'])
            ->where('videos.display' , 1)
            ->where('videos.type', '!=', 3)
            ->first();
        $column = Column::where('category_id',$data['categories_id'])
            ->where('columns.display' , 1)
            ->first();
        return view('user.mypage_content',compact('event','videos','column'));
    }

    public function changeLable(Request $request){
        $data = $request->all();
        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;

        $result = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        if ($result) {
            $result->update($data);
            $results = Mytheme::find($result->id);
        }
        else {
            $results= Mytheme::create($data);
        }
        
        return json_encode($results);
    }

    public function changeContentGet(Request $request) {
        $data= $request->all();
        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;
        $mytheme_first = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->first();
        if ($data['typies'] == 'memo') {
            $data['_text'] = 'MEMO';
            $data['placehoder'] = '先月の行動を振り返り記録しよう';
            $data['field'] = $mytheme_first ? $mytheme_first->memo : '';
        }elseif ($data['typies'] == 'action') {
            $data['_text'] = '今月のアクション';
            $data['placehoder'] = '考えたいこと、行動したいことを3つ決めよう';
            $data['field'] = $mytheme_first ? $mytheme_first->this_action: '';
        }else {
            $data['_text'] = '今月のマイテーマ';
            $data['placehoder'] = '例:「人に喜んでもらう接客とは？」「自分の理想のチームをつくるには？';
            $data['field'] = $mytheme_first ? $mytheme_first->this_mytheme: '';
        }

        
        return view('user.mypage-text',compact('data','mytheme_first'));
    }

    public function changeContent(Request $request) {
        $data = $request->all();

        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;

        $result = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->first();
        if ($result) {

             Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->update($data);
            $results = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->first();
        }
        else {
            $data['category_id'] = 1;
            $results= Mytheme::create($data);
        }
        return json_encode($results);
    }

    public function changeContentChild(Request $request){
        $data = $request->all();
        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;
        $content = 'content_'.$data['content'];
        $data[$content] = $data['content_data'];
        unset($data['content_data']);
        unset($data['content']);
        $result = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        if ($result) {
            $data['id'] = $result->id;
            Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->update($data);
            $results =  Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        }
        else {
            $results= Mytheme::create($data);
        }
        return json_encode($results);
    }

    public function showModal(Request $request) {
        $data = $request->all();
        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;

        $result = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        return view('user.mypage_modal',compact('result','data'));
    }

    public function showModalImage(Request $request) {
        $data = $request->all();
        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;

        $result = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        $result_1 = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->first();
        return view('user.mypage_modal_image',compact('result','data','result_1'));
    }


    public function changeAvatar(Request $request) {
        $data = $request->all();

        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;
        
        $data['content_1'] = $data['description'];

        unset($data['file-image']);
        unset($data['description']);
        unset($data['tmppath']);

        $result = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        if ($result) {
            Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->update($data);
            $results =  Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->where('category_id',$data['category_id'])->first();
        }
        else {
            $results= Mytheme::create($data);
        }
        return json_encode($results);
    }

    public function showMonth(Request $request) {
        $data = $request->all();
        $user_id = Auth::User()->id;
        $data['user_id'] = $user_id;

        $date_now = new DateTime();
        $data_date['month'] = date_format($date_now, "m");
        $data_date['year'] = date_format($date_now, "Y");
        $user_id = Auth::User()->id;

        $mytheme_first = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->first();

        $mytheme = Mytheme::where('user_id',$user_id)->where('month',$data['month'])->where('year',$data['year'])->orderBy('category_id','asc')->get();
        $mythemes = array();
        for ($i=0; $i <= 9 ; $i++) { 
            $key = $i>=4 ? $i+1 : $i;
            $mythemes[$key] = "";
            foreach ($mytheme as $k => $v) {
                if (isset($k) && $i+1 == $v->category_id) {
                    $mythemes[$key] = $v;
                }
            }
        }

        $array=[
            'data_date'     => $data_date,
            'mythemes'      => $mythemes,
            'mytheme_first' => $mytheme_first,
            'data_search'   => $data       
        ];

        return view('user.mypage_month', $array);
    }

    /** Function get info by category_id
     * @param $id       Category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function get_info_by_category($id)
    {
//        /* Get video faverite list */
//        $favoritable_type = (new Column())->getTable();    //Get table name "Columns"
//        $favorites_id = Favorite::where([
//            ['user_id', $user_id],
//            ['favoritable_type', $favoritable_type]
//        ])->pluck('favoritable_id')->toArray();
//
//
//
//        /* Get event list have joined */
//
//        /* Get column faverite list */
//
//        $array=[
//            'columns' => $columns,
//            'favorites_id' => $favorites_id
//        ];
        $array = ['value',$id];
        return $array;
    }

    public function searchCategory()
    {
        // $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        // $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        // $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';

        $categories = Category::where('display',1)->get();

        $events = Event::select()
            ->select('events.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'events.category_id')
            ->where('events.display' , 1)
            ;


        $columns = Column::select()
            ->select('columns.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'columns.category_id')
            ->where('columns.display' , 1)
            ;
            

        $videos = Video::select()
            ->select('videos.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'videos.category_id')
            ->where('videos.display' , 1)
            ->where('videos.type', '!=', 3)
            ;
            

        if (isset($_GET['search']) && $_GET['search'] != 0) {
            $categories_id = $_GET['search'];
            $events = $events->where('events.category_id', '=', $categories_id);
            $columns = $columns->where('columns.category_id', '=', $categories_id);
            $videos = $videos->where('videos.category_id', '=', $categories_id);
        } 

        $events = $events->orderBy('id','desc')->get();
        $columns = $columns->orderBy('id','desc')->get();
        $videos = $videos->orderBy('id','desc')->get();
        
        foreach ($events as $key => $event) {
            $like_e = 0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $favorite_e = Favorite::where('user_id', $user_id)
                    ->where('favoritable_id', $event->id)
                    ->where('favoritable_type', 'events')->get();
                if (count($favorite_e) > 0) {
                    $like_e = 1;
                }
            }
            $event->favorite = $like_e;
        }

        foreach ($columns as $key => $column) {
            $like_e = 0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $favorite_c = Favorite::where('user_id', $user_id)
                    ->where('favoritable_id', $column->id)
                    ->where('favoritable_type', 'columns')->get();
                if (count($favorite_c) > 0) {
                    $like_e = 1;
                }
            }

            $column->favorite = $like_e;
        }

        // $results = array();
        // foreach ($videos as $video) {
        //     $url = $video->url;
        //     parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
        //     $id = $youtube['v'];
        //     $api_url = $BASE_URL . $id . $BASE_PART . $api_key . '';
        //     $result = json_decode(file_get_contents($api_url));
            
        //     $result->id = $video->id;
        //     $result->category = $video->category_name;
        //     $result->data_url = $url;
        //     $like = 0;
        //     if (Auth::user()) {
        //         $user_id = Auth::user()->id;
        //         $favorite = Favorite::where('user_id', $user_id)
        //             ->where('favoritable_id', $video->id)
        //             ->where('favoritable_type', 'videos')->get();
        //         if (count($favorite) > 0) {
        //             $like = 1;
        //         }
        //     }
        //     $result->favorite = $like;
        //     if (isset($result->items[0])) {
        //         $date1 = new DateTime();
        //         $date2 = new DateTime($result->items[0]->snippet->publishedAt);
        //         $interval = $date2->diff($date1);
        //         $result->date_diff = $interval->m;
        //         array_push($results, $result);
        //     }
        // }
        $slug = '';
        return view('user.searchcategory', compact('categories', 'events', 'columns', 'videos','data_id','slug'));
    }

    public function searchCategorySlug(){
        {
            $id = $_GET['search'];
          
    
            $categories = Category::where('display',1)->get();
    
            $events = Event::select()
                ->select('events.*', 'categories.name as category_name')
                ->join('categories', 'categories.id', '=', 'events.category_id')
                ->where('events.category_id', '=', $id)
                ->where('events.display' , 1)
                ;
    
            $columns = Column::select()
                ->select('columns.*', 'categories.name as category_name')
                ->join('categories', 'categories.id', '=', 'columns.category_id')
                ->where('columns.category_id', '=', $id)
                ->where('columns.display' , 1)
                ;
                
    
            $videos = Video::select()
                ->select('videos.*', 'categories.name as category_name')
                ->join('categories', 'categories.id', '=', 'videos.category_id')
                ->where('videos.category_id', '=', $id)
                ->where('videos.display' , 1)
                ->where('videos.type', '!=', 3)
                ;

            $events = $events->orderBy('id','desc')->get();
            $columns = $columns->orderBy('id','desc')->get();
            $videos = $videos->orderBy('id','desc')->get();
            
            foreach ($events as $key => $event) {
                $like_e = 0;
                if (Auth::user()) {
                    $user_id = Auth::user()->id;
                    $favorite_e = Favorite::where('user_id', $user_id)
                        ->where('favoritable_id', $event->id)
                        ->where('favoritable_type', 'events')->get();
                    if (count($favorite_e) > 0) {
                        $like_e = 1;
                    }
                }
                $event->favorite = $like_e;
            }
    
            foreach ($columns as $key => $column) {
                $like_e = 0;
                if (Auth::user()) {
                    $user_id = Auth::user()->id;
                    $favorite_c = Favorite::where('user_id', $user_id)
                        ->where('favoritable_id', $column->id)
                        ->where('favoritable_type', 'columns')->get();
                    if (count($favorite_c) > 0) {
                        $like_e = 1;
                    }
                }
    
                $column->favorite = $like_e;
            }
            
            return view('user.search_category', compact('categories', 'events', 'columns', 'videos'));
        }
    }

    public function searchCategoryForSlug($slug){
        {
           
            $categories = Category::where('display',1)->get();
    
            $events = Event::select()
                ->select('events.*', 'categories.name as category_name')
                ->join('categories', 'categories.id', '=', 'events.category_id')
                ->where('categories.slug', $slug)
                ->where('events.display' , 1)
                ;
    
            $columns = Column::select()
                ->select('columns.*', 'categories.name as category_name')
                ->join('categories', 'categories.id', '=', 'columns.category_id')
                ->where('categories.slug', $slug)
                ->where('columns.display' , 1)
                ;
                
    
            $videos = Video::select()
                ->select('videos.*', 'categories.name as category_name')
                ->join('categories', 'categories.id', '=', 'videos.category_id')
                ->where('categories.slug', $slug)
                ->where('videos.display' , 1)
                ->where('videos.type', '!=', 3)
                ;

            $events = $events->orderBy('id','desc')->get();
            $columns = $columns->orderBy('id','desc')->get();
            $videos = $videos->orderBy('id','desc')->get();
            
            foreach ($events as $key => $event) {
                $like_e = 0;
                if (Auth::user()) {
                    $user_id = Auth::user()->id;
                    $favorite_e = Favorite::where('user_id', $user_id)
                        ->where('favoritable_id', $event->id)
                        ->where('favoritable_type', 'events')->get();
                    if (count($favorite_e) > 0) {
                        $like_e = 1;
                    }
                }
                $event->favorite = $like_e;
            }
    
            foreach ($columns as $key => $column) {
                $like_e = 0;
                if (Auth::user()) {
                    $user_id = Auth::user()->id;
                    $favorite_c = Favorite::where('user_id', $user_id)
                        ->where('favoritable_id', $column->id)
                        ->where('favoritable_type', 'columns')->get();
                    if (count($favorite_c) > 0) {
                        $like_e = 1;
                    }
                }
    
                $column->favorite = $like_e;
            }
    
            
            
            return view('user.searchcategory', compact('categories', 'events', 'columns', 'videos','slug'));
        }
    }

    public function paginateColumn(Request $request)
    {
        $input = $request->all();
        $columns = Column::select()
            ->select('columns.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'columns.category_id')
            ->where('columns.category_id', '=', $input['category'])
            ->where('columns.display' , 1)
            ->paginate(5);

        return view('user.searchcategory.column', compact('columns'));
    }

    public function paginateVideo(Request $request)
    {
        $api_key = 'AIzaSyCHOj6MNDK2YFRLQhK5yKP2KEBIRKHlHuU';
        $BASE_URL = 'https://www.googleapis.com/youtube/v3/videos?id=';
        $BASE_PART = '&part=id,contentDetails,snippet,statistics,player&key=';

        $input = $request->all();
        $videos = Video::select()
            ->select('videos.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'videos.category_id')
            ->where('videos.category_id', '=', $input['category'])
            ->where('videos.display' , 1)
            ->where('videos.type', '!=', 3)
            ->paginate(6);

        $results = array();
        foreach ($videos as $video) {
            $url = $video->url;
            parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
            $id = $youtube['v'];
            $api_url = $BASE_URL . $id . $BASE_PART . $api_key . '';
            $result = json_decode(file_get_contents($api_url));
            $result->id = $video->id;
            $result->category = $video->category_name;
            $like = 0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $favorite = Favorite::where('user_id', $user_id)
                    ->where('favoritable_id', $video->id)
                    ->where('favoritable_type', 'videos')->get();
                if (count($favorite) > 0) {
                    $like = 1;
                }
            }
            $result->favorite = $like;
            array_push($results, $result);
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($results);
        $perPage = 6;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
        $paginatedItems->setPath('search-category');
        $results = $paginatedItems;

        return view('user.searchcategory.video', compact('results'));
    }

    public function paginateEvent(Request $request)
    {
        $input = $request->all();
        $events = Event::select()
            ->select('events.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'events.category_id')
            ->where('events.category_id', '=', $input['category'])
            ->where('events.display' , 1)
            ->paginate(5);
        return view('user.searchcategory.event', compact('events'));
    }
}
