<?php

use App\Link;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;
use WhichBrowser\Data\Parser;

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
    return view('welcome', ['user_links' => Link::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get()]);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/short', 'LinkController@short')->name('short')->middleware('auth');
Route::get('/go/{id}', 'LinkController@redirect');

Route::get('/detect', function () {
    // dd(request()->ip());
    $raw_data = Location::get();
    var_dump($raw_data);
    $location_data = json_decode($raw_data, true);
    dd($location_data);
});
