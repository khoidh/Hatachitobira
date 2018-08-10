<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Column;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColumnController extends Controller
{
    public function index()
    {
        $columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->get();

        return view('admin.column.index',['columns' => $columns]);
    }

    //action hien thi form them moi colum
    public function create()
    {
        $categories = Category::all();

        return view('admin.column.create', ['categories' => $categories]);
    }

    //action de luu colum moi khi form submit
    public function store(Request $request)
    {
        $data = $request->all();

        //Todo: Error?
//        Column::create($data);
        $dataInsertToDB = array(
            'title'         => $data['title'],
            'description'   => $data['description'],
            'content'   => $data['content'],
            'image'         => $data['image'],
            'category_id' => $data['category_id'],
            'sort'          => $data['sort']
        );

        $objColumn=new Column();
        $objColumn->insert($dataInsertToDB);

        return redirect()->route('columns.index');
    }

    public function show($id)
    {
        $column = Column::select()
            ->where('columns.id', $id)
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->first();

        return view('admin.column.show', ['column' => $column]);
    }

    public function edit($id)
    {
        $column = Column::find($id);
        $categories = Category::all();

        return view('admin.column.edit', ['column' => $column, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $column = Column::find($id);
        $data = $request->all();
        $column->update($data);

        return redirect()->route('columns.show',$column->id);
    }

    public function destroy($id)
    {
        $column = Column::find($id);
        $column->delete();

        return redirect()->route('columns.index');
    }
}
