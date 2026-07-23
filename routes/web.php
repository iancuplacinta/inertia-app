<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home', [
    'username' => 'iplacinta',
])->name('home');

Route::inertia('/users', 'Users', [
    'users' => User::query()
        ->when(Request::input('search'), function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
        ]),
    'filters' => Request::only(['search'])
])->name('users');
Route::inertia('/user-settings', 'Settings')->name('user-settings');

Route::post('/user-logout', function () {
    dd('Logging the user out');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
