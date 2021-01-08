<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Ollayer;
use App\Models\LayerGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use DB;

class OllayersController extends Controller
{

    /**
     * Display a listing of the ollayers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ollayers = Ollayer::with('map_id','group_id')->paginate(25);

        return view('admin.ollayers.index', compact('ollayers'));
    }

    /**
     * Show the form for creating a new ollayer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $map_ids = Map::pluck('map_name','id')->all();
        $group_ids = LayerGroup::pluck('group_name','id')->all();
        return view('admin.ollayers.create', compact('map_ids','group_ids'));
    }

    /**
     * Store a new ollayer in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);

            Ollayer::create($data);
            return redirect()->route('ollayers.ollayer.index')
                             ->with('success_message', trans('ollayers.model_was_added'));

        } catch (Exception $exception) {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('ollayers.unexpected_error')]);
        }
    }

    /**
     * Display the specified ollayer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ollayer = Ollayer::with('map_id','group_id')->findOrFail($id);

        return view('admin.ollayers.show', compact('ollayer'));
    }

    /**
     * Show the form for editing the specified ollayer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ollayer = Ollayer::findOrFail($id);
        $map_ids = Map::pluck('map_name','id')->all();
        $group_ids = LayerGroup::pluck('group_name','id')->all();

        return view('admin.ollayers.edit', compact('ollayer','map_ids','group_ids'));
    }

    /**
     * Update the specified ollayer in the storage.
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
            
            $ollayer = Ollayer::findOrFail($id);
            $ollayer->update($data);

            return redirect()->route('ollayers.ollayer.index')
                             ->with('success_message', trans('ollayers.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('ollayers.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ollayer from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ollayer = Ollayer::findOrFail($id);
            $ollayer->delete();

            return redirect()->route('ollayers.ollayer.index')
                             ->with('success_message', trans('ollayers.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('ollayers.unexpected_error')]);
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
            'group_id' => 'nullable',
            'layer_name' => 'string|min:1|nullable',
            'layer_title' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'opacity' => 'nullable',
            'source' => 'nullable|string|min:0',
            'visible' => 'nullable|boolean',
            'minxextent' => 'nullable',
            'minyextent' => 'nullable',
            'maxxextent' => 'nullable',
            'maxyextent' => 'nullable',
            'zindex' => 'nullable',
            'minresolution' => 'nullable',
            'maxresolution' => 'nullable',
            'delete_at' => 'date_format:j/n/Y H:i|nullable',
     
        ];

        
        $data = $request->validate($rules);


        $data['visible'] = $request->has('visible');


        return $data;
    }

}
