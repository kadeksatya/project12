<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='post';

    protected $fillable=[
        'title',
        'diskripsi',
        'gambar',
        'id_tag',
        'id_label',
        'id_user'
    ];

    public function getFileAttribute($gambar) {
        return $this->uploads . $gambar ;
    }


    public function tag()
    {
        return $this->hasMany('App\Tags','id','id_tag');
    }

  public function label()
  {
      return $this->hasMany('App\Label', 'id', 'id_label');
  }
  public function user()
  {
      return $this->hasMany('App\User', 'id', 'id_user');
  }
}
