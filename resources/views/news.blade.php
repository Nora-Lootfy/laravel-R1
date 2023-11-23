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
    <h2>All News</h2>
    <p>The .table-hover class enables a hover state on table rows:</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Published</th>
            <th>Author</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $article)
            <tr>
                <td>{{$article->newsTitle}}</td>
                <td>{{$article->newsContent}}</td>
                <td>
                    @if($article->newsPublished)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{$article->newsAuthor}}</td>
                <td><a href="edit-news/{{$article->id}}">Edit</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

</body>
</html>

