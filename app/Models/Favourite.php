<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{

    protected $table = 'favourite';
    public $timestamps = true;

    public function users()
    {
        return $this->hasMany('User');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

}
