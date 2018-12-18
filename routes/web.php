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
   $events = App\Event::latest()->paginate(3);
    return view('index')->withEvents($events);
});


Route::middleware('auth:web')->group(function () {
  Route::resource('/admin/events', 'EventController');
  Route::get('/admin/events/{id}/delete', ['uses' => 'EventController@destroy', 'as' => 'event.delete']);
});
Auth::routes();
