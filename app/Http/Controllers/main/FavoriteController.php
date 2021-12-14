<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();


        $favorites = $user->favorites(Product::class)->get();
        return view("favorite.index", compact('favorites'));
    }
}
