<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Exception;

class ProjectionsController extends Controller
{

    /**
     * Display a listing of the projections.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $projections = Projection::paginate(25);

        return view('admin.projections.index', compact('projections'));
    }

    /**
     * Show the form for creating a new projection.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('admin.projections.create');
    }

    /**
     * Store a new projection in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $data = $this->getData($request);
            Projection::create($data);

            return redirect()->route('projections.projection.index')
                             ->with('success_message', trans('projections.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('projections.unexpected_error')]);
        }
    }

    /**
     * Display the specified projection.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $projection = Projection::findOrFail($id);

        return view('admin.projections.show', compact('projection'));
    }

    /**
     * Show the form for editing the specified projection.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $projection = Projection::findOrFail($id);
        

        return view('admin.projections.edit', compact('projection'));
    }

    /**
     * Update the specified projection in the storage.
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
            
            $projection = Projection::findOrFail($id);
            $projection->update($data);

            return redirect()->route('projections.projection.index')
                             ->with('success_message', trans('projections.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('projections.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified projection from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $projection = Projection::findOrFail($id);
            $projection->delete();

            return redirect()->route('projections.projection.index')
                             ->with('success_message', trans('projections.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('projections.unexpected_error')]);
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
            'srid' => 'string|min:1|required',
            'proj4_params' => 'string|min:1|nullable',
            'extent' => 'string|min:1|nullable',
     
        ];
        $data = $request->validate($rules);
        return $data;
    }

}
