<?php

namespace App\Http\Controllers\User;

use App\Column;
use App\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ColumnController extends Controller
{
    public function index()
    {
        $columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->paginate(5);
        if(Auth::user())
        {
            $user_id            = Auth::user()->id;
            $favoritable_type   = (new Column())->getTable();
            $favorites_id= Favorite::where([['user_id',$user_id],
                ['favoritable_type',$favoritable_type]])->pluck('favoritable_id')->toArray();
            return view('user.column.index', ['columns' => $columns,'favorites_id'=>$favorites_id]);
        }
        return view('user.column.index', ['columns' => $columns]);
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
        $column = Column::find($id);
        // get previous $column id
        $previous = Column::select('id','title')->where('id', '<', $column->id)->orderBy('id','desc')->first();
        if(empty($previous))$previous=$column;

        // get next $column id
        $next = Column::select('id','title')->where('id', '>', $column->id)->orderBy('id','asc')->first();
        if(empty($next))$next=$column;

        // get 6 bài viết có id giống
        $columns_random = Column::inRandomOrder()->select('id','title')->take(6)->get();

        return view('user.column.show', ['column' => $column,'previous'=> $previous,'next'=> $next,'columns_random'=>$columns_random]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function favorite(Request $request)
    {
            $favorite = Favorite::where('user_id',$request->user_id)
                ->where('favoritable_id',$request->column_id)
                ->where('favoritable_type',(new Column())->getTable())
                ->exists();
            if(!$favorite)
            {
                $favorite = new Favorite();
                $favorite->user_id = $request->user_id;
                $favorite->favoritable_id = $request->column_id;
                $favorite->favoritable_type = (new Column())->getTable();
                $favorite->save();
            }
            return "気に入っ成功";
    }

    public function destroy($id)
    {
        //
    }
}
