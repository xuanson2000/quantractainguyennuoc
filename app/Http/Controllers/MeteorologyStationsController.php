<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeteorologyStation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Exception;
use DateTime;

class MeteorologyStationsController extends Controller
{
    /**
     * Display a listing of the meteorology stations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $meteorologyStations = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->paginate(25);
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        return view('home.meteorology_stations.index', ['meteorologyStations' => $meteorologyStations, 'monitoring_networks' => $monitoring_networks,'id_active' => '-1']);

    }

    /**
     * Show the form for creating a new meteorology station.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('meteorology_stations.create');
    }

    /**
     * Store a new meteorology station in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            MeteorologyStation::create($data);

            return redirect()->route('meteorology_stations.meteorology_station.index')
                             ->with('success_message', trans('meteorology_stations.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('meteorology_stations.unexpected_error')]);
        }
    }

    /**
     * Display the specified meteorology station.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_general_info', ['meteorologyStation' => $meteorologyStation[0]]);
    }

    public function show_general_info($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_general_info', ['meteorologyStation' => $meteorologyStation[0]]);
    }

    public function show_air_temperature($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_air_temperature', ['meteorologyStation' => $meteorologyStation[0]]);
    }
    public function show_rainfall($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_rainfall', ['meteorologyStation' => $meteorologyStation[0]]);
    }
    public function show_evaporation($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_evaporation', ['meteorologyStation' => $meteorologyStation[0]]);
    }
    public function show_humidity($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_humidity', ['meteorologyStation' => $meteorologyStation[0]]);
    }
    public function show_sunny($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_sunny', ['meteorologyStation' => $meteorologyStation[0]]);
    }
    public function show_windy($id)
    {
        $meteorologyStation = DB::table('meteorology_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.meteorology_stations.show_windy', ['meteorologyStation' => $meteorologyStation[0]]);
    }

    /**
     * Show the form for editing the specified meteorology station.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $meteorologyStation = MeteorologyStation::findOrFail($id);
        

        return view('meteorology_stations.edit', compact('meteorologyStation'));
    }

    /**
     * Update the specified meteorology station in the storage.
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
            
            $meteorologyStation = MeteorologyStation::findOrFail($id);
            $meteorologyStation->update($data);

            return redirect()->route('meteorology_stations.meteorology_station.index')
                             ->with('success_message', trans('meteorology_stations.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('meteorology_stations.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified meteorology station from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $meteorologyStation = MeteorologyStation::findOrFail($id);
            $meteorologyStation->delete();

            return redirect()->route('meteorology_stations.meteorology_station.index')
                             ->with('success_message', trans('meteorology_stations.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('meteorology_stations.unexpected_error')]);
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
            'gid' => 'required|integer',
            'matram' => 'integer|nullable',
            'tentram' => 'string|min:1|nullable',
            'diadanh' => 'string|min:1|nullable',
            'tentinh' => 'string|min:1|nullable',
            'loai' => 'string|min:1|nullable',
            'bucxa' => 'string|min:1|nullable',
            'ktnn' => 'string|min:1|nullable',
            'giamsatbdk' => 'string|min:1|nullable',
            'qtkttc' => 'string|min:1|nullable',
            'tkvt' => 'string|min:1|nullable',
            'pilotdogiotrencao' => 'string|min:1|nullable',
            'ozonbxct' => 'string|min:1|nullable',
            'radathoitiet' => 'string|min:1|nullable',
            'dinhviset' => 'string|min:1|nullable',
            'dogiocatlop' => 'string|min:1|nullable',
            'qtmthienco' => 'string|min:1|nullable',
            'qtmtquyhoach' => 'string|min:1|nullable',
            'daco' => 'string|min:1|nullable',
            'quyhoach' => 'string|min:1|nullable',
            'geom' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
