<?php

namespace App\Http\Controllers\Kita;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('admins.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admins.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img4' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img5' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'title3' => 'required|string|max:255',
        ]);

        $carousel = new Carousel();
        $carousel->title1 = $request->input('title1');
        $carousel->title2 = $request->input('title2');
        $carousel->title3 = $request->input('title3');

        foreach (['img1', 'img2', 'img3', 'img4', 'img5'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $image = $request->file($imageField);
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/img', $filename);
                $carousel->$imageField = $filename;
            }
        }

        $carousel->save();

        return redirect()->route('admins.carousel.index')->with('success', 'Carousel created successfully.');
    }

    public function edit(Carousel $carousel)
    {
        return view('admins.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'title3' => 'required|string|max:255',
        ]);

        $carousel->title1 = $request->input('title1');
        $carousel->title2 = $request->input('title2');
        $carousel->title3 = $request->input('title3');

        foreach (['img1', 'img2', 'img3', 'img4', 'img5'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($carousel->$imageField && Storage::exists('public/img/' . $carousel->$imageField)) {
                    Storage::delete('public/img/' . $carousel->$imageField);
                }

                $image = $request->file($imageField);
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/img', $filename);
                $carousel->$imageField = $filename;
            }
        }

        $carousel->save();

        return redirect()->route('admins.carousel.index')->with('success', 'Carousel updated successfully.');
    }

    public function destroy(Carousel $carousel)
    {
        foreach (['img1', 'img2', 'img3', 'img4', 'img5'] as $imageField) {
            if ($carousel->$imageField && Storage::exists('public/img/' . $carousel->$imageField)) {
                Storage::delete('public/img/' . $carousel->$imageField);
            }
        }

        $carousel->delete();

        return redirect()->route('admins.carousel.index')->with('success', 'Carousel deleted successfully.');
    }
}
