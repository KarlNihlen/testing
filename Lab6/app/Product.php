<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Product extends Model
{
  public function reviews(){
      return $this->hasMany('App\Review');
  }

  public function stores(){
    return $this->belongsToMany('App\Store');
  }
}
