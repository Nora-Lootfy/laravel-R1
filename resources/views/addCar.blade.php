<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            direction:   {{__('addCar.page_direction')}};
        }
    </style>
</head>
<body>

<div class="container">
    <div class="text-center">
        <hr>
        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="btn" style="width: 150px; color:#fff;background-color: #ff545a">{{__('addCar.english')}}</a>
        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" style="width: 150px; color:#fff;background-color: #ff545a" class="btn">{{__('addCar.arabic')}}</a>
        <hr>
    </div>

    <h2>{{__('addCar.pageTitle')}}</h2>
    <form action="{{route('car-added')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{__('addCar.titleLabel')}}</label>
            <input type="text" class="form-control" id="title" placeholder="{{__('addCar.titlePlaceholder')}}" name="title" value="{{old('title')}}">

            @error('title')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label for="price">{{__('addCar.priceLabel')}}</label>
            <input type="number" class="form-control" id="price" placeholder="{{__('addCar.pricePlaceholder')}}" name="price">
            @error('price')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">{{__('addCar.descriptionLabel')}}</label>
            <textarea class="form-control" rows="5" id="description" name="description">{{old('description')}}</textarea>

            @error('description')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="category">{{__('addCar.categoryLabel')}}</label>
            <select id="category" name="category_id">
                <option value="">{{__('addCar.categorySelect')}}</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>

            @error('category_id')
            <div class="alert alert-danger">
               {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">{{__('addCar.imageTitle')}}</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            @error('image')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label> <input type="checkbox" name="published"> {{__('addCar.publishedTitle')}}</label>
        </div>
        <button type="submit" class="btn btn-default">{{__('addCar.button')}}</button>
    </form>
</div>

</body>
</html>
