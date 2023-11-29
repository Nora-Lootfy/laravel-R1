<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Car;
class CarsController extends Controller
{
    private $columns = [
        'title',
        'description',
        'published',
        'price'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $car = new Car();
//
//        $car->title = $request->title;
//        $car->description = $request->description;
//        $car->published = (isset($request->published))? true: false;
//        $car->price = $request->price;
//        $car->save();

        $request->validate([
            'title'         => 'required|string|max:10',
            'description'   => 'required|string|max:200'
        ]);

        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true:false;

        Car::create($data);

        return redirect('car-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findORFail($id);

        return view('showCar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findORFail($id);

        return view('editCar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true:false;

        Car::where('id', $id)->update($data);

        return redirect('car-index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        Car::where('id', $id)->delete();
        return redirect('car-index');
    }

    public function getTrashed()
    {
        $trashed_cars = Car::onlyTrashed()->get();
        return view('trashedCars', compact('trashed_cars'));
    }

    public function restore(string $id) :RedirectResponse
    {
        Car::where('id', $id)->restore();
        return redirect('car-index');
    }

    public function destroyPermanently(string $id) :RedirectResponse
    {
        Car::where('id', $id)->forceDelete();;
        return redirect('car-index');
    }

}
