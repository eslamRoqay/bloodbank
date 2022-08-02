<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{

    protected $table = 'inboxes';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

}
