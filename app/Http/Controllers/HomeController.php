<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Models\Menu;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{
    public function index()
    {
        $images = Image::all();
        $menus = Menu::all();
        $chefs = Chef::all();
        if (Auth::check()) {
            // Pengguna masih login, ambil data user
            $user = Auth::user();
            $name = $user->name;
            $email = $user->email;
        } else {
            // Jika pengguna sudah logout, atur nilai default untuk name dan email
            $name = null;
            $email = null;
        }
        return view('home', compact('name', 'email', 'images','menus','chefs'));
    }

    
}
