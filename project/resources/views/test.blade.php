<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pagination</h1>

    @foreach ($reviews as $review)
        <p>{{ $review->title }}</p>
        {{-- <p>Tutor Name {{ $review->user->first_name }}</p> --}}
        <p>Student Name .......</p>

    @endforeach

    <div>
        {{-- <p>{{ $reviews->links() }}</p> --}}
    </div>


</body>
</html>