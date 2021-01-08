<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with('parent')->paginate(25);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $parents = Category::pluck('name','id')->all();
        
        return view('admin.categories.create', compact('parents'));
    }

    /**
     * Store a new category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Category::create($data);

            return redirect()->route('categories.category.index')
                             ->with('success_message', trans('categories.model_was_added'));

        } catch (Exception $exception) {
            //dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('categories.unexpected_error')]);
        }
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::with('parent')->findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::pluck('name','id')->all();

        return view('admin.categories.edit', compact('category','parents'));
    }

    /**
     * Update the specified category in the storage.
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
            
            $category = Category::findOrFail($id);
            $category->update($data);

            return redirect()->route('categories.category.index')
                             ->with('success_message', trans('categories.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('categories.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified category from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.category.index')
                             ->with('success_message', trans('categories.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('categories.unexpected_error')]);
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
            'slug' => 'string|min:1|nullable',
            'parent_id' => 'nullable',
            'cat_order' => 'string|min:1|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
