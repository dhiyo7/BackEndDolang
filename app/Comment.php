<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $hidden = ['id','user_id','tour_id','updated_at'];
    protected $dates = ['created_at'];

    public function user(){
      return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
