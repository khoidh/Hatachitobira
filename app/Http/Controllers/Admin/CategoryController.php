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
        return view('admin.categories.addnew');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.detail_model',compact('categories'));
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }
}
