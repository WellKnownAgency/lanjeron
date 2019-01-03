<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  // RELATIONS

  public function menus()
  {
    return $this->belongsToMany('App\Menu');
  }

}
