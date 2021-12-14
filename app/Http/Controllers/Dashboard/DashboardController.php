<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Mount;
use App\Http\Controllers\Controller;
use App\MountsImag;

//=======================================================================
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view("dashboard.index");
    }
}
