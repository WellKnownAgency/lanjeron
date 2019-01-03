<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Menu;
class MenuController extends Controller
{
  public function index()
  {
    $menus = Menu::orderBy('id')->get();
    return view('admin.menus.index')->withMenus($menus);
  }


  public function create()
  {
      $items = Item::get();
      return view('admin.menus.create')->withItems($items);
  }

  public function store(Request $request)
  {
    // validate the data
   $this->validate($request, array(
           'name'         => 'required|max:255|unique:menus,name'
       ));
   // store in the database
   $menu = new Menu;
   $menu->name = $request->name;

   $menu->save();

   $menu->items()->sync($request->items, false);

   return redirect()->route('menus.index');
  }
}
