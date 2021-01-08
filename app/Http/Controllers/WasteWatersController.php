<?php

namespace App\Http\Controllers;

use App\Models\Xt;
use App\Models\WasteWater;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class WasteWatersController extends Controller
{

    /**
     * Display a listing of the waste waters.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $wasteWaters = DB::table('xathai')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->paginate(25);
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        return view('home.waste_waters.index', ['wasteWaters' => $wasteWaters, 'monitoring_networks' => $monitoring_networks,'id_active' => '-1']);

    }

    /**
     * Show the form for creating a new waste water.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $xts = Xt::pluck('id','id')->all();
        
        return view('waste_waters.create', compact('xts'));
    }

    /**
     * Store a new waste water in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            WasteWater::create($data);

            return redirect()->route('waste_waters.waste_water.index')
                             ->with('success_message', trans('waste_waters.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('waste_waters.unexpected_error')]);
        }
    }

    /**
     * Display the specified waste water.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $wasteWater = DB::table('xathai')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('xt_id', '=', $id)->get();
        return view('home.waste_waters.show_general_info', ['wasteWater' => $wasteWater[0]]);
    }

    public function show_general_info($id)
    {
        $wasteWater = DB::table('xathai')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('xt_id', '=', $id)->get();
        return view('home.waste_waters.show_general_info', ['wasteWater' => $wasteWater[0]]);
    }

    public function show_discharge_vl($id)
    {
        $wasteWater = DB::table('xathai')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('xt_id', '=', $id)->get();
        return view('home.waste_waters.show_discharge_vl', ['wasteWater' => $wasteWater[0]]);
    }
    public function ww_ajax_vl(Request $request)
    {
        $wasteWater = DB::table('xathai')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('xt_id', '=', $id)->get();
        return view('home.waste_waters.ajax_wastewater_vl', ['wasteWater' => $wasteWater[0]]);
    }

    /**
     * Show the form for editing the specified waste water.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $wasteWater = WasteWater::findOrFail($id);
        $xts = Xt::pluck('id','id')->all();

        return view('waste_waters.edit', compact('wasteWater','xts'));
    }

    /**
     * Update the specified waste water in the storage.
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
            
            $wasteWater = WasteWater::findOrFail($id);
            $wasteWater->update($data);

            return redirect()->route('waste_waters.waste_water.index')
                             ->with('success_message', trans('waste_waters.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('waste_waters.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified waste water from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $wasteWater = WasteWater::findOrFail($id);
            $wasteWater->delete();

            return redirect()->route('waste_waters.waste_water.index')
                             ->with('success_message', trans('waste_waters.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('waste_waters.unexpected_error')]);
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
            'xt_id' => 'required',
            'id_dks' => 'nullable',
            'tennguonthai' => 'string|min:1|nullable',
            'luuluong' => 'double|nullable',
            'xt_tructiep' => 'boolean|nullable',
            'xt_daxuly' => 'boolean|nullable',
            'noitiepnhan' => 'string|min:1|nullable',
            'dotrong' => 'boolean|nullable',
            'mau' => 'string|min:1|nullable',
            'mui' => 'string|min:1|nullable',
            'loaihinh' => 'string|min:1|nullable',
            'sohieu_dks' => 'string|min:1|nullable',
            'geom' => 'string|min:1|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
