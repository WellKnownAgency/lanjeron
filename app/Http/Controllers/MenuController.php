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

  public function edit($id)
  {
      $menu = Menu::with('items')->where('id', $id)->first();;
      $items = Item::all();

      $items->transform(function ($item, $key) use ($menu){
          foreach ($menu->items as $mitem) {
              if ($item->id === $mitem->id) {
                  $item['checked'] = true;
                  return $item;
              }
          }
          return $item;
      });


      return view('admin.menus.edit')->withMenu($menu)->withItems($items);
  }

  public function update(Request $request, $id)
  {
    // validate the data
   $this->validate($request, array(
           'name'         => 'required|max:255'
       ));
   // store in the database
   $menu = Menu::find($id);
   $menu->name = $request->input('name');

   $menu->save();

   if ($request->input('items')) {
        $menu->items()->sync($request->items);
    } else {
        $menu->items()->sync(array());
    }

   return redirect()->route('menus.index');
}

}
