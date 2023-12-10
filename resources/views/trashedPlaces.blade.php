@extends('layouts.blog')

@section('content')
    <div class="container">
        <div class="row" style="text-align: center; font-weight: bold">
            <div class="col-md-2" style="color: #ff555b">
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
                Restore
            </div>
            <div class="col-md-1" style="color: #ff555b">
                Delete Permanently
            </div>
        </div>
        @foreach($trashedPlaces as $place)
            <hr >
            <div class="row">
                <div class="col-md-2">
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
                    <a href="{{route('restorePlace', $place->id)}}" style="font-size: inherit;">Restore</a>
                </div>
                <div class="col-md-1" style="text-align: center">
                    <a href="{{route('deletePlacePermanently', $place->id)}}" style="color: #ff555b; font-size: inherit;">Delete</a>
                </div>
            </div>

    @endforeach
@endsection
