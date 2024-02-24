<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // sesuaikan validasi dengan kebutuhan Anda
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            Image::create([
                'name' => $request->name,
                'description' => $request->description,
                'image_path' => 'storage/images/' . $imageName
            ]);

            return redirect()->route('images')->with('success', 'Image uploaded successfully');
        }

        return back()->with('error', 'Failed to upload image');
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('images.show', compact('image'));
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // sesuaikan validasi dengan kebutuhan Anda
        ]);

        if ($request->hasFile('image')) {
            Storage::delete(str_replace('storage', 'public', $image->image_path));
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->storeAs('public/images', $imageName);
            $image->image_path = 'storage/images/' . $imageName;
        }

        $image->name = $request->name;
        $image->description = $request->description;
        $image->save();

        return redirect()->route('images')->with('success', 'Image updated successfully');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::delete(str_replace('storage', 'public', $image->image_path));
        $image->delete();

        return redirect()->route('images')->with('success', 'Image deleted successfully');
    }
}
