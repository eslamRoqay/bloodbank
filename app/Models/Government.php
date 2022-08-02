<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Government extends Model
{

    protected $table = 'governments';
    public $timestamps = true;

    public function cites()
    {
        return $this->hasMany('City');
    }

    public function government()
    {
        return $this->belongsTo('Government');
    }

}
