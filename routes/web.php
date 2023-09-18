<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Nommé et donné un prefix
Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    /*Nom pour chaque route et ce que chaque params signifie*/
    Route::get('/{slug}-{id}', 'show')->where(
        [
            'id' => '[0-9]+',
            'slug' => '[0-z0-9\-]+'
        ]
    )->name('show');

});
