<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MemberController;
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


Route::get('/home', [MemberController::class, 'index']);
Route::get('/card', [CardController::class,'index']);
Route::get('/item', [ItemController::class,'index']);

// Route::get('/about', function () {
//     return view('about');
// });

Route::view('/about', 'about', [
    'name' => 'arthur'
]);


Route::prefix('anggota')->group(function () {
    Route::view('/about', 'about', [
        'title' => 'This will be the title',
        'name' => 'arthur'
    ]);
});


Route::redirect('/contact', '/about', 301);

Route::get('/user/{id}', function ($id) {
    return view('user', ['id' => $id]);
})->where('id', '[0-9]+');
