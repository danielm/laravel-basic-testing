<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Tag List</h1>

    <ul>
        @forelse ($tags as $tag)
            <li>{{ $tag->name }}</li>
        @empty
            <li>No tags found</li>
        @endforelse
    </ul>

</body>
</html>