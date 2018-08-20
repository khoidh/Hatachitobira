<?php

namespace App\Http\Controllers\User;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        if (Auth::user()) {
            return view('user.userprofile');
        }else {
            return view('home');
        }
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data['birthday'] = date('Y-m-d',strtotime($data['birthday']));
        if (Auth::user()) {
            $id = Auth::user()->id;
            User::find($id)->update($data);
            return redirect()->route('userprofile.index');
        }else {
            return view('home');
        }
    }

}
