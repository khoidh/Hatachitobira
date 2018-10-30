<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select()->orderBy('id','desc')->paginate('10');
        // $categories = DB::table('categories')->orderBy('id','desc')->paginate('10');
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $data['icon'] = $fileName;
            $destinationPath = public_path('image/category');
            $file->move($destinationPath, $fileName);
        }
        Category::create($data);
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show',['category' => $category]);
    }

    public function edit($id)
    {
       $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $category->icon = $fileName;
            $destinationPath = public_path('image/category');
            $file->move($destinationPath, $fileName);
        }
        $category->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }
}
