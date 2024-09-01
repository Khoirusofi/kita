<?php

namespace App\Http\Controllers\Kita;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('admins.contents.index', compact('contents'));
    }

    public function create()
    {
        return view('admins.contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title1' => 'required|string|max:1255', // Disesuaikan dengan maksimal 255 karakter
            'title2' => 'required|string|max:1255', // Disesuaikan dengan maksimal 255 karakter
            'place' => 'required|string|max:255', // Validasi untuk tempat
            'tgl' => 'required|date', // Validasi untuk tanggal
        ]);

        $content = new Content();
        $content->title1 = $request->input('title1');
        $content->title2 = $request->input('title2');
        $content->place = $request->input('place'); // Menyimpan place
        $content->tgl = $request->input('tgl'); // Menyimpan tgl

        foreach (['img1', 'img2', 'img3', 'img4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $image = $request->file($imageField);
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/content', $filename);
                $content->$imageField = $filename;
            }
        }

        $content->save();

        return redirect()->route('admins.contents.index')->with('success', 'Content created successfully.');
    }

    public function edit(Content $content)
    {
        return view('admins.contents.edit', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title1' => 'required|string|max:1255', // Disesuaikan dengan maksimal 255 karakter
            'title2' => 'required|string|max:1255', // Disesuaikan dengan maksimal 255 karakter
            'place' => 'required|string|max:255', // Validasi untuk tempat
            'tgl' => 'required|date', // Validasi untuk tanggal
        ]);

        $content->title1 = $request->input('title1');
        $content->title2 = $request->input('title2');
        $content->place = $request->input('place'); // Menyimpan place
        $content->tgl = $request->input('tgl'); // Menyimpan tgl

        foreach (['img1', 'img2', 'img3', 'img4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($content->$imageField && Storage::exists('public/content/' . $content->$imageField)) {
                    Storage::delete('public/content/' . $content->$imageField);
                }

                $image = $request->file($imageField);
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/content', $filename);
                $content->$imageField = $filename;
            }
        }

        $content->save();

        return redirect()->route('admins.contents.index')->with('success', 'Content updated successfully.');
    }

    public function destroy(Content $content)
    {
        foreach (['img1', 'img2', 'img3', 'img4'] as $imageField) {
            if ($content->$imageField && Storage::exists('public/content/' . $content->$imageField)) {
                Storage::delete('public/content/' . $content->$imageField);
            }
        }

        $content->delete();

        return redirect()->route('admins.contents.index')->with('success', 'Content deleted successfully.');
    }
}
