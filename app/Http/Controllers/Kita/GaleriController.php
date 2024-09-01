<?php

namespace App\Http\Controllers\Kita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return view('admins.galeris.index', compact('galeris'));
    }

    public function create()
    {
        return view('admins.galeris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $galeri = new Galeri();
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/galeri', $filename);
            $galeri->img = $filename;
        }

        $galeri->save();

        return redirect()->route('admins.galeris.index')->with('success', 'Galeri created successfully.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admins.galeris.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('img')) {
            if ($galeri->img && Storage::exists('public/galeri/' . $galeri->img)) {
                Storage::delete('public/galeri/' . $galeri->img);
            }

            $image = $request->file('img');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/galeri', $filename);
            $galeri->img = $filename;
        }

        $galeri->save();

        return redirect()->route('admins.galeris.index')->with('success', 'Galeri updated successfully.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->img && Storage::exists('public/galeri/' . $galeri->img)) {
            Storage::delete('public/galeri/' . $galeri->img);
        }

        $galeri->delete();

        return redirect()->route('admins.galeris.index')->with('success', 'Galeri deleted successfully.');
    }
}
