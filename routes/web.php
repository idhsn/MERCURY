<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('groups', GroupController::class);

Route::get('contacts/search', [ContactController::class, 'search'])->name('contacts.search');
Route::resource('contacts', ContactController::class);

