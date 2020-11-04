<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*
Route::get('kisiselBilgiler','KisiselBilgiler\KisiselBilgilerController@kisiselBilgiler');
Route::post('kisiselBilgiler','KisiselBilgiler\KisiselBilgilerController@kisiselBilgilerAdd');
*/


Route::get('admin/{id}','Admin\AdminController@adminById');



Route::post('login', 'UserController@login');

Route::apiResource('kisiselBilgiler','KisiselBilgiler\KisiselBilgiler');



//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------


/*Route::get('details/{id}','Details\DetailsController@getDetails' );
Route::get('passportDetails/{id}','Details\DetailsController@getPassportDetails' );
Route::get('Download/{belgeTur}/{id}','Details\DetailsController@getBelgeDetails' );
Route::get('belgeDetails/{id}','Details\DetailsController@getBelgeDetails2' );
Route::get('admin','Admin\AdminController@admin');*/
Route::get('Download/{belgeTur}/{id}','Details\DetailsController@getBelgeDetails' );
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

Route::group(['middleware' => 'auth:api'], function () {
   // Route::apiResource('kisiselBilgiler','KisiselBilgiler\KisiselBilgiler')/*->middleware('roles:1|2')*/;
  // Route::get('admin','Admin\AdminController@admin');
   Route::post('register', 'UserController@register')->middleware('roles:1');
   Route::get('details/{id}','Details\DetailsController@getDetails' );
Route::get('passportDetails/{id}','Details\DetailsController@getPassportDetails' );

Route::get('belgeDetails/{id}','Details\DetailsController@getBelgeDetails2' );
Route::get('admin','Admin\AdminController@admin');
});

//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------