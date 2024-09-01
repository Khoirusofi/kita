<?php

namespace App\Http\Controllers\Kita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Musik;
use Illuminate\Support\Facades\Storage;

class MusikController extends Controller
{
    public function index()
    {
        $musiks = Musik::all();
        return view('admins.musiks.index', compact('musiks'));
    }

    public function create()
    {
        return view('admins.musiks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'nullable|file|max:10240', // Hanya membatasi ukuran file
            'title' => 'required|string|max:255',
            'artist' => 'nullable|string|max:255',
        ]);


        $musik = new Musik();
        $musik->title = $request->title;
        $musik->artist = $request->artist;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/musik', $filename);
            $musik->file_path = $filename;
        }

        $musik->save();

        return redirect()->route('admins.musiks.index')->with('success', 'Musik created successfully.');
    }

    public function edit(Musik $musik)
    {
        return view('admins.musiks.edit', compact('musik'));
    }

    public function update(Request $request, Musik $musik)
    {
        $request->validate([
            'file' => 'nullable|file|max:10240', // Hanya membatasi ukuran file
            'title' => 'required|string|max:255',
            'artist' => 'nullable|string|max:255',
        ]);



        $musik->title = $request->title;
        $musik->artist = $request->artist;

        if ($request->hasFile('file')) {
            if ($musik->file_path && Storage::exists('public/musik/' . $musik->file_path)) {
                Storage::delete('public/musik/' . $musik->file_path);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/musik', $filename);
            $musik->file_path = $filename;
        }

        $musik->save();

        return redirect()->route('admins.musiks.index')->with('success', 'Musik updated successfully.');
    }

    public function destroy(Musik $musik)
    {
        if ($musik->file_path && Storage::exists('public/musik/' . $musik->file_path)) {
            Storage::delete('public/musik/' . $musik->file_path);
        }

        $musik->delete();

        return redirect()->route('admins.musiks.index')->with('success', 'Musik deleted successfully.');
    }
}
