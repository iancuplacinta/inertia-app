<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::inertia('/', 'Home', [
        'username' => 'iplacinta',
    ])->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::inertia('/users/create', 'Users/Create')->can('create', User::class)->name('users.create');

    Route::post('/users', function() {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    });

    Route::inertia('/user-settings', 'Settings')->name('user-settings');
});

Route::post('/user-logout', function () {
    dd('Logging the user out');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
