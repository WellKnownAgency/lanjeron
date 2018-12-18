<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Image;
class PhotoController extends Controller
{
  public function index()
  {
    $photos = Photo::orderBy('id')->paginate(10);
    return view('admin.photos.index')->withPhotos($photos);
  }

  public function create()
  {
    return view('admin.photos.create');
  }

  public function store(Request $request)
  {
    // validate the data
   $this->validate($request, array(
           'title'         => 'required|max:50',
       ));
   // store in the database
   $photo = new Photo;
   $photo->title = $request->title;

   if ($request->hasFile('img')) {
     $image = $request->file('img');
     $filename = time() . '.' . $image->getClientOriginalExtension();
     $location = public_path('images/gallery/' . $filename);
     Image::make($image)->resize(1000, 1000)->save($location);
     $photo->image = $filename;
   }


   $photo->save();

    return redirect()->route('photos.index');
  }


  public function destroy($id)
  {
    $photo = photo::findOrFail($id);
    $photo->delete();
    return redirect('/admin/photos');
  }


}
