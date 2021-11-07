<?php

namespace App\Http\Controllers\manage;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Checkpoint;
use App\Http\Controllers\Controller;

//=======================================================================
class CheckpointsController extends Controller
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
            // -- QueryBuilder: SELECT [checkpoints]--
            // ----------------------------------------------------
            $checkpoint = DB::table("checkpoints")
                ->leftJoin("routes", "routes.id", "=", "checkpoints.route_id")
                ->orWhere("checkpoints.route_id", "LIKE", "%$keyword%")->orWhere("checkpoints.order", "LIKE", "%$keyword%")->orWhere("checkpoints.detail", "LIKE", "%$keyword%")->orWhere("checkpoints.image", "LIKE", "%$keyword%")->orWhere("routes.mount_id", "LIKE", "%$keyword%")->orWhere("routes.level", "LIKE", "%$keyword%")->orWhere("routes.times", "LIKE", "%$keyword%")->orWhere("routes.diff", "LIKE", "%$keyword%")->orWhere("routes.detail", "LIKE", "%$keyword%")->select("*")->addSelect("checkpoints.id")->paginate($perPage);
        } else {
            //$checkpoint = Checkpoint::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [checkpoints]--
            // ----------------------------------------------------
            $checkpoint = DB::table("checkpoints")
                ->leftJoin("routes", "routes.id", "=", "checkpoints.route_id")
                ->select("*")->addSelect("checkpoints.id")->paginate($perPage);
        }
        return view("checkpoint.index", compact("checkpoint"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("checkpoint.create");
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
            "route_id" => "nullable|integer", //integer('route_id')->nullable()
            "order" => "nullable|integer", //integer('order')->nullable()
            "detail" => "nullable", //text('detail')->nullable()
            "image" => "nullable", //string('image')->nullable()

        ]);
        $requestData = $request->all();

        Checkpoint::create($requestData);

        return redirect("checkpoint")->with("flash_message", "checkpoint added!");
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
        //$checkpoint = Checkpoint::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [checkpoints]--
        // ----------------------------------------------------
        $checkpoint = DB::table("checkpoints")
            ->leftJoin("routes", "routes.id", "=", "checkpoints.route_id")
            ->select("*")->addSelect("checkpoints.id")->where("checkpoints.id", $id)->first();
        return view("checkpoint.show", compact("checkpoint"));
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
        $checkpoint = Checkpoint::findOrFail($id);

        return view("checkpoint.edit", compact("checkpoint"));
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
            "route_id" => "nullable|integer", //integer('route_id')->nullable()
            "order" => "nullable|integer", //integer('order')->nullable()
            "detail" => "nullable", //text('detail')->nullable()
            "image" => "nullable", //string('image')->nullable()

        ]);
        $requestData = $request->all();

        $checkpoint = Checkpoint::findOrFail($id);
        $checkpoint->update($requestData);

        return redirect("checkpoint")->with("flash_message", "checkpoint updated!");
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
        Checkpoint::destroy($id);

        return redirect("checkpoint")->with("flash_message", "checkpoint deleted!");
    }
}
    //=======================================================================
