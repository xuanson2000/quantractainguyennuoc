<?php

namespace App\Http\Controllers;
use DB;
use App\vanban;
use App\loaivanban;
use Session;

use Illuminate\Http\Request;

class ControllerVanbanphapquy extends Controller
{
    public function index(){

    	$loaiVB=DB::table('loaivanban')->get();
    	$viewfile=DB::table('vanban')->get();

    	return view('vanbanphapquy.index',['viewfile'=>$viewfile,'loaiVB'=>$loaiVB]);
    }
 

    public function search(Request $request){
    	if($request->txtseach ==null && $request->loaivanban==0){
    		$viewseach=DB::table('vanban')->get();
    	}else if($request->txtseach ==null && $request->loaivanban!=0){ 
    		$lvb=$request->loaivanban;
    		$viewseach=DB::table('vanban')->where('id_loaivanban',$lvb)->get();
    	}else if($request->txtseach !=null && $request->loaivanban==0){ 
    		$nameseach=$request->txtseach;
    		$viewseach=DB::table('vanban')->where('Noidung','like','%'.$nameseach.'%')->take(30)->paginate(30);
    	}else if($request->txtseach !=null && $request->loaivanban!=0){ 
    		$nameseach=$request->txtseach;
    		$lvb =$request->loaivanban;
    		$viewseach=DB::table('vanban')->where('id_loaivanban',$lvb)->where('Noidung','like','%'.$nameseach.'%')->take(30)->paginate(30);
    	}
    	$loaiVB=DB::table('loaivanban')->get();    
    	return view('vanbanphapquy.index',['loaiVB'=>$loaiVB,'viewseach'=>$viewseach]);
        
    }

    public function chitiet($id){

         
    	//$vanbanchitiet=DB::table('vanban')->where('id',$id)->first();

    	$vanbanchitiet=vanban::where('id',$id)->first();

    	return view('vanbanphapquy.chitietvanban',['vanbanchitiet'=>$vanbanchitiet]);
    }

      public function taive($file){
    	$url=$file;
      	return response()->download("upload/{$url}");
       }
 


}
    