<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MonsterController;
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

// MISC

Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// CRUD USERS

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/users/{user}/{slug}', function(\App\Models\User $user){
    return view('users.show', compact('user'));
})->name('users.show');

Route::get('/my-deck', function () {
    return view('users.my-deck');
})->name('users.my-deck');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// CRUD MONSTERS

Route::get('/monsters', function () {
    return view('monsters.index');
})->name('monsters.index');

Route::get('/monsters/{monster}/{slug}', function(\App\Models\Monster $monster){
    return view('monsters.show', compact('monster'));
})->name('monsters.show');

Route::get('/monsters/add', function () {
    return view('monsters.add');
})->name('monsters.add');

Route::post('/monsters', [MonsterController::class, 'store'])->name('monsters.store');




require __DIR__.'/auth.php';
