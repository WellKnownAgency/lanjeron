<?php

namespace App\Http\Controllers;

use App\Event;
use Image;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function index()
  {
    $events = Event::orderBy('id')->paginate(10);
    return view('admin.events.index')->withEvents($events);
  }

  public function indexMain()
  {
    $events = Event::latest()->limit(3)->get();
    return view('index')->withPosts($events);
  }

  public function create()
  {
    return view('admin.events.create');
  }

  public function store(Request $request)
  {
    // validate the data
   $this->validate($request, array(
           'title'         => 'required|max:255',
           'dscr'          => 'required|max:255'
       ));
   // store in the database
   $event = new Event;
   $event->title = $request->title;
   $event->date = $request->date;
   $event->dscr = $request->dscr;

   if ($request->hasFile('img')) {
     $image = $request->file('img');
     $filename = time() . '.' . $image->getClientOriginalExtension();
     $location = public_path('images/events/' . $filename);
     Image::make($image)->resize(500, 500)->save($location);
     $event->image = $filename;
   }


   $event->save();

    return redirect()->route('events.index');
  }


  public function destroy($id)
  {
    $event = Event::findOrFail($id);
    $event->delete();
    return redirect('/admin/events');
  }

  public function getSingle($slug) {
    $event = Event::where('slug', '=', $slug)->first();
    $events = Event::latest()->limit(5)->get();
    return view('events.index')->withEvent($event)->withEvents($events);
  }


}
