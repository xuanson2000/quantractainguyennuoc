<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vanban extends Model
{
    //
    
	protected $table = "vanban";
	public $timestamps = false;
	
	public function loaivanban(){
		return $this->belongsTo('App\loaivanban','id_loaivanban','id');
	}
}

