<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit News</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Edit News</h2>
    <form action="{{route('update-news', $news->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="newsTitle" value="{{$news->newsTitle}}">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" rows="5" id="content" name="newsContent">{{$news->newsContent}}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" placeholder="Enter Author" name="newsAuthor" value="{{$news->newsAuthor}}">
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="newsPublished" @checked($news->newsPublished)> Published</label>
        </div>
        <button type="submit" class="btn btn-default">Edit</button>
    </form>
</div>

</body>
</html>
