<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'kd_menu' => 'required|unique:menus',
        ]);

        $menu = new Menu([
            'kd_menu' => $request->get('kd_menu'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'harga' => $request->get('harga'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $menu->image = 'images/' . $imageName;
        }

        $menu->save();
        

        return redirect()->route('menu.index')->with('success', 'Menu created successfully');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'harga' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kd_menu' => 'required|unique:menus,kd_menu,' . $menu->id,
        ]);

        $menu->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'harga' => $request->get('harga'),
            'kd_menu' => $request->get('kd_menu'),
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($menu->image) {
                Storage::delete('public/' . $menu->image);
            }

            // Simpan gambar yang baru
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $menu->image = 'images/' . $imageName;
        }

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully');
    }

    // Tambahkan method untuk edit dan update

    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::delete('public/' . $menu->image);
        }

        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
    }
}
