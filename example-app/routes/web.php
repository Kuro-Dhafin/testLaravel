<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home', ['title' => 'Home']);
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact', ['title' => 'Contact']);
})->name('contact');

Route::get('/program', function () {
    return view('pages.program', ['title' => 'Program']);
})->name('program');

Route::get('/team', function () {
    return view('pages.team', ['title' => 'Team']);
})->name('team');

Route::get('/about', function () {
    return view('pages.about', ['title' => 'About']);
})->name('about');

Route::prefix('info')->group(function () {
    Route::get('/about', function () {
        return view('pages.about', ['title' => 'Info About']);
    });

    Route::get('/team', function () {
        return view('pages.team', ['title' => 'Info Team']);
    });
});

Route::get('/program/{id}', function ($id) {
    return view('pages.program-detail', ['id' => $id, 'title' => 'Program Detail']);
});

Route::redirect('/contact-us', '/contact');

Route::fallback(function () {
    return response()->view('pages.404', [], 404);
});


