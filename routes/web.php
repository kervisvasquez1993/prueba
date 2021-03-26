<?php
namespace App;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationsController;

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
    return view('welcome');
});
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::resource('users', 'UserController');

Route::post('/selectState', 'UserController@selectState')->name('selectState');
Route::post('/selectCities', 'UserController@selectCities')->name('selectCities');


Route::any('searchProduct', function () {
    
    // get user query
    $q = Request::get('q');
    
    // get the products
    $users = User::where('name', 'LIKE', '%' .$q. '%')
    ->orWhere('email', 'LIKE', '%' .$q. '%')
    ->orWhere('identify_card', 'LIKE', '%' .$q. '%')
    ->orWhere('phone', 'LIKE', '%' .$q. '%')
    ->paginate(15);
    $fecha_actual = Carbon::now();
    
    // Render the view
    return view('users.search', compact('q', 'users', 'fecha_actual'));
    
})->name('producto.search');



/* notificaciones o mensaje */
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/messages', 'HomeController@store')->name('messages.store');
Route::get('/messages/{id}', 'HomeController@show')->name('messages.show');
Route::get('/notificaciones', 'NotificationsController@index')->name('notifications.index');
Route::patch('notifications/{id}', 'NotificationsController@read')->name('notifications.read');
Route::delete('notifications/{id}', 'NotificationsController@destroy')->name('notifications.destroy');