<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="p-4 text-2xl">Search Result By {{ $search_method }}</h1>
    <a href="/"  class="p-6 text-blue-700 underline">Back</a>
    <article class="flex flex-wrap w-screen gap-4 p-4 h-2/3">
        @forelse ($agents as $agent)
            <div class="w-1/6 p-2 text-white bg-gray-600">
                <h4 class="text-lg font-semibold">{{ $agent->name }}</h4>
                <br>
                <p>{{ $agent->description }}</p>
                <img src="{{ asset('storage/avatars/' . $agent->image) }}" alt="{{ $agent->image }}">
                {{-- problem arise here, the image is stored inside 'storage/app/private/public/avatars' instead of just in the public folder --}}
                <div>
                    <a href="/edit/{{ $agent->id }}" class="text-yellow-500">Edit</a>
                    <a href="/delete/{{ $agent->id }}" class="text-red-500">Delete</a>
                </div>
            </div>
            @empty
            <div>
                <h1>No Result Found</h1>
            </div>
        @endforelse
    </article>
</body>

</html>
