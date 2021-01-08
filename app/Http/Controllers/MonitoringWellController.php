<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MonitoringWell;
use DateTime;
class MonitoringWellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $wells = DB::table('monitoring_well')
            ->select('gid', 'id', 'well_code', DB::raw('st_x(ST_Transform(geom, 3405))'),
                DB::raw('st_y(ST_Transform(geom, 3405))'), 'province', 'district', 'commune', 'id_monitoring_network',
                'id_monitoring_line', 'water_layer', 'elevation', 'static_water_level', 'water_flow', 'drawdown',
                'water_flow_coeff', 'coeff_k', 'coeff_km', 'coeff_a', 'coeff_muy', 'monitor_meteo', 'monitor_hydro',
                'monitor_meteo_irrig','monitor_hydro_irrig','monitor_tide','monitor_pressure','monitor_meteo_hydro',
                'monitor_level','monitor_water_flow','monitor_templature','monitor_chemistry','start_date','description',
                'phuongphapqt','chedoquantrac_kt')
            ->paginate(25);
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        return view('home.monitoring_wells.index', ['wells' => $wells, 'monitoring_networks' => $monitoring_networks,'id_active' => '-1']);
    }

    public function wellsByNetwork($nid){
        $wells = DB::table('monitoring_well')
            ->select('gid', 'id', 'well_code', DB::raw('st_x(ST_Transform(geom, 3405))'),
                DB::raw('st_y(ST_Transform(geom, 3405))'), 'province', 'district', 'commune', 'id_monitoring_network',
                'id_monitoring_line', 'water_layer', 'elevation', 'static_water_level', 'water_flow', 'drawdown',
                'water_flow_coeff', 'coeff_k', 'coeff_km', 'coeff_a', 'coeff_muy', 'monitor_meteo', 'monitor_hydro',
                'monitor_meteo_irrig','monitor_hydro_irrig','monitor_tide','monitor_pressure','monitor_meteo_hydro',
                'monitor_level','monitor_water_flow','monitor_templature','monitor_chemistry','start_date','description',
                'phuongphapqt','chedoquantrac_kt')
            ->where('id_monitoring_network', '=', $nid)
            ->paginate(25);

        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();


        return view('home.monitoring_wells.index', ['wells' => $wells, 'monitoring_networks' => $monitoring_networks, 'id_active' => $nid]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function well_list_ajax(Request $request)
    {
        $listWells = DB::table('monitoring_well')->select('id', 'well_code', 'province', 'district', 'commune', 'id_monitoring_network', 'water_layer')->paginate(20);
        //dd($listWells);
        return view('home.monitoring_wells.well_list_ajax', ['listWells' => $listWells]);
    }

    public function well_list_auto_complete(Request $request)
    {
        $listWells = DB::table('monitoring_well')->select(DB::raw('well_code as name'))->get();
        return json_encode($listWells);
    }

    public function well_ajax_location(Request $request)
    {
        $well_code = $request->well_code;
        $well = DB::table('monitoring_well')->select(DB::raw('well_code, st_x(geom), st_y(geom)'))->where('well_code', '=', $well_code)->get();
        return json_encode($well);
    }

    public function well_ajax(Request $request)
    {
        $well_codes = $request->well_code;
        if (is_array($well_codes) == false) {
            $well_codes = array($request->well_code);
        }
        return view('home.monitoring_wells.well_ajax', ['well_codes' => $well_codes]);
    }

    public function well_ajax_content(Request $request)
    {
        $well_code = $request->well_code;
        $well = DB::table('monitoring_well')
            ->select('gid', 'id', 'well_code', DB::raw('st_x(ST_Transform(geom, 3405))'),
                DB::raw('st_y(ST_Transform(geom, 3405))'), 'province', 'district', 'commune', 'id_monitoring_network',
                'id_monitoring_line', 'water_layer')
            ->where('well_code', '=', $well_code)->get();
        $wl_years = DB::table('water_level')
            ->select(DB::raw('DISTINCT extract(year from date_measure) AS data_year'))
            ->where('well_code', '=', $well_code)
            ->orderBy('data_year', 'DESC')->get();
        $wt_years = DB::table('water_temperature')
            ->select(DB::raw('DISTINCT extract(year from date_measure) AS data_year'))
            ->where('well_code', '=', $well_code)
            ->orderBy('data_year', 'DESC')->get();
        return view('home.monitoring_wells.well_ajax_content', ['well' => $well[0], 'wl_years' => $wl_years, 'wt_years' => $wt_years]);
    }

    /*
     * Function for getting data and generating Water level chart
     */
    public function well_ajax_water_level(Request $request)
    {
        $from_to = $request->from_to;
        $well_code = $request->well_code;
        if ($from_to == '0') {
            $data_year = $request->data_year;
            //Get Water level data by well_code and data_year
            $wl_inyear = DB::table('water_level')
                ->select(DB::raw('(date_measure||\':\'||time_measure||\':00\')::timestamp'))
                ->addSelect('water_level')
                ->where('well_code', '=', $well_code)
                ->where(DB::raw('extract(year from date_measure)'), '=', $data_year)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($wl_inyear);
        } elseif ($from_to == '1') {
            $data_time_from = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_from)->format('Y-m-d');
            $data_time_to = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_to)->format('Y-m-d');
            //Get Water level data by well_code and data_year
            $wl_inyear = DB::table('water_level')
                ->select(DB::raw('(date_measure||\':\'||time_measure||\':00\')::timestamp'))
                ->addSelect('water_level')
                ->where('well_code', '=', $well_code)
                ->where('date_measure', '>=', $data_time_from)
                ->where('date_measure', '<=', $data_time_to)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($wl_inyear);
        }elseif ($from_to == '2') {
            $data_year_from = $request->data_year_from;
            $data_year_to = $request->data_year_to;
            //Get Water level data by well_code and data_year
            $wl_inyear = DB::table('water_level')
                ->select(DB::raw('(date_measure||\':\'||time_measure||\':00\')::timestamp'))
                ->addSelect('water_level')
                ->where('well_code', '=', $well_code)
                ->where(DB::raw('extract(year from date_measure)'), '>=', $data_year_from)
                ->where(DB::raw('extract(year from date_measure)'), '<=', $data_year_to)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($wl_inyear);
        }
    }

    public function ajax_network_wells_sidebar(Request $request)
    {
        $network_id = $request->network_id;
        if($network_id=="" || $network_id=="-1"){
            $listWells = MonitoringWell::all();
            //$listWells = DB::table('monitoring_well')->select('id', 'well_code', 'province', 'district', 'commune', 'id_monitoring_network', 'water_layer')->get();
        }
        else{
            $listWells = MonitoringWell::where('region',$network_id)->get();
            //$listWells = DB::table('monitoring_well')->select('id', 'well_code', 'province', 'district', 'commune', 'id_monitoring_network', 'region', 'water_layer')
                //->where('region', '=', $network_id)->get();
        }
        //dd($listWells);
        return view('home.monitoring_wells.well_list_ajax', ['listWells' => $listWells]);
    }

    /*
     * Function for getting data and generating Water temperature chart
     */
    public function well_ajax_water_temperature(Request $request)
    {
        $from_to = $request->from_to;
        $well_code = $request->well_code;
        if ($from_to == '0') {
            $data_year = $request->data_year;
            //Get Water level data by well_code and data_year
            $wt_inyear = DB::table('water_temperature')
                ->select(DB::raw('(date_measure||\':\'||time_measure||\':00\')::timestamp'))
                ->addSelect('temperature')
                ->where('well_code', '=', $well_code)
                ->where(DB::raw('extract(year from date_measure)'), '=', $data_year)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($wt_inyear);
        } elseif ($from_to == '1') {
            $data_time_from = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_from)->format('Y-m-d');
            $data_time_to = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_to)->format('Y-m-d');
            //Get Water level data by well_code and data_year
            $wt_inyear = DB::table('water_temperature')
                ->select(DB::raw('(date_measure||\':\'||time_measure||\':00\')::timestamp'))
                ->addSelect('temperature')
                ->where('well_code', '=', $well_code)
                ->where('date_measure', '>=', $data_time_from)
                ->where('date_measure', '<=', $data_time_to)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($wt_inyear);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $well = DB::table('monitoring_well')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'), DB::raw('st_x(ST_Transform(geom, 3405))'), DB::raw('st_y(ST_Transform(geom, 3405))'))
            ->where('id', '=', $id)->get();
        return view('home.monitoring_wells.show_general_info', ['well' => $well[0]]);
    }
    public function show_general_info($id)
    {
        $well = DB::table('monitoring_well')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'), DB::raw('st_x(ST_Transform(geom, 3405))'), DB::raw('st_y(ST_Transform(geom, 3405))'))
            ->where('id', '=', $id)->get();
        return view('home.monitoring_wells.show_general_info', ['well' => $well[0]]);
    }
    public function show_history_depth($id)
    {
        $well = DB::table('monitoring_well')
            ->select('*')
            ->where('id', '=', $id)->get();
        $well_code = $well[0]->well_code;
        $well_history = DB::table('lsctndd')
            ->select('*')
            ->where('sohieuct', '=', $well_code)->get();
        $well_depth = DB::table('water_depth')
            ->select('*')
            ->where('well_code', '=', $well_code)
            ->orderBy('thoigian', 'ASC')->get();
        return view('home.monitoring_wells.show_history_depth', ['well' => $well[0], 'well_history' => $well_history, 'well_depth' => $well_depth]);
    }
    public function show_structure_lithology($id)
    {
        $well = DB::table('monitoring_well')
            ->select('*')
            ->where('id', '=', $id)->get();
        $well_code = $well[0]->well_code;

        $well_structure = DB::table('wellmonitorstructure')
            ->select('*')
            ->where('wellcode', '=', $well_code)
            ->orderBy('ctto', 'ASC')->get();
        $well_lithology = DB::table('wellmonitorstratum')
            ->select('*')
            ->where('well_code', '=', $well_code)
            ->orderBy('dtto', 'ASC')->get();
        return view('home.monitoring_wells.show_structure_lithology', ['well' => $well[0], 'well_structure' => $well_structure, 'well_lithology' => $well_lithology]);
    }
    public function show_water_level($id)
    {
        $well = DB::table('monitoring_well')
            ->select('*')
            ->where('id', '=', $id)->get();
        $well_code = $well[0]->well_code;
        $wl_years = DB::table('water_level')
            ->select(DB::raw('DISTINCT extract(year from date_measure) AS data_year'))
            ->where('well_code', '=', $well_code)
            ->orderBy('data_year', 'DESC')->get();
        return view('home.monitoring_wells.show_water_level', ['well' => $well[0], 'wl_years' => $wl_years]);
    }
    public function show_water_temperature($id)
    {
        $well = DB::table('monitoring_well')
            ->select('*')
            ->where('id', '=', $id)->get();
        $well_code = $well[0]->well_code;
        $wt_years = DB::table('water_temperature')
            ->select(DB::raw('DISTINCT extract(year from date_measure) AS data_year'))
            ->where('well_code', '=', $well_code)
            ->orderBy('data_year', 'DESC')->get();
        return view('home.monitoring_wells.show_water_temperature', ['well' => $well[0], 'wt_years' => $wt_years]);
    }
    public function show_water_chemistry($id)
    {
        $well = DB::table('monitoring_well')
            ->select('*')
            ->where('id', '=', $id)->get();
        $well_code = $well[0]->well_code;
        $well_chemistry = DB::table('water_chemistry')
            ->select('*')
            ->where('well_code', '=', $well_code)
            ->orderBy('date_sampling', 'DESC')->get();
        return view('home.monitoring_wells.show_water_chemistry', ['well' => $well[0], 'well_chemistry' => $well_chemistry]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
