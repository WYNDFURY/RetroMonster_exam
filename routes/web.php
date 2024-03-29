<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\SearchController;
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

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/filter', [SearchController::class, 'filter'])->name('filter');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/rate', [MonsterController::class, 'rate'])->middleware('auth')->name('monsters.rate');

Route::get('/storage/{extra}', function ($extra) {
    return redirect("/public/storage/$extra");
})->where('extra', '.*');

// USERS Related routes
Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/users/{user}/{slug}', function (\App\Models\User $user) {
    return view('users.show', compact('user'));
})->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('/my-deck', function () {
        return view('users.my-deck');
    })->name('users.my-deck');

    Route::post('/add-favorite', [ProfileController::class, 'addFavorite'])->name('users.add-favorite');
    Route::delete('/remove-favorite', [ProfileController::class, 'removeFavorite'])->name('users.remove-favorite');

    Route::get('/my-cards', function () {
        return view('users.my-cards');
    })->name('users.my-cards');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// CRUD MONSTERS

Route::get('/monsters', function () {
    return view('monsters.index');
})->name('monsters.index');

Route::get('/monsters/{monster}/{slug}', function (\App\Models\Monster $monster) {
    return view('monsters.show', compact('monster'));
})->name('monsters.show');


Route::middleware('auth')->group(function () {

    Route::get('/monsters/add', function () {
        return view('monsters._add');
    })->name('monsters.add');


    Route::get('/monsters/{monster}/{slug}/edit', function (\App\Models\Monster $monster) {
        return view('monsters._edit', compact('monster'));
    })->name('monsters.edit');

    Route::post('/monsters', [MonsterController::class, 'store'])->name('monsters.store');
    Route::patch('/monsters', [MonsterController::class, 'update'])->name('monsters.update');
    Route::delete('/monsters/{monster}', [MonsterController::class, 'destroy'])->name('monsters.destroy');
});


// FALLBACK
Route::fallback(function () {
    return redirect()->route('pages.home');
});


require __DIR__ . '/auth.php';
