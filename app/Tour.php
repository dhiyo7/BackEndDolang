<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];

    // public function comments(){
    //   return $this->hasMany(Comment::class);
    // }
}
