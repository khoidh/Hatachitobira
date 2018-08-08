<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiryData = Enquiry::all();
        return view('admin.enquiry.list',compact('enquiryData'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        $enquiry = Enquiry::find($id);
        return view('admin.enquiry.detail_model',compact('enquiry'));
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        Enquiry::find($id)->delete();
        return redirect()->route('enquiry.index');
    }
}
