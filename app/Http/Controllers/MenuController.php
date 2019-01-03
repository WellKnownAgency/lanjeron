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
      return view('admin.menus.create');
  }

  public function store(Request $request)
  {
    // validate the data
   $this->validate($request, array(
           'name'         => 'required|max:255',
           'slug'          => 'required|alpha_dash|min:5|max:255|unique:menus,slug',
       ));
   // store in the database
   $menu = new Menu;
   $menu->name = $request->name;
   $menu->slug = $request->slug;

   $menu->save();

   session()->put('success','Item Deleted Successfully from Your Cart ');
   return redirect()->route('menus.index');
  }
}
