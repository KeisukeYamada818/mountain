<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Route;
    
    //=======================================================================
    class RoutesController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\View\View
         */
        public function index(Request $request)
        {
            $keyword = $request->get("search");
            $perPage = 25;
    
            if (!empty($keyword)) {
                
				// ----------------------------------------------------
				// -- QueryBuilder: SELECT [routes]--
				// ----------------------------------------------------
				$route = DB::table("routes")
				->leftJoin("mounts","mounts.id", "=", "routes.mount_id")
				->orWhere("routes.mount_id", "LIKE", "%$keyword%")->orWhere("routes.level", "LIKE", "%$keyword%")->orWhere("routes.times", "LIKE", "%$keyword%")->orWhere("routes.diff", "LIKE", "%$keyword%")->orWhere("routes.detail", "LIKE", "%$keyword%")->orWhere("mounts.name", "LIKE", "%$keyword%")->orWhere("mounts.high", "LIKE", "%$keyword%")->orWhere("mounts.famous", "LIKE", "%$keyword%")->orWhere("mounts.area", "LIKE", "%$keyword%")->select("*")->addSelect("routes.id")->paginate($perPage);
            } else {
                    //$route = Route::paginate($perPage);
				// ----------------------------------------------------
				// -- QueryBuilder: SELECT [routes]--
				// ----------------------------------------------------
				$route = DB::table("routes")
				->leftJoin("mounts","mounts.id", "=", "routes.mount_id")
				->select("*")->addSelect("routes.id")->paginate($perPage);              
            }          
            return view("route.index", compact("route"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("route.create");
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function store(Request $request)
        {
            $this->validate($request, [
				"mount_id" => "nullable|integer", //integer('mount_id')->nullable()
				"level" => "nullable|integer", //integer('level')->nullable()
				"times" => "nullable", //time('times')->nullable()
				"diff" => "nullable|integer", //integer('diff')->nullable()
				"detail" => "nullable", //text('detail')->nullable()

            ]);
            $requestData = $request->all();
            
            Route::create($requestData);
    
            return redirect("route")->with("flash_message", "route added!");
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\View\View
         */
        public function show($id)
        {
            //$route = Route::findOrFail($id);
            
				// ----------------------------------------------------
				// -- QueryBuilder: SELECT [routes]--
				// ----------------------------------------------------
				$route = DB::table("routes")
				->leftJoin("mounts","mounts.id", "=", "routes.mount_id")
				->select("*")->addSelect("routes.id")->where("routes.id",$id)->first();
            return view("route.show", compact("route"));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\View\View
         */
        public function edit($id)
        {
            $route = Route::findOrFail($id);
    
            return view("route.edit", compact("route"));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  int  $id
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function update(Request $request, $id)
        {
            $this->validate($request, [
				"mount_id" => "nullable|integer", //integer('mount_id')->nullable()
				"level" => "nullable|integer", //integer('level')->nullable()
				"times" => "nullable", //time('times')->nullable()
				"diff" => "nullable|integer", //integer('diff')->nullable()
				"detail" => "nullable", //text('detail')->nullable()

            ]);
            $requestData = $request->all();
            
            $route = Route::findOrFail($id);
            $route->update($requestData);
    
            return redirect("route")->with("flash_message", "route updated!");
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function destroy($id)
        {
            Route::destroy($id);
    
            return redirect("route")->with("flash_message", "route deleted!");
        }
    }
    //=======================================================================
    
    