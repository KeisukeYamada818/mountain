<?php

namespace App\Http\Controllers\manage;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\MountsImag;
use App\Http\Controllers\Controller;

//=======================================================================
class MountsImagsController extends Controller
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
            // -- QueryBuilder: SELECT [mounts_image]--
            // ----------------------------------------------------
            $mounts_imag = DB::table("mounts_image")
                ->leftJoin("mounts", "mounts.id", "=", "mounts_image.mount_id")
                ->orWhere("mounts_imags.mount_id", "LIKE", "%$keyword%")->orWhere("mounts_imags.image", "LIKE", "%$keyword%")->orWhere("mounts.name", "LIKE", "%$keyword%")->orWhere("mounts.high", "LIKE", "%$keyword%")->orWhere("mounts.famous", "LIKE", "%$keyword%")->orWhere("mounts.area", "LIKE", "%$keyword%")->select("*")->addSelect("mounts_imags.id")->paginate($perPage);
        } else {
            //$mounts_imag = MountsImag::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [mounts_image]--
            // ----------------------------------------------------
            $mounts_imag = DB::table("mounts_image")
                ->leftJoin("mounts", "mounts.id", "=", "mounts_image.mount_id")
                ->select("*")->addSelect("mounts_imags.id")->paginate($perPage);
        }
        return view("mounts_imag.index", compact("mounts_imag"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("mounts_imag.create");
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
            "image" => "nullable", //string('image')->nullable()

        ]);
        $requestData = $request->all();

        MountsImag::create($requestData);

        return redirect("mounts_imag")->with("flash_message", "mounts_imag added!");
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
        //$mounts_imag = MountsImag::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [mounts_image]--
        // ----------------------------------------------------
        $mounts_imag = DB::table("mounts_image")
            ->leftJoin("mounts", "mounts.id", "=", "mounts_image.mount_id")
            ->select("*")->addSelect("mounts_imags.id")->where("mounts_imags.id", $id)->first();
        return view("mounts_imag.show", compact("mounts_imag"));
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
        $mounts_imag = MountsImag::findOrFail($id);

        return view("mounts_imag.edit", compact("mounts_imag"));
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
            "image" => "nullable", //string('image')->nullable()

        ]);
        $requestData = $request->all();

        $mounts_imag = MountsImag::findOrFail($id);
        $mounts_imag->update($requestData);

        return redirect("mounts_imag")->with("flash_message", "mounts_imag updated!");
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
        MountsImag::destroy($id);

        return redirect("mounts_imag")->with("flash_message", "mounts_imag deleted!");
    }
}
    //=======================================================================
