<?php

use Illuminate\Http\Request;
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
Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', function (Request $request) {

        return [
            //fait un lien faire la page avec des params dynamic
            'link' => \route('blog.show', ['slug' => 'article', 'id' => 13])
        ];
    })->name('index');

    /*Nom pour chaque route et ce que chaque params signifie*/
    Route::get('/{slug}-{id}', function (string $slug, string $id) {
        return [
            'slug' => $slug,
            'id' => $id
        ];
    })->where(
        [
            'id' => '[0-9]+',
            'slug' => '[0-z0-9\-]+'
        ]
    )->name('show');

});
