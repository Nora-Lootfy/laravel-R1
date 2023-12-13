<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <h2 class="text-light bg-dark" style="padding: 25px; border-radius:25px; text-align: center">{{$car->title}}</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="../assets/images/{{$car->image}}" alt="" width="75%">
        </div>
        <div class="col-md-6">
            <div class="row">
                <p class="text-light bg-secondary" style="padding: 25px; border-radius:25px;">Car Details:<br>{{$car->description}}</p>
            </div>
            <div class="row">
                <p class="text-light bg-primary" style="padding: 20px; border-radius:25px; text-align: center">
                {{$car->price}}$
                </p>
            </div>
            <div class="row">
                @if($car->published)
                    <p class="text-light bg-secondary" style="padding: 20px; border-radius:25px; text-align: center">Car is Published</p>
                @else
                    <p class="text-light bg-secondary" style="padding: 20px; border-radius:25px; text-align: center">Car is not Published</p>
                @endif
            </div>
            <div class="row">
                <p class="text-light bg-secondary" style="padding: 20px; border-radius:25px; text-align: center">
                    Category: {{$car->category->category_name}}
                </p>
            </div>
        </div>

{{--        <div class="col-md-6">--}}
{{--            <p class="text-light bg-secondary" style="padding: 25px; border-radius:25px;">Car Details:<br>{{$car->description}}</p>--}}
{{--        </div>--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="row">--}}
{{--                <p class="text-light bg-primary" style="padding: 20px; border-radius:25px; text-align: center">--}}
{{--                    {{$car->price}}$--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                @if($car->published)--}}
{{--                    <p class="text-light bg-secondary" style="padding: 20px; border-radius:25px; text-align: center">Car is Published</p>--}}
{{--                @else--}}
{{--                    <p class="text-light bg-secondary" style="padding: 20px; border-radius:25px; text-align: center">Car is not Published</p>--}}
{{--                @endif--}}

{{--            </div>--}}
{{--        </div>--}}
    </div>
    <a href="../car-index" class="btn btn-primary">Back to All cars</a>

</div>

</body>
</html>

