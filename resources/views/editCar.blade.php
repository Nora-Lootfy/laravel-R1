<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Edit Car</h2>
    <form action="{{route('update-car', $car->id)}}" method="post" id="form" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$car->title}}">
            @error('title')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{$car->price}}">
            @error('price')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" rows="5" id="description" name="description">{{$car->description}}</textarea>
            @error('description')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @selected($category->id == $car->category_id)>{{$category->category_name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
            <input type="hidden" name="oldImage" value="{{$car->image}}">
            <br>
            <img src="{{asset('assets/images/'.$car->image)}}" alt="" width="200">
            @error('image')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>
        <hr>
        <div class="checkbox">
            <label><input type="checkbox" name="published"  @checked($car->published)> Published</label>
        </div>
        <button type="submit" class="btn btn-default" >Update</button>
    </form>
</div>

</body>
</html>
