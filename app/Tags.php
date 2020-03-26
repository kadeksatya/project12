<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table='tag';

    protected $fillable=[
        'tag',
    ];

    public function post()
    {
        return $this->belongsTo('App\Post','id_tag','id');
    }
}
