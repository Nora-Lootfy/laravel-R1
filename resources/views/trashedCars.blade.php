<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Trashed cars</h2>
    <p>The .table-hover class enables a hover state on table rows:</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Published</th>
            <th>Price</th>
            <th>Restore</th>
            <th class="text-warning">Permanent Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trashed_cars as $car)
            <tr>
                <td>{{$car->title}}</td>
                <td>{{$car->description}}</td>
                <td>
                    @if($car->published)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{$car->price}}</td>
                <td><a href="restore-car/{{$car->id}}">Restore</a></td>
                <td><a href="delete-permanent-car/{{$car->id}}" class="text-warning">Delete</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <a href="../car-index" class="btn btn-primary">Back to All cars</a>
</div>

</body>
</html>

