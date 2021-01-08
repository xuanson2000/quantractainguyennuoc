<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use DB;



class controllerbantin extends Controller
{
    //

    
public function bantinindex(){

        // $sw_articles = Article::with('category')
        //     ->where('category_id','=','2')
        //     ->paginate(5);

            $sw_articless =Article::with('category')->where('category_id','=','2')->orderBy('created_at','DESC')->paginate(5);
    //$sw_articless=$sw_articles->SortByDesc('created_at');

// dd($sw_articless);
        // $gw_articles = Article::with('category')
        //     ->where('category_id','=','1')
        //     ->paginate(5);

            $gw_articles =Article::with('category')->where('category_id','=','1')->orderBy('created_at','DESC')->paginate(5);

        $year_books = Article::with('category')
        ->where('category_id','=','4')
        ->paginate(7);

        $viewfile=DB::table('vanban')->get();

  return view('bantin.index',['sw_articless'=>$sw_articless,'gw_articles'=>$gw_articles,'year_books'=>$year_books]);
}

}
