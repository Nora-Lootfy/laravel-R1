<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;
class CarsController extends Controller
{
    use Common;
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
        $categories = Category::select('id', 'category_name')->get();
        return view('addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
//        $car = new Car();
//
//        $car->title = $request->title;
//        $car->description = $request->description;
//        $car->published = (isset($request->published))? true: false;
//        $car->price = $request->price;
//        $car->save();

//        $request->validate([
//            'title'         => 'required|string|max:10',
//            'description'   => 'required|string|max:200'
//        ]);
//
//        $data = $request->only($this->columns);
//        $data['published'] = isset($data['published'])? true:false;
//
//        Car::create($data);

        $messages = [
            'title.required'        => __('addCar.titleRequiredMsg'),
            'description.required'  => __('addCar.descriptionRequiredMsg'),
            'description.max'       => __('addCar.descriptionMaxMsg'),
            'price.required'        => __('addCar.priceRequiredMsg'),
            'price.numeric'         => __('addCar.priceNumericMsg'),
            'image.require'         => __('addCar.imageRequiredMsg'),
            'image.mimes'           => __('addCar.imageMimesMsg'),
            'image.max'             => __('addCar.imageSizeMsg'),
            'category_id.required'  => __('addCar.categoryRequiredMsg'),
        ];

        $data = $request->validate([
            'title'         => 'required|string',
            'description'   => 'required|string|max:500',
            'price'         => 'required|numeric|between:0,9999999999.99',
            'image'         => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id'   => 'required'
        ], $messages);

        $fileName = $this->uploadFile(file: $request->image, path: 'assets\images');
        $data['image'] = $fileName;

        $data['published'] = isset($request['published']);

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
        $categories = Category::select('id', 'category_name')->get();

        return view('editCar', compact(['car', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title'         => 'required|string',
            'description'   => 'required|string|max:500',
            'price'         => 'required|numeric|between:0,9999999999.99',
            'image'         => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id'   => 'required'
        ]);

        if(is_null($request->image)) {
            $data['image'] = $request['oldImage'];
        } else {
            $data['image'] = $this->uploadFile(file: $request->image, path: 'assets\images');
        }

        $data['published'] = isset($request['published']);

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
