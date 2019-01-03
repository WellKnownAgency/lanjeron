<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   $events = App\Event::take(3)->orderBy('date')->get();
   $photos = App\Photo::take(8)->latest()->get();
    return view('index')->withEvents($events)->withPhotos($photos);
});


Route::middleware('auth:web')->group(function () {
  Route::get('/admin', function () {
    $events = App\Event::take(3)->orderBy('date')->get();
    $photos = App\Photo::take(8)->latest()->get();
     return view('admin.index')->withEvents($events)->withPhotos($photos);
  });
  Route::resource('/admin/events', 'EventController');
  Route::resource('/admin/photos', 'PhotoController');
  Route::resource('/admin/menus', 'MenuController');
  Route::resource('/admin/items', 'ItemController');
  Route::get('/admin/events/{id}/delete', ['uses' => 'EventController@destroy', 'as' => 'event.delete']);
  Route::get('/admin/photos/{id}/delete', ['uses' => 'PhotoController@destroy', 'as' => 'photo.delete']);
  Route::get('/admin/menus/{id}/delete', ['uses' => 'MenuController@destroy', 'as' => 'menu.delete']);
  Route::get('/admin/items/{id}/delete', ['uses' => 'ItemController@destroy', 'as' => 'item.delete']);
});
Auth::routes();
