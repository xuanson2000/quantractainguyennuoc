<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring_line;
use App\Http\Controllers\Controller;
use Exception;

class MonitoringLinesController extends Controller
{

    /**
     * Display a listing of the monitoring lines.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $monitoringLines = Monitoring_line::paginate(25);

        return view('monitoring_lines.index', compact('monitoringLines'));
    }

    /**
     * Show the form for creating a new monitoring line.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('monitoring_lines.create');
    }

    /**
     * Store a new monitoring line in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Monitoring_line::create($data);

            return redirect()->route('monitoring_lines.monitoring_line.index')
                             ->with('success_message', trans('monitoring_lines.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('monitoring_lines.unexpected_error')]);
        }
    }

    /**
     * Display the specified monitoring line.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $monitoringLine = Monitoring_line::findOrFail($id);

        return view('monitoring_lines.show', compact('monitoringLine'));
    }

    /**
     * Show the form for editing the specified monitoring line.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $monitoringLine = Monitoring_line::findOrFail($id);
        

        return view('monitoring_lines.edit', compact('monitoringLine'));
    }

    /**
     * Update the specified monitoring line in the storage.
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
            
            $monitoringLine = Monitoring_line::findOrFail($id);
            $monitoringLine->update($data);

            return redirect()->route('monitoring_lines.monitoring_line.index')
                             ->with('success_message', trans('monitoring_lines.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('monitoring_lines.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified monitoring line from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $monitoringLine = Monitoring_line::findOrFail($id);
            $monitoringLine->delete();

            return redirect()->route('monitoring_lines.monitoring_line.index')
                             ->with('success_message', trans('monitoring_lines.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('monitoring_lines.unexpected_error')]);
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
            'gid' => 'string|min:1|nullable',
            'line_name' => 'string|min:1|nullable',
            'id_network' => 'string|min:1|nullable',
            'geom' => 'string|min:1|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
