@extends('layouts.blog')

@section('content')
    <div class="container" style=" width: 50vw">
    <form action="{{route('storePlace')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form1Example1">Place Title</label>
            <input type="text" id="form1Example1" class="form-control" name="title" value="{{old('title')}}"/>
            @error('title')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form1Example2">Description</label>
            <textarea class="form-control" rows="5" id="description" name="description" placeholder="Please provide a short description">{{old('description')}}</textarea>
            @error('description')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label" for="form1Example2">Price Starts: </label>
                    <input type="range" max="100" min="1" step="0.1" onchange="document.getElementById('textStart').value=this.value;"  name="priceFrom" value="{{old('priceFrom')}}">
                    <input type="text" disabled id="textStart" value="{{old('priceFrom')}}" style="background: transparent; border: none; margin-left: 10px" >
                    @error('priceFrom')
                    <div class="alert alert-danger">
                        <strong>Error!!</strong> {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-offset-1 col-md-3">
                    <label class="form-label" for="form1Example2">Max price: </label>
                    <input type="range" max="100" min="1" step="0.1" onchange="document.getElementById('textEnd').value=this.value;" name="priceTo" value="{{old('priceTo')}}">
                    <input type="text" disabled id="textEnd" value="{{old('priceTo')}}" style="background: transparent; border: none; margin-left: 10px" >
                    @error('priceTo')
                    <div class="alert alert-danger">
                        <strong>Error!!</strong> {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}" style="border: none;">
            @error('image')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
            <hr>
        </div>


        <br>
        <div class="form-outline mb-4 text-center">
           <button data-mdb-ripple-init type="submit" class="btn" style="width: 300px; color:#fff;background-color: #ff545a">
               Submit
           </button>
        </div>
    </form>
    </div>

@endsection
