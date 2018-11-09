<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Column;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ColumnRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ColumnController extends Controller
{
    public function index()
    {
        $columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('admin.column.index',['columns' => $columns]);
    }

    //action hien thi form them moi colum
    public function create()
    {
        $categories = Category::all();

        return view('admin.column.create', ['categories' => $categories]);
    }

    public function store(ColumnRequest $request)
    {
        $data = $request->all();


        if($request->hasFile('image_selected')){
            $file = $request->file('image_selected');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('images/admin/column');
            $file->move($destinationPath, $fileName);

            $data['image']= $fileName;
        }
        Column::create($data);

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

    public function update(ColumnRequest $request, $id)
    {
        $column = Column::find($id);
        $data = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/admin/column');
            $file->move($destinationPath, $fileName);
            $data["image"] = $fileName;
        }
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
