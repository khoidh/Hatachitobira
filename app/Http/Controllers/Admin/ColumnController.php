<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Column;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Http\Request;

class ColumnController extends Controller
{
    public function index()
    {
        $columns = Column::select()
            ->select('columns.*','categories.name as category_name')
            ->join('categories','categories.id','=','columns.category_id')
            ->paginate(10);

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

        //Upload file image
        if($request->hasFile('image')){
            //Hàm kiểm tra dữ liệu
//            $this->validate($request,
//                [
//                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
//                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
//                ],
//                [
//                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
//                    'image.mimes' => 'Chỉ chấp nhận ảnh với đuôi .jpg .jpeg .png .gif',
//                    'image.max' => 'Ảnh giới hạn dung lượng không quá 2M',
//                ]
//            );

            //Lưu hình ảnh vào thư mục public/image/column
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('image/column');
            $file->move($destinationPath, $fileName);

            $data["image"]= $fileName;
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

    public function update(Request $request, $id)
    {
        $column = Column::find($id);
        $data = $request->all();

        //Upload file image
        if($request->hasFile('image')) {
            //Hàm kiểm tra dữ liệu
//            $this->validate($request,
//                [
//                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
//                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
//                ],
//                [
//                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
//                    'image.mimes' => 'Chỉ chấp nhận ảnh với đuôi .jpg .jpeg .png .gif',
//                    'image.max' => 'Ảnh giới hạn dung lượng không quá 2M',
//                ]
//            );

            //Lưu hình ảnh vào thư mục public/image/column
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('image/column');
            $file->move($destinationPath, $fileName);

            $data["image"]= $fileName;
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