<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 py-10">
    

    <div class="max-w-lg bg-white mx-auto p-5 rounded shadow">
        @if(session('status'))
            <div class="mt-0 text-green-700 font-small mb-2">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('tags.store') }}" method="POST" class="flex mb-4">
            @csrf
            <input type="text" name="name" id="" class="rounded-l bg-gray-200 p-4 w-full outline-nnone" placeholder="New Tag">
            <input type="submit" value="Create" class="rounded-r px-8 bg-blue-500 text-white outline-none">
        </form>
        @if ($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li class="mt-0 text-red-700 font-small mb-2">
                    {{ $error }}
                </li>
            @endforeach
            </ul>
        @endif

        <h1 class="text-lg text-center mb-4">Tag List</h1>

        <table>
            <tbody>
                @forelse ($tags as $tag)
                <tr>
                    <td class="border px-4 py-2">{{ $tag->name }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="px-4 py-2 rounded bg-red-500 text-white">
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No tags found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>