<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view("mypage.index");
    }
}
