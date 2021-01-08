<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiverBasin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'river_basin';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'gid';

}
