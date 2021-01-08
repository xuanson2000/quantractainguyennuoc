<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class controllerxathai extends Controller
{
    //
    public function index(){

     $xathais=DB::table('xathai')->join('diemkhaosat', 'xathai.id_dks', '=', 'diemkhaosat.id_dks')->select('xathai.*','diemkhaosat.*')->paginate(20);

    
    	return view('xathai.index',['xathais'=>$xathais]);
    	isset( $xathais);

    }

    
     public function xathaidetail($id){

         
     $xathaidetails=DB::table('xathai')->join('diemkhaosat', 'xathai.id_dks', '=', 'diemkhaosat.id_dks')->where('xt_id',$id)->select('xathai.*','diemkhaosat.*')->first();

    
    	return view('xathai.xathaidetail',['xathaidetails'=>$xathaidetails]);

    }
}
