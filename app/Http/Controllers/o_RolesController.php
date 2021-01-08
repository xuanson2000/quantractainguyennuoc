<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class RolesController extends Controller
{

    /**
     * Display a listing of the roles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::paginate(25);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('roles.create');
    }

    /**
     * Store a new role in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $role_name=$data['name'];
            Role::create(['name' => $role_name]);

            return redirect()->route('roles.role.index')
                             ->with('success_message', trans('roles.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
        }
    }

    /**
     * Display the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = DB::select('SELECT id, name, guard_name FROM public.permissions');

        return view('roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified role in the storage.
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
            
            $role = Role::findOrFail($id);
            $role->update($data);

            return redirect()->route('roles.role.index')
                             ->with('success_message', trans('roles.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
        }        
    }

    /**
     * Update permissions for the specified role in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update_permissions($id, Request $request)
    {
        $checked_permissions = $_POST['role_permission'];
        if (count($checked_permissions) >0){
            $role = Role::findOrFail($id);
            $irole = 0;
            for($irole == 0; $irole < count($checked_permissions); $irole++){
                $per_id = $checked_permissions[$irole];
                $selected_permission = Permission::findOrFail($per_id);
                if (!$role->hasPermissionTo($selected_permission)){
                    $role->givePermissionTo($selected_permission);
                }
            }
        }
        return redirect()->route('roles.role.index')
            ->with('success_message', trans('roles.model_was_updated'));

    }
    /**
     * Remove the specified role from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return redirect()->route('roles.role.index')
                             ->with('success_message', trans('roles.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
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
            'name' => 'string|min:1|max:255|nullable',
            'guard_name' => 'string|min:1|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
