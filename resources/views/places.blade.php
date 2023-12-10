@extends('layouts.blog')

@section('content')

    <div class="container">
        <div class="row" style="text-align: center; font-weight: bold">
            <div class="col-md-1" style="color: #ff555b">
                Title
            </div>
            <div class="col-md-4" style="color: #ff555b">
                Description
            </div>
            <div class="col-md-2" style="color: #ff555b">
                Price
            </div>
            <div class="col-md-2" style="color: #ff555b">
                Published At
            </div>
            <div class="col-md-1" style="color: #ff555b">
                Show
            </div>
            <div class="col-md-1" style="color: #ff555b">
                Edit
            </div>
            <div class="col-md-1" style="color: #ff555b">
                Delete
            </div>
        </div>
        @foreach($places as $place)
            <hr >
            <div class="row">
                <div class="col-md-1">
                    {{$place->title}}
                </div>
                <div class="col-md-4">
                    {{$place->description}}
                </div>

                <div class="col-md-2">
                    from {{$place->priceFrom}}$ to {{$place->priceTo}}$
                </div>
                <div class="col-md-2">
                    {{$place->created_at}}
                </div>
                <div class="col-md-1" style="text-align: center">
                    <a href="{{route('showPlace', $place->id)}}" style="font-size: inherit;">Show</a>
                </div>
                <div class="col-md-1" style="text-align: center">
                    <a href="#" style="font-size: inherit;">Edit</a>
                </div>
                <div class="col-md-1" style="text-align: center">
                    <a href="{{route('deletePlace', $place->id)}}" style="color: #ff555b; font-size: inherit;">Delete</a>
                </div>
            </div>

        @endforeach
    </div>>

@endsection
