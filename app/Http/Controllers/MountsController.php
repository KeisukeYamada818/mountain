<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Mount;
use App\MountsImag;

//=======================================================================
class MountsController extends Controller
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
            // -- QueryBuilder: SELECT [mounts]--
            // ----------------------------------------------------
            $mount = DB::table("mounts")
                ->orWhere("mounts.name", "LIKE", "%$keyword%")->orWhere("mounts.high", "LIKE", "%$keyword%")->orWhere("mounts.famous", "LIKE", "%$keyword%")->orWhere("mounts.area", "LIKE", "%$keyword%")->select("*")->addSelect("mounts.id")->paginate($perPage);
        } else {
            //$mount = Mount::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [mounts]--
            // ----------------------------------------------------
            $mount = DB::table("mounts")
                ->select("*")->addSelect("mounts.id")->paginate($perPage);
        }
        return view("mount.index", compact("mount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("mount.create");
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
            "name" => "nullable|max:50", //string('name',50)->nullable()
            "high" => "nullable|integer", //integer('high')->nullable()
            "famous" => "nullable|integer", //integer('famous')->nullable()
            "area" => "nullable|integer", //integer('area')->nullable()

        ]);
        $mount = new Mount();
        $mount->name = $request->name;
        $mount->high = $request->high;
        $mount->famous = $request->famous;
        $mount->area = $request->area;
        $mount->save();

        if ($request->image1) {
            $image = new MountsImag();
            $image->mount_id = $mount->id;
            $path = $request->file('image1')->store('public/mount');
            $image->image = basename($path);
            $image->save();
        }

        if ($request->image2) {
            $image = new MountsImag();
            $image->mount_id = $mount->id;
            $path = $request->file('image2')->store('public/mount');
            $image->image = basename($path);
            $image->save();
        }

        if ($request->image3) {
            $image = new MountsImag();
            $image->mount_id = $mount->id;
            $path = $request->file('image3')->store('public/mount');
            $image->image = basename($path);
            $image->save();
        }

        return redirect("mount")->with("flash_message", "mount added!");
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
        //$mount = Mount::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [mounts]--
        // ----------------------------------------------------
        $mount = DB::table("mounts")
            ->select("*")->addSelect("mounts.id")->where("mounts.id", $id)->first();
        return view("mount.show", compact("mount"));
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
        $mount = Mount::findOrFail($id);

        return view("mount.edit", compact("mount"));
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
            "name" => "nullable|max:50", //string('name',50)->nullable()
            "high" => "nullable|integer", //integer('high')->nullable()
            "famous" => "nullable|integer", //integer('famous')->nullable()
            "area" => "nullable|integer", //integer('area')->nullable()

        ]);
        $requestData = $request->all();

        $mount = Mount::findOrFail($id);
        $mount->update($requestData);

        return redirect("mount")->with("flash_message", "mount updated!");
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
        Mount::destroy($id);

        return redirect("mount")->with("flash_message", "mount deleted!");
    }
}
    //=======================================================================
