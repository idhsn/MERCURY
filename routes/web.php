<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('groups', GroupController::class);

Route::get('contacts/search', [ContactController::class, 'search'])->name('contacts.search');
Route::get('contacts/group/{group}', [ContactController::class, 'filterByGroup'])->name('contacts.filter');
Route::resource('contacts', ContactController::class);

