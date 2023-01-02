<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $timestamps = true;

    protected $table = 'reservations';


    public function movie()
    {
        return $this->belongsTo('App\Models\Movie', 'movie_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
