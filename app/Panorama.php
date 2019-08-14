<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panorama extends Model
{
  protected $guarded = [];
  protected $hidden = ['created_at','updated_at','id','tour_id'];
}
