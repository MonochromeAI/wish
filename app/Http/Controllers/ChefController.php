<?php

namespace App\Http\Controllers;
use App\Models\Chef;

use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
{
    $chefs = Chef::all();
    return view('chef.index', compact('chefs'));
}

public function create()
{
    return view('chef.create');
}

public function store(Request $request)
{
    // Validasi input jika diperlukan

    $imagePath = $request->file('image')->store('images', 'public');

    Chef::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image' => $imagePath,
    ]);

    return redirect()->route('chef.index')->with('success', 'Chef added successfully');
}

public function edit($id)
{
    $chef = Chef::find($id);
    return view('chef.edit', compact('chef'));
}

public function update(Request $request, $id)
{
    // Validasi input jika diperlukan

    $chef = Chef::find($id);

    $chef->name = $request->input('name');
    $chef->description = $request->input('description');

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $chef->image = $imagePath;
    }

    $chef->save();

    return redirect()->route('chef.index')->with('success', 'Chef updated successfully');
}

public function destroy($id)
{
    $chef = Chef::find($id);
    $chef->delete();

    return redirect()->route('chef.index')->with('success', 'Chef deleted successfully');
}
}
