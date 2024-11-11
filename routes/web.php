<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return "trang chủ";
// });

Route::get('/',[HomeController::class,'index'])->name('book.home');
Route::get('/create',[HomeController::class,'create'])->name('book.create');
Route::post('/create',[HomeController::class,'store'])->name('book.store');
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('book.edit');
Route::put('/edit/{id}',[HomeController::class,'update'])->name('book.update');
Route::delete('/delete/{id}',[HomeController::class,'destroy'])->name('book.destroy');

Route::get('book/{id}/detail/',[HomeController::class,'show'])->name('book.show');
Route::get('category/{id}/detail/',[HomeController::class,'category'])->name('category.show');
