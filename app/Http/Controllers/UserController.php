<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        return User::create($data);
    }

    public function show(int $userId)
    {
        return User::findOrFail($userId);
    }

    public function update(Request $request, int $userId)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::findOrFail($userId);
        return $user->update($data);
    }

    public function destroy(int $userId)
    {
        $user = User::findOrFail($userId);
        return $user->delete();
    }
}
