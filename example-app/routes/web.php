<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Welcome to the Home Page. Lorem ipsum dolor sit amet.';
})->name('home');

Route::get('/contact', function () {
    return 'Contact Us Page. Lorem ipsum dolor sit amet.';
})->name('contact');

Route::get('/program', function () {
    return 'Our Program Page. Lorem ipsum dolor sit amet.';
})->name('program');

Route::get('/team', function () {
    return 'Meet Our Team. Lorem ipsum dolor sit amet.';
})->name('team');

Route::get('/about', function () {
    return 'About Us Page. Lorem ipsum dolor sit amet.';
})->name('about');

Route::prefix('info')->group(function () {
    Route::get('/about', function () {
        return 'Grouped Route: About Us. Lorem ipsum.';
    });

    Route::get('/team', function () {
        return 'Grouped Route: Our Team. Lorem ipsum.';
    });
});

Route::get('/program/{id}', function ($id) {
    return "Program Detail for ID: $id. Lorem ipsum dolor sit amet.";
});

Route::redirect('/contact-us', '/contact');

//Justincase
Route::fallback(function () {
    return response('Page not found. Please check the URL.', 404);
});

