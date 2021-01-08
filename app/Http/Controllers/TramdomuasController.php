<?php

namespace App\Http\Controllers;

use App\Models\Tramdomua;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use DateTime;

class TramdomuasController extends Controller
{

    /**
     * Display a listing of the tramdomuas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $tramdomuas = DB::table('tramdomua')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->paginate(25);
        $monitoring_networks = DB::table('monitoring_network')
            ->select('*')
            ->orderBy('id', 'DESC')->get();
        return view('home.tramdomua.index', ['tramdomuas' => $tramdomuas, 'monitoring_networks' => $monitoring_networks,'id_active' => '-1']);
    }

    /**
     * Show the form for creating a new tramdomua.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('tramdomuas.create');
    }

    /**
     * Store a new tramdomua in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Tramdomua::create($data);

            return redirect()->route('tramdomuas.tramdomua.index')
                             ->with('success_message', trans('tramdomuas.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('tramdomuas.unexpected_error')]);
        }
    }

    /**
     * Display the specified tramdomua.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $tramdomua = DB::table('tramdomua')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.tramdomua.show_general_info', ['tramdomua' => $tramdomua[0]]);

    }

    public function show_general_info($id)
    {
        $tramdomua = DB::table('tramdomua')
            ->select('*')
            ->addSelect(DB::raw('st_x(geom) as gx'), DB::raw('st_y(geom) as gy'))
            ->where('gid', '=', $id)->get();
        return view('home.tramdomua.show_general_info', ['tramdomua' => $tramdomua[0]]);
    }

    public function show_rainfall($id)
    {
        $tramdomua = DB::table('tramdomua')
            ->select('*')
            ->where('gid', '=', $id)->get();
        $sohieutram = $tramdomua[0]->sohieu;
        $rf_years = DB::table('tramdomua_luongmua')
            ->select(DB::raw('DISTINCT extract(year from date) AS data_year'))
            ->where('sohieutram', '=', $sohieutram)
            ->orderBy('data_year', 'DESC')->get();
        return view('home.tramdomua.show_rainfall', ['tramdomua' => $tramdomua[0], 'rf_years' => $rf_years]);
    }

    public function rf_ajax_rainfall(Request $request)
    {
        $from_to = $request->from_to;
        $sohieu = $request->sohieu;
        if ($from_to == '0') {
            $data_year = $request->data_year;
            //Get Water level data by well_code and data_year
            $rf_inyear = DB::table('tramdomua_luongmua')
                ->select(DB::raw('(date||\':00:00:00\')::timestamp'))
                ->addSelect('giatri')
                ->where('sohieutram', '=', $sohieu)
                ->where(DB::raw('extract(year from date)'), '=', $data_year)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($rf_inyear);
        } elseif ($from_to == '1') {
            $data_time_from = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_from)->format('Y-m-d');
            $data_time_to = DateTime::createFromFormat('d/m/Y',(string)$request->data_year_to)->format('Y-m-d');
            //Get Water level data by well_code and data_year
            $rf_inyear = DB::table('tramdomua_luongmua')
                ->select(DB::raw('(date||\':00:00:00\')::timestamp'))
                ->addSelect('giatri')
                ->where('sohieutram', '=', $sohieu)
                ->where('date', '>=', $data_time_from)
                ->where('date', '<=', $data_time_to)
                ->orderBy('timestamp', 'ASC')->get();
            return json_encode($rf_inyear);
        }
    }
    /**
     * Show the form for editing the specified tramdomua.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $tramdomua = Tramdomua::findOrFail($id);
        

        return view('tramdomuas.edit', compact('tramdomua'));
    }

    /**
     * Update the specified tramdomua in the storage.
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
            
            $tramdomua = Tramdomua::findOrFail($id);
            $tramdomua->update($data);

            return redirect()->route('tramdomuas.tramdomua.index')
                             ->with('success_message', trans('tramdomuas.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('tramdomuas.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified tramdomua from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $tramdomua = Tramdomua::findOrFail($id);
            $tramdomua->delete();

            return redirect()->route('tramdomuas.tramdomua.index')
                             ->with('success_message', trans('tramdomuas.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('tramdomuas.unexpected_error')]);
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
            'gid' => 'required|string|min:1',
            'tt' => 'string|min:1|nullable',
            'tentram' => 'integer|nullable',
            'diadanh' => 'string|min:1|nullable',
            'x' => 'double|nullable',
            'y' => 'double|nullable',
            'geom' => 'string|min:1|nullable',
            'tinh' => 'string|min:1|nullable',
            'huyen' => 'string|min:1|nullable',
            'xa' => 'string|min:1|nullable',
            'ghichu' => 'string|min:1|nullable',
            'sohieu' => 'string|min:1|nullable',
            'mota' => 'string|min:1|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
