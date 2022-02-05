<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\History;
use Illuminate\Support\Facades\Log;

class HistoryController extends Controller
{
    public function index(Request $request)
    {



        $user = Auth::user();
        $history = History::all();
        $user_id = $user->id;
        $histories = History::where('user_id', $user_id)->get();
        Log::info('ログサンプル', ['user_id' => $user_id]);



        return view("history.index", compact('histories'));


        // ユーザーidからhistoryを検索して画面に表示

    }

    public function create(Request $request)
    {
        return view("history.create", compact('histories'));
    }
}
