<?php

use App\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

