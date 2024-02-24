<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('users.index', compact('users'));
}

public function edit($id)
{
    $user = User::find($id);
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::find($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->role = $request->input('role');
    // tambahkan kolom lain sesuai kebutuhan

    $user->save();

    return redirect('/user')->with('success', 'User berhasil diperbarui');
}

}
