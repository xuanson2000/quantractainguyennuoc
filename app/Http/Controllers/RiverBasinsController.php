<?php

namespace App\Http\Controllers;

use App\Models\RiverBasin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class RiverBasinsController extends Controller
{

    /**
     * Display a listing of the river basins.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $riverBasins = RiverBasin::paginate(25);

        return view('admin.river_basins.index', compact('riverBasins'));
    }


    public function ajax_river_basin_feature(Request $request)
    {
        $basin_id = $request->basin_id;
        $basinJson = DB::table('river_basins')->select('gid', DB::raw('ST_AsGeoJSON(geom) as featureJSON'))
            ->where('gid', '=', $basin_id )->get();
        $featureJSON="";

        if(count($basinJson)>0){
            $featureJSON=$basinJson[0]->featurejson;
        }
        return $featureJSON;
    }


    /**
     * Show the form for creating a new river basin.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.river_basins.create');
    }

    /**
     * Store a new river basin in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            RiverBasin::create($data);

            return redirect()->route('river_basins.river_basin.index')
                             ->with('success_message', trans('river_basins.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('river_basins.unexpected_error')]);
        }
    }

    /**
     * Display the specified river basin.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $riverBasin = RiverBasin::findOrFail($id);

        return view('home.river_basins.show', compact('riverBasin'));
    }

    /**
     * Show the form for editing the specified river basin.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $riverBasin = RiverBasin::findOrFail($id);
        

        return view('admin.river_basins.edit', compact('riverBasin'));
    }

    /**
     * Update the specified river basin in the storage.
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
            
            $riverBasin = RiverBasin::findOrFail($id);
            $riverBasin->update($data);

            return redirect()->route('river_basins.river_basin.index')
                             ->with('success_message', trans('river_basins.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('river_basins.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified river basin from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $riverBasin = RiverBasin::findOrFail($id);
            $riverBasin->delete();

            return redirect()->route('river_basins.river_basin.index')
                             ->with('success_message', trans('river_basins.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('river_basins.unexpected_error')]);
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
            'name_o' => 'string|min:1|nullable',
            'basin_name' => 'string|min:1|nullable',
            'geom' => 'string|min:1|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
