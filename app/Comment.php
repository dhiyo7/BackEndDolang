<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $hidden = ['id','user_id','tour_id','created_at','updated_at'];
}
