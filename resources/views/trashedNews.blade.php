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
    <h2>Trashed News</h2>
    <p>The .table-hover class enables a hover state on table rows:</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Published</th>
            <th>Author</th>
            <th>Restore</th>
            <th class="text-warning">Permanent Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trashed_news as $article)
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
                <td><a href="restore-news/{{$article->id}}">Restore</a></td>
                <td><a href="delete-permanent-news/{{$article->id}}" class="text-warning">Delete</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <a href="../news-index" class="btn btn-primary">Back to All news</a>
</div>

</body>
</html>

