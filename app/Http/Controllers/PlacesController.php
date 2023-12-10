<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\Common;

class PlacesController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $places = Place::latest()->get();
        return view('places', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('addPlace');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'         => 'required|string',
            'description'   => 'required|string|max:1000',
            'priceFrom'     => 'required|numeric|between:0,99.99',
            'priceTo'     => 'required|numeric|between:0,99.99',
            'image'         => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        $fileName = $this->uploadFile(file: $request->image, path: 'assets\images');
        $data['image'] = $fileName;

        Place::create($data);

        return redirect('place-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $place = Place::findORFail($id);

        return view('showPlace', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Place::where('id', $id)->delete();
        return redirect('place-index');
    }

    public function getTrashed()
    {
        $trashedPlaces = Place::onlyTrashed()->get();
        return view('trashedPlaces', compact('trashedPlaces'));
    }

    public function restore(string $id) :RedirectResponse
    {
        Place::where('id', $id)->restore();
        return redirect('place-index');
    }

    public function destroyPermanently(string $id) :RedirectResponse
    {
        Place::where('id', $id)->forceDelete();;
        return redirect('place-index');
    }
}
