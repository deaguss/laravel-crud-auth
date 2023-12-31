<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\AuthController;
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
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authentication'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');



Route::get('/home', [MemberController::class, 'index'])->middleware('auth');
Route::get('/card', [CardController::class,'index'])->middleware('auth');
Route::get('/item', [ItemController::class,'index'])->middleware('auth');
Route::get('/trainer', [TrainerController::class,'index'])->middleware('auth');
Route::get('/home/{id}', [MemberController::class,'getId'])->middleware('auth');

Route::get('/add-member', [MemberController::class,'create'])->middleware(['auth', 'admin']);
Route::get('/soft-delete-member', [MemberController::class,'softDelete'])->middleware(['auth', 'admin']);
Route::get('/edit-member/{id}', [MemberController::class,'edit'])->middleware(['auth', 'admin']);
Route::get('/member/{id}/restore', [MemberController::class,'restore'])->middleware(['auth', 'admin']);

Route::post('/member', [MemberController::class,'store'])->middleware(['auth', 'admin']);
Route::put('/member/{id}', [MemberController::class,'update'])->middleware(['auth', 'admin']);
Route::delete('/member/{id}', [MemberController::class,'destroy'])->middleware(['auth', 'admin']);



// Route::get('/about', function () {
//     return view('about');
// });

Route::view('/about', 'about', [
    'name' => 'arthur'
])->middleware('auth');


Route::prefix('anggota')->group(function () {
    Route::view('/about', 'about', [
        'title' => 'This will be the title',
        'name' => 'arthur'
    ]);
})->middleware('auth');


Route::redirect('/contact', '/about', 301);

Route::get('/user/{id}', function ($id) {
    return view('user', ['id' => $id]);
})->where('id', '[0-9]+')->middleware('auth');
