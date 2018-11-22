<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Column;
use App\Taggable;
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
        $cate_id = explode(',', $data['category_id']);

        if($request->hasFile('image_selected')){
            $file = $request->file('image_selected');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('images/admin/column');
            $file->move($destinationPath, $fileName);

            $data['image']= $fileName;
        }
        $data['category_id'] = 1;
        $columns = Column::create($data);

        foreach ($cate_id as $key => $value) {
            Taggable::create([
                'category_id' => $value,
                'taggable_id' => $columns->id,
                'taggable_type' => (new Column())->getTable()
            ]);
        }

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

        $cate_id = Taggable::where('taggable_id',$column->id)->where('taggable_type',(new Column())->getTable())->pluck('category_id')->toArray();
        if (!$cate_id) {
            array_push($cate_id, $column->category_id);
        }
        return view('admin.column.edit', ['column' => $column, 'categories' => $categories,'cate_id'=>$cate_id]);
    }

    public function update(ColumnRequest $request, $id)
    {
        $column = Column::find($id);
        $data = $request->all();

        if($request->hasFile('image_selected')) {
            $file = $request->file('image_selected');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/admin/column');
            $file->move($destinationPath, $fileName);
            $data["image"] = $fileName;
        }

        $cate_id = explode(',', $data['category_id']);
        $data['category_id'] = 1;
        Taggable::where('taggable_id',$column->id)->where('taggable_type',(new Column())->getTable())->delete();
        foreach ($cate_id as $key => $value) {
            Taggable::create([
                'category_id' => $value,
                'taggable_id' => $column->id,
                'taggable_type' => (new Column())->getTable()
            ]);
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
