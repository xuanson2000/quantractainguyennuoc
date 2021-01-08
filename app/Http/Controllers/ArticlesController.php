<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\MonitoringNetwork;
use App\Models\RiverBasin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the articles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::with('category')->paginate(25);

        return view('admin.articles.index', compact('articles'));
    }

    public function ajax_network_swreport_sidebar(Request $request)
    {
        $network_id = $request->network_id;
        $sw_articles = Article::with('category')
            ->where('category_id','=','2')
            ->where('network_id', '=', $network_id)
            ->get();
        return view('home.articles.article_list_sidebar_ajax', ['sw_articles' => $sw_articles]);
    }

    public function ajax_basin_swreport_sidebar(Request $request)
    {
        $basin_id=$request->basin_id;
        $sw_articles = Article::with('category')
            ->where('category_id','=','2')
            ->where('basin_id', '=', $basin_id)
            ->get();
        return view('home.articles.article_list_sidebar_ajax', ['sw_articles' => $sw_articles]);
    }
    public function ajax_network_gwreport_sidebar(Request $request)
    {
        $network_id = $request->network_id;
        $gw_articles = Article::with('category')
            ->where('category_id','=','1')
            ->where('network_id', '=', $network_id)
            ->get();
        return view('home.articles.gw_article_list_sidebar_ajax', ['gw_articles' => $gw_articles]);
    }
    public function ajax_basin_gwreport_sidebar(Request $request)
    {
        $basin_id=$request->basin_id;
        $gw_articles = Article::with('category')
            ->where('category_id','=','1')
            ->where('basin_id', '=', $basin_id)
            ->get();
        return view('home.articles.gw_article_list_sidebar_ajax', ['gw_articles' => $gw_articles]);
    }

    public function articlesByCategory($cat)
    {
        $articles = Article::with('category')
            ->where('category_id','=',$cat)
            ->paginate(10);
        $sw_cats=DB::table('web_categories')
            ->select('*')
            ->where('parent_id', '=', '2')
            ->orderBy('cat_order', 'DESC')->get();
        $gw_cats=DB::table('web_categories')
            ->select('*')
            ->where('parent_id', '=', '1')
            ->orderBy('cat_order', 'DESC')->get();
        $rp_cats=DB::table('web_categories')
            ->select('*')
            ->where('parent_id', '=', '3')
            ->orderBy('cat_order', 'DESC')->get();
        return view('home.articles.index',['articles' => $articles, 'sw_cats' => $sw_cats, 'gw_cats' => $gw_cats, 'rp_cats' => $rp_cats, 'id_active' => $cat]);
    }
    /**
     * Show the form for creating a new article.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        $networks = MonitoringNetwork::pluck('network_name','id')->all();
        $basins = RiverBasin::pluck('basin_name','gid');
        return view('admin.articles.create', compact('categories','networks','basins'));
    }

    /**
     * Store a new article in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            Article::create($data);

            return redirect()->route('articles.article.index')
                             ->with('success_message', trans('articles.model_was_added'));

        } catch (Exception $exception) {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('articles.unexpected_error')]);
        }
    }

    /**
     * Display the specified article.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $article = Article::with('category')->findOrFail($id);

        return view('home.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
        $networks = MonitoringNetwork::pluck('network_name','id')->all();
        $basins = RiverBasin::pluck('basin_name','gid');
        return view('admin.articles.edit', compact('article','categories','networks','basins'));
    }

    /**
     * Update the specified article in the storage.
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
            //dd($data);
            $article = Article::findOrFail($id);
            $article->update($data);

            return redirect()->route('articles.article.index')
                             ->with('success_message', trans('articles.model_was_updated'));

        } catch (Exception $exception) {
            dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('articles.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified article from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();
            return redirect()->route('articles.article.index')
                             ->with('success_message', trans('articles.model_was_deleted'));
        } catch (Exception $exception) {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('articles.unexpected_error')]);
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
            'author' => 'string|min:1|max:255|nullable',
            'category_id' => 'nullable',
            'network_id' => 'nullable',
            'basin_id' => 'nullable',
            'title' => 'string|min:1|max:255|nullable',
            'seo_title' => 'string|min:1|nullable',
            'excerpt' => 'string|min:1|nullable',
            'content' => 'string|min:1|nullable',
            'image' => 'string|nullable|min:0',
            'slug' => 'string|min:1|nullable',
            'meta_description' => 'string|min:1|nullable',
            'meta_keywords' => 'string|min:1|nullable',
            'article_status' => 'string|min:1|nullable',
            'featured' => 'string|min:1|nullable',
            'delete_at' => 'date_format:j/n/Y H:i|nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
