<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');

Route::get('/monsters', function () {
    return view('monsters.index');
})->name('monsters.index');

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/monsters/{monster}/{slug}', function (\App\Models\Monster $monster) {
    return view('monsters.show', compact('monster'));
})->name('monsters.show');

Route::get('/users/{user}/{slug}', function(\App\Models\User $user){
    return view('users.show', compact('user'));
})->name('users.show');

// Route::get('/authors', function () {
//     return view('authors.index');
// })->name('authors.index');

// Route::get('/authors/{author}/{slug}', function (\App\Models\Author $author) {
//     return view('authors.show', compact('author'));
// })->name('authors.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// require __DIR__ . '/auth.php';