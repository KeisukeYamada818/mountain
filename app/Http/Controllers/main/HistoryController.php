<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        return view("history.index");
        $user->id;

        $user = Auth::user();


        // ユーザーidからhistoryを検索して画面に表示

    }
}
