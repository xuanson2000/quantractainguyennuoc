<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerlienhe extends Controller
{
    //

    public function lienhe(){

    	return view('home.lienhe.index');
    }

    

      public function dangcapnhat(){

    	return view('home.dangcapnhat.index');
    }
}
