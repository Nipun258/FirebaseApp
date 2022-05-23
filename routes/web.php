<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\ContactController;

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

Route::get('contacts',[ContactController::class, 'index'])->name('contact.index');

Route::get('contact/add',[ContactController::class, 'addContact'])->name('contact.add');

Route::post('contact/store',[ContactController::class, 'storeContact'])->name('contact.store');

Route::get('/contact/edit/{id}',[ContactController::class, 'editContact'])->name('contact.edit');

Route::post('contact/update/{id}',[ContactController::class, 'updateContact'])->name('contact.update');

Route::get('/contact/delete/{id}',[ContactController::class, 'deleteContact'])->name('contact.delete');

Route::get('/', function () {
    return view('welcome');
});
