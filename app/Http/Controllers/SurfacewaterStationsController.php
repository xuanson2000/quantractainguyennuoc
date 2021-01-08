<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurfacewaterStation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use DateTime;

class SurfacewaterStationsController extends Controller
{

    /**
     * Display a listing of the surfacewater stations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $stations = DB::table('surfacewater_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'), DB::raw('st_x(ST_Transform(geom, 3405))'), DB::raw('st_y(ST_Transform(geom, 3405))'))
            ->paginate(25);
            
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();

        return view('home.surfacewater_stations.index', ['stations' => $stations, 'monitoring_networks' => $monitoring_networks,'id_active' => '-1']);
    }

    /**
     * Show the form for creating 
     a new surfacewater station.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('surfacewater_stations.create');
    }

    /**
     * Store a new surfacewater station in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            SurfacewaterStation::create($data);

            return redirect()->route('surfacewater_stations.surfacewater_station.index')
                             ->with('success_message', trans('surfacewater_stations.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('surfacewater_stations.unexpected_error')]);
        }
    }

    /*
     * Function for getting data and generating Water level chart
     */
    public function sw_ajax_water_level(Request $request)
    {
        $from_to = $request->from_to;
        $matram = $request->matram;
        if ($from_to == '0') {
            $data_year = $request->data_year;
            //Get Water level data by well_code and data_year
            $wl_inyear = DB::table('surfacewater_level')
                ->select(DB::raw('(date_measure||\':\'||time_measure||\':00\')::timestamp'))
                ->addSelect('water_level')
                ->where('station_code', '=', $matram)
                ->where(DB::raw('extract(year from date_measure)'), '=', $data_year)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($wl_inyear);
        } elseif ($from_to == '1') {
            $data_time_from = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_from)->format('Y-m-d');
            $data_time_to = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_to)->format('Y-m-d');
            //Get Water level data by well_code and data_year
            $wl_inyear = DB::table('surfacewater_level')
                ->select(DB::raw('(date_measure||\':\'||time_measure||\':00\')::timestamp'))
                ->addSelect('water_level')
                ->where('station_code', '=', $matram)
                ->where('date_measure', '>=', $data_time_from)
                ->where('date_measure', '<=', $data_time_to)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($wl_inyear);
        }
    }

    /*
     * Function for getting data and generating Water temperature chart
     */
    public function sw_ajax_water_flow(Request $request)
    {
        $from_to = $request->from_to;
        $matram = $request->matram;
        if ($from_to == '0') {
            $data_year = $request->data_year;
            //Get Water level data by well_code and data_year
            $wf_inyear = DB::table('surfacewater_flow')
                ->select(DB::raw('(date_measure||\':\'||time_measure_start||\':00\')::timestamp as time_measure_start'))
                ->addSelect(DB::raw('(date_measure||\':\'||time_measure_end||\':00\')::timestamp as time_measure_end'))
                ->addSelect('q_value')
                ->where('station_code', '=', $matram)
                ->where(DB::raw('extract(year from date_measure)'), '=', $data_year)
                ->orderBy('time_measure_start', 'ASC')->get();
            return json_encode($wf_inyear);
        } elseif ($from_to == '1') {
            $data_time_from = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_from)->format('Y-m-d');
            $data_time_to = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_to)->format('Y-m-d');
            //Get Water level data by well_code and data_year
            $wf_inyear = DB::table('surfacewater_flow')
                ->select(DB::raw('(date_measure||\':\'||time_measure_start||\':00\')::timestamp as time_measure_start'))
                ->addSelect(DB::raw('(date_measure||\':\'||time_measure_end||\':00\')::timestamp as time_measure_end'))
                ->addSelect('q_value')
                ->where('station_code', '=', $matram)
                ->where('date_measure', '>=', $data_time_from)
                ->where('date_measure', '<=', $data_time_to)
                ->orderBy('time_measure_start', 'ASC')->get();
            return json_encode($wf_inyear);
        }
    }


    /**
     * Display the specified surfacewater station.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $station = DB::table('surfacewater_station')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'), DB::raw('st_x(ST_Transform(geom, 3405))'), DB::raw('st_y(ST_Transform(geom, 3405))'))
            ->where('gid', '=', $id)->get();
        return view('home.surfacewater_stations.show_general_info', ['station' => $station[0]]);
    }

    public function show_general_info($id)
    {
        $station = DB::table('surfacewater_station')
                ->select('*')
                ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'), DB::raw('st_x(ST_Transform(geom, 3405))'), DB::raw('st_y(ST_Transform(geom, 3405))'))
                ->where('gid', '=', $id)->get();
        return view('home.surfacewater_stations.show_general_info', ['station' => $station[0]]);
    }

    public function show_water_level($id)
    {
        $station = DB::table('surfacewater_station')
            ->select('*')
            ->where('gid', '=', $id)->get();
        $matram = $station[0]->matram;
        $wl_years = DB::table('surfacewater_level')
            ->select(DB::raw('DISTINCT extract(year from date_measure) AS data_year'))
            ->where('station_code', '=', $matram)
            ->orderBy('data_year', 'DESC')->get();
        return view('home.surfacewater_stations.show_water_level', ['station' => $station[0], 'wl_years' => $wl_years]);
    }
    public function show_water_capacity($id)
    {
        $station = DB::table('surfacewater_station')
            ->select('*')
            ->where('gid', '=', $id)->get();
        $matram = $station[0]->matram;
        $wf_years = DB::table('surfacewater_flow')
            ->select(DB::raw('DISTINCT extract(year from date_measure) AS data_year'))
            ->where('station_code', '=', $matram)
            ->orderBy('data_year', 'DESC')->get();
        return view('home.surfacewater_stations.show_water_capacity', ['station' => $station[0], 'wf_years' => $wf_years]);
    }
    public function show_water_chemistry($id)
    {
        $station = DB::table('surfacewater_station')
            ->select('*')
            ->where('gid', '=', $id)->get();
        $matram = $station[0]->matram;
        $station_mt = DB::table('surfacewater_enviroment')
            ->select('*')
            ->where('station_code', '=', $matram)
            ->orderBy('date_measure', 'DESC')->get();
        return view('home.monitoring_wells.show_water_chemistry', ['station' => $station[0], 'station_mt' => $station_mt]);
    }




    /**
     * Show the form for editing the specified surfacewater station.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $surfacewaterStation = SurfacewaterStation::findOrFail($id);
        

        return view('surfacewater_stations.edit', compact('surfacewaterStation'));
    }

    /**
     * Update the specified surfacewater station in the storage.
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
            
            $surfacewaterStation = SurfacewaterStation::findOrFail($id);
            $surfacewaterStation->update($data);

            return redirect()->route('surfacewater_stations.surfacewater_station.index')
                             ->with('success_message', trans('surfacewater_stations.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('surfacewater_stations.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified surfacewater station from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $surfacewaterStation = SurfacewaterStation::findOrFail($id);
            $surfacewaterStation->delete();

            return redirect()->route('surfacewater_stations.surfacewater_station.index')
                             ->with('success_message', trans('surfacewater_stations.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('surfacewater_stations.unexpected_error')]);
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
            'gid' => 'nullable|string|min:0',
            'matram' => 'string|min:1|nullable',
            'tentram' => 'string|min:1|nullable',
            'tensong' => 'string|min:1|nullable',
            'luuvucsong' => 'string|min:1|nullable',
            'xa' => 'string|min:1|nullable',
            'huyen' => 'string|min:1|nullable',
            'tinh' => 'string|min:1|nullable',
            'toadox' => 'double|nullable',
            'toadoy' => 'double|nullable',
            'dientichtn' => 'double|nullable',
            'thongsoqt' => 'string|min:1|nullable',
            'geom' => 'string|min:1|nullable',
            'ngayqt' => 'string|min:1|nullable|date_format:j/n/Y H:i',
            'capquanly' => 'string|min:1|nullable',
            'mota' => 'string|min:1|nullable',
            'docaoz' => 'boolean|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
