<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\UserController;
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
    return view('accueil');
})->name('accueil');



Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');




Route::post('oeuvre/commentaire/valide', [CommentaireController::class, 'valide']) ->name('commentaire.valide');


Route::resource('salle',\App\Http\Controllers\SalleController::class);


Route::resource('commentaire', \App\Http\Controllers\CommentaireController::class);


Route::resource('oeuvre', \App\Http\Controllers\OeuvreController::class);

Route::resource('user', \App\Http\Controllers\UserController::class);

Route::post('/user/{id}/upload', [UserController::class, 'upload'])->name('user.upload');

