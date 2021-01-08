<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonitoringNetwork;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
class MonitoringNetworksController extends Controller
{

    /**
     * Display a listing of the monitoring networks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $monitoringNetworks = MonitoringNetwork::paginate(25);

        return view('home.monitoring_networks.index', compact('monitoringNetworks'));
    }



    public function ajax_network_feature(Request $request)
    {
        $network_id = $request->network_id;
        $networkJson = DB::table('monitoring_network')->select('gid','id', DB::raw('ST_AsGeoJSON(geom) as featureJSON'))
            ->where('id', '=', $network_id )->get();
        $featureJSON="";

        if(count($networkJson)>0){
            $featureJSON=$networkJson[0]->featurejson;
        }
        return $featureJSON;
    }


    /**
     * Show the form for creating a new monitoring network.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.monitoring_networks.create');
    }

    /**
     * Store a new monitoring network in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            MonitoringNetwork::create($data);

            return redirect()->route('networks.network.index')
                             ->with('success_message', trans('monitoring_networks.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('monitoring_networks.unexpected_error')]);
        }
    }

    /**
     * Display the specified monitoring network.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $monitoringNetwork = MonitoringNetwork::findOrFail($id);

        return view('home.monitoring_networks.show', compact('monitoringNetwork'));
    }

    /**
     * Show the form for editing the specified monitoring network.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $monitoringNetwork = MonitoringNetwork::findOrFail($id);
        

        return view('admin.monitoring_networks.edit', compact('monitoringNetwork'));
    }

    /**
     * Update the specified monitoring network in the storage.
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
            
            $monitoringNetwork = MonitoringNetwork::findOrFail($id);
            $monitoringNetwork->update($data);

            return redirect()->route('networks.network.index')
                             ->with('success_message', trans('monitoring_networks.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('monitoring_networks.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified monitoring network from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $monitoringNetwork = MonitoringNetwork::findOrFail($id);
            $monitoringNetwork->delete();

            return redirect()->route('networks.network.index')
                             ->with('success_message', trans('monitoring_networks.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('monitoring_networks.unexpected_error')]);
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
            'id' => 'nullable',
            'network_name' => 'string|min:1|nullable',
            'network_code' => 'string|min:1|nullable',
            'geom' => 'string|min:1|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
