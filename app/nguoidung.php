<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nguoidung extends Authenticatable
{
     protected $table ="nguoidung";

    use Notifiable;
    protected $fillable = [
        'nd_tendangnhap', 'nd_matkhau', 'password',
    ];
    protected $hidden = [
        'nd_matkhau', 'remember_token',
    ];
}