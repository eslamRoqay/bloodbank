<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{

    protected $table = 'users_posts';
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
