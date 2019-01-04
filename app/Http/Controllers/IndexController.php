<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Photo;
use App\Menu;
use App\Item;

class IndexController extends Controller
{
    public function index()
    {
      $events = Event::take(3)->orderBy('date')->get();
      $photos = Photo::take(8)->latest()->get();
      $menus = Menu::with('items')->orderBy('created_at', 'ASC')->get();

      return view('index',  compact('menus'), compact('items'))->withEvents($events)->withPhotos($photos);
    }
}
