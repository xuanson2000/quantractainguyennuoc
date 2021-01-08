<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      
        $sw_articles = Article::with('category')->where('category_id','=','2')->orderBy('created_at','DESC')->get();

        $gw_articles = Article::with('category') ->where('category_id','=','1')->orderBy('created_at','DESC')->paginate(5);

        $year_books = Article::with('category')
        ->where('category_id','=','4')->paginate(7);

        $viewfile=DB::table('vanban')->get();

        return view('home.contents.homepage', ['sw_articles' => $sw_articles, 'gw_articles' => $gw_articles,'viewfile'=>$viewfile]);
    }
}
