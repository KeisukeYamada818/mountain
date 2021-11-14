<?php

namespace App\Http\Controllers\manage;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Mount;
use App\Http\Controllers\Controller;
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
            $mount = Mount::where("id", "LIKE", "%$keyword%")->orWhere("name", "LIKE", "%$keyword%")->orWhere("high", "LIKE", "%$keyword%")->orWhere("famous", "LIKE", "%$keyword%")->orWhere("area", "LIKE", "%$keyword%")->paginate($perPage);
        } else {
            $mount = Mount::paginate($perPage);
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
        $mount->area_id = $request->area_id;
        $mount->high = $request->high;
        $mount->famous = $request->famous;
        $mount->save();

        $image1 = $request->file('image1');
        if ($image1) {
            $path = $image1->store('public/mount');
            $file_name = basename($path);
            $mounts_image = new MountsImag();
            $mounts_image->mount_id = $mount->id;
            $mounts_image->image = $file_name;
            $mounts_image->save();
        }
        $image2 = $request->file('image2');
        if ($image2) {
            $path = $image2->store('public/mount');
            $file_name = basename($path);
            $mounts_image = new MountsImag();
            $mounts_image->mount_id = $mount->id;
            $mounts_image->image = $file_name;
            $mounts_image->save();
        }
        $image3 = $request->file('image3');
        if ($image3) {
            $path = $image3->store('public/mount');
            $file_name = basename($path);
            $mounts_image = new MountsImag();
            $mounts_image->mount_id = $mount->id;
            $mounts_image->image = $file_name;
            $mounts_image->save();
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
    public function show($mount)
    {

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
