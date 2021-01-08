<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaivanban extends Model
{
    //
     
	protected $table ="loaivanban";
	public $timestamps = false;
	  public function vanban(){
    	return $this->hasManey('App\vanban','id_loaivanban','id');
    }



}



