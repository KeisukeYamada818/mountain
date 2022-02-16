<?php

namespace App\Http\Controllers\main;

use App\Route;
use Illuminate\Http\Request;
use App\Mount;
use App\MountsImag;
use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//=======================================================================
class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $routes = collect([]);
        if (isset($request->mount_name) || isset($request->region) || isset($request->level) || isset($request->time)) {
            $query = Route::query();
            if (isset($request->mount_name)) {
                $mount_name = $request->mount_name;
                $mountQuery = Mount::query();
                $mounts = $mountQuery->where('name', 'like', "%$mount_name%")->get();
                if ($mounts->count() > 0) {
                    $mount_ids = $mounts->pluck('id');
                    $query = $query->whereIn('mount_id', $mount_ids);
                } else {
                    $query = $query->where('mount_id', '=', '-1');
                }
            }
            if (isset($request->level)) {
                $query = $query->where('level', '=', $request->level);
            }
            if (isset($request->time)) {
                $times = [
                    1 => ["start" => "00:00:00", "end" => "00:59:59"],
                    2 => ["start" => "01:00:00", "end" => "01:59:59"],
                    3 => ["start" => "02:00:00", "end" => "02:59:59"],
                    4 => ["start" => "03:00:00", "end" => "03:59:59"],
                    5 => ["start" => "04:00:00", "end" => "23:59:59"],
                ];
                if (isset($times[$request->time])) {
                    $time = $times[$request->time];
                    $query = $query->whereBetween('times', [$time["start"], $time["end"]]);
                }
            }
            if (isset($request->region)) {
                $areaQuery = Area::query();
                $areas = $areaQuery->whereIn('region_id', $request->region)->get();
                $area_ids = $areas->pluck('code');
                $mountQuery = Mount::query();
                $mounts = $mountQuery->whereIn('area_id', $area_ids)->get();
                $mount_ids = $mounts->pluck('id');
                $query = $query->whereIn('mount_id', $mount_ids);
            }
            $routes = $query->get();
        } else {
            $routes = Route::all();
        }
        return view("routes.index", compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("mounts.create");
    }

    public function favorite(Route $route)
    {
        $user = Auth::user();

        if ($user->hasFavorited($route)) {
            $user->unfavorite($route);
        } else {
            $user->favorite($route);
        }

        return redirect()->route('routes.show', $route);
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
    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
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
