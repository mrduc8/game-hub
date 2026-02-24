<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('features.auth.pages.login');
});

Route::get('/login', function () {
    return view('features.auth.pages.login');
})->name('auth.login.form');

Route::post('/login', function () {
    // tạm thời để test UI, chưa xử lý login thật
    return back()->withErrors(['email' => 'Login handler chưa được implement.']);
})->name('auth.login');

Route::get('/oauth/{provider}/redirect', function (string $provider) {
    abort(501, "OAuth redirect for {$provider} chưa implement.");
})->whereIn('provider', ['google', 'facebook', 'apple'])
    ->name('auth.oauth.redirect');
