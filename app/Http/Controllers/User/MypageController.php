<?php

namespace App\Http\Controllers\User;

use App\Event;
use App\User_event;
use App\Favorite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MypageController extends Controller
{

    public function index()
    {
        return view('user.mypage');
    }
}
