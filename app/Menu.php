<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  public function items()
    {
      return $this->belongsToMany('App\Item');
    }
}
