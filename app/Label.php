<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table ='label';

    protected $fillable = [
        'label'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post','id_label','id');
    }
}
