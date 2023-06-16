<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index()
    {
        $users = Redis::hgetall('users');
        $users = array_map(function ($user) {
            return json_decode($user, true);
        }, $users);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            // Add validation for other fields
        ]);

        $user['id'] = uniqid(); // Generate a unique ID for the user

        Redis::hset('users', $user['id'], json_encode($user));

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = Redis::hget('users', $id);
        $user = json_decode($user, true);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = Redis::hget('users', $id);
        $user = json_decode($user, true);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // Add validation for other fields
        ]);

        $user['id'] = $id; // Preserve the ID

        Redis::hset('users', $id, json_encode($user));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        Redis::hdel('users', $id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
