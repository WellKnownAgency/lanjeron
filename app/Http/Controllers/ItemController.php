<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Menu;
use Image;
class ItemController extends Controller
{
  public function index()
  {
    $items = Item::orderBy('id')->get();
    return view('admin.items.index')->withItems($items);
  }


  public function create()
  {
      $menus = Menu::all();
      return view('admin.items.create' , compact('menus'));
  }

  public function store(Request $request)
  {

        // validate the data
       $this->validate($request, array(
               'name'         => 'required|max:255',
               'image'          => 'required|file',
          ));

       // store in the database
       $item = new Item;
       $item->name = $request->name;
       $item->type = $request->type;
       if ($request->hasFile('image')) {
         $image = $request->file('image');
         $filename = time() . $image->getClientOriginalName();
         $location = public_path('images/menu/' . $filename);
         Image::make($image)->resize(560, 560)->save($location);
         $item->image = $filename;
       }
       $item->save();

       return redirect()->route('items.index');
     }
}
