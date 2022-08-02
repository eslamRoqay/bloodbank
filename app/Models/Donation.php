<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{

    protected $table = 'donations';
    public $timestamps = true;

    public function government()
    {
        return $this->belongsTo('Government');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function blood()
    {
        return $this->belongsTo('Blood');
    }

}
