<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Projection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class MapsController extends Controller
{

    /**
     * Display a listing of the maps.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $maps = Map::with('proj')->paginate(25);

        return view('admin.maps.index', compact('maps'));
    }

    /**
     * Show the form for creating a new map.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $projs = Projection::pluck('srid','id')->all();
        
        return view('admin.maps.create', compact('projs'));
    }

    /**
     * Store a new map in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Map::create($data);

            return redirect()->route('maps.map.index')
                             ->with('success_message', trans('maps.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('maps.unexpected_error')]);
        }
    }

    /**
     * Display the specified map.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $map = Map::with('proj')->findOrFail($id);

        return view('home.maps.view', compact('map'));
    }

    public function gwmap()
    {
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        $river_basins = DB::table('river_basins')
            ->select('*')
            ->orderBy('gid', 'DESC')->get();
        return view('home.maps.gwmap', ['monitoring_networks' => $monitoring_networks, 'river_basins' => $river_basins]);
    }
    public function hanhchinhmap()
    {
        return view('home.maps.hanhchinh');
    }
    public function diahinhmap()
    {
        return view('home.maps.diahinh');
    }
    public function diachatmap()
    {
        return view('home.maps.diachat');
    }
    public function diachatthuyvanmap()
    {
        return view('home.maps.diachatthuyvan');
    }
    public function luuvucsong()
    {
        return view('home.maps.luuvucsong');
    }
    public function quantracmua()
    {
        return view('home.maps.quantracmua');
    }
    public function swmap()
    {
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        $river_basins = DB::table('river_basins')
            ->select('*')
            ->orderBy('gid', 'DESC')->get();
        return view('home.maps.swmap', ['monitoring_networks' => $monitoring_networks, 'river_basins' => $river_basins]);
    }
    public function tainguyennuocmat()
    {
        return view('home.maps.tainguyennuocmat');
    }
    public function tainguyenndd()
    {
        return view('home.maps.tainguyenndd');
    }
    public function tainguyennuocmua()
    {
        return view('home.maps.tainguyennuocmua');
    }
    public function quantracktnm()
    {
        return view('home.maps.quantracktnm');
    }
    public function quantracktndd()
    {
        return view('home.maps.quantracktndd');
    }
    public function quantracxathai()
    {
        return view('home.maps.quantracxathai');
    }
    public function swreport()
    {
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        $river_basins = DB::table('river_basins')
            ->select('*')
            ->orderBy('gid', 'DESC')->get();
        return view('home.maps.swmap', ['monitoring_networks' => $monitoring_networks, 'river_basins' => $river_basins]);
    }
    public function gwreport()
    {
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        $river_basins = DB::table('river_basins')
            ->select('*')
            ->orderBy('gid', 'DESC')->get();
        return view('home.maps.gwmap', ['monitoring_networks' => $monitoring_networks, 'river_basins' => $river_basins]);
    }
    /**
     * Display the specified Map.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function view($id)
    {
        $map = Map::with('proj')->findOrFail($id);

        if (empty($map)) {
            Flash::error('Map not found');

            return redirect(route('maps.index'));
        }

        return view('home.maps.olview')->with('map', $map);
    }

    /**
     * Show the form for editing the specified map.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $map = Map::findOrFail($id);
        $projs = Projection::pluck('srid','id')->all();

        return view('admin.maps.edit', compact('map','projs'));
    }

    /**
     * Update the specified map in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $map = Map::findOrFail($id);
            $map->update($data);

            return redirect()->route('maps.map.index')
                             ->with('success_message', trans('maps.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('maps.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified map from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $map = Map::findOrFail($id);
            $map->delete();

            return redirect()->route('maps.map.index')
                             ->with('success_message', trans('maps.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('maps.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'map_name' => 'string|min:1|nullable',
            'map_title' => 'string|min:1|nullable',
            'map_abstract' => 'string|min:1|nullable',
            'extent_minx' => 'nullable',
            'extent_miny' => 'nullable',
            'extent_maxx' => 'nullable',
            'extent_maxy' => 'nullable',
            'status' => 'nullable|boolean',
            'unit' => 'string|min:1|nullable',
            'size_x' => 'string|min:1|nullable',
            'size_y' => 'string|min:1|nullable',
            'proj' => 'nullable',
            'web_minscale' => 'nullable',
            'web_maxscale' => 'nullable',
     
        ];

        
        $data = $request->validate($rules);


        $data['status'] = $request->has('status');


        return $data;
    }

}
