<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\LayerGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Exception;

class LayerGroupsController extends Controller
{

    /**
     * Display a listing of the layer groups.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $layerGroups = LayerGroup::with('map')->paginate(25);

        return view('admin.layer_groups.index', compact('layerGroups'));
    }

    /**
     * Show the form for creating a new layer group.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $maps = Map::pluck('map_name','id')->all();
        
        return view('admin.layer_groups.create', compact('maps'));
    }

    /**
     * Store a new layer group in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            LayerGroup::create($data);

            return redirect()->route('layer_groups.layer_group.index')
                             ->with('success_message', trans('layer_groups.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('layer_groups.unexpected_error')]);
        }
    }

    /**
     * Display the specified layer group.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $layerGroup = LayerGroup::with('map')->findOrFail($id);

        return view('admin.layer_groups.show', compact('layerGroup'));
    }

    /**
     * Show the form for editing the specified layer group.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $layerGroup = LayerGroup::findOrFail($id);
        $maps = Map::pluck('map_name','id')->all();

        return view('admin.layer_groups.edit', compact('layerGroup','maps'));
    }

    /**
     * Update the specified layer group in the storage.
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
            
            $layerGroup = LayerGroup::findOrFail($id);
            $layerGroup->update($data);

            return redirect()->route('layer_groups.layer_group.index')
                             ->with('success_message', trans('layer_groups.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('layer_groups.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified layer group from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $layerGroup = LayerGroup::findOrFail($id);
            $layerGroup->delete();

            return redirect()->route('layer_groups.layer_group.index')
                             ->with('success_message', trans('layer_groups.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('layer_groups.unexpected_error')]);
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
            'map_id' => 'nullable',
            'group_name' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'delete_at' => 'date_format:j/n/Y H:i|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
