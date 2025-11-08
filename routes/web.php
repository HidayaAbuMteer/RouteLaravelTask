<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return "Hello, World!";
});

Route::get('yourName/{name}', function ($name) {
    return "Hello, " . " " . $name . "!";
});

Route::get('yourAge/{age?}', function ($age) {
    return "You are " . " " . $age . " years old.";
});



Route::get('welcome', [WelcomeController::class, 'index']);

Route::get('/named', function () {
    return "This is the named route.";
})->name('named.route');

// Route::get('/redirect-named', function () {
//     return redirect()->route('named.route');
// });

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return "Admin Dashboard";
    });
});

Route::get('users/{id}', function ($id) {
    return "User ID: " . " " . $id;
})->where('id', '[0-9]+');

Route::fallback(function () {
    return "Page not found.";
});

Route::resource('posts', PostController::class);

Route::get('multipleParameter/{category}/{id}', function ($category, $id) {
    return "Category: " . " " . $category . ", ID: " . " " . $id;
});

Route::get('blog/{page?}', function ($page = "1") {
    return  "Viewing page" . " " . $page;
});

Route::redirect('/home', '/welcome');

Route::get('/welcomeView', function () {
    return view('welcome');
});
