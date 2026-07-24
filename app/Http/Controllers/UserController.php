<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Users/Index', [
            'users' => UserResource::collection(
                User::query()
                    ->when($request->input('search'), function ($query, $search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->paginate(10)
                    ->withQueryString()),
            'filters' => $request->only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class),
            ],
        ]);
    }

    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            'user' => UserResource::make($user),
        ]);
    }
}
