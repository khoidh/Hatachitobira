<?php

namespace App\Http\Controllers;

use App\Column;
use App\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->paginate(5);
        return view('column.index', ['columns' => $columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $column = Column::find($id);
        return view('column.show', ['column' => $column]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
