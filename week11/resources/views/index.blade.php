<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week 11</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div id="container" class="flex flex-col w-screen h-screen gap-10 overflow-x-hidden">
        <header class="p-4">
            <h1 class="text-2xl">Week 11</h1>
            <h2>Praktik Eloquent menggunakan tabel agents</h2>
            <nav class="">
                <a href="/create" class="text-blue-500">Add New Agent</a>
                <form action="/search" method="get">
                <input type="text" name="query" placeholder="search..." class="border">
                <select name="search_method">
                    <option value="name">by Name</option>
                    <option value="description">by Description</option>
                </select>
                <button type="submit"  class="p-2 m-2 text-white bg-blue-600">Search!</button>
                </form>
            </nav>
        </header>
        <article class="flex flex-wrap justify-center w-screen h-auto gap-4 p-4">
            @foreach ($agents as $agent)
                <div class="w-1/6 p-2 text-white bg-gray-600">
                    <h4 class="text-lg font-semibold">{{ $agent->name }}</h4>
                    <br>
                    <p>{{ $agent->description }}</p>
                    <img src="{{ asset('/storage/avatars/' . $agent->image) }}" alt="{{ $agent->image }}" class="w-4/5">
                    {{-- problem arise here, the image is stored inside 'storage/app/private/public/avatars' instead of just in the public folder --}}
                    <div>
                        <a href="/edit/{{ $agent->id }}" class="text-yellow-500">Edit</a>
                        <a href="/delete/{{ $agent->id }}" class="text-red-500">Delete</a>
                    </div>
                </div>
            @endforeach
        </article>
        <nav id="page-nav" class="flex flex-col justify-end p-4 h-1/6">
            {{ $agents->onEachSide(10)->links() }}
        </nav>
    </div>
</body>

</html>
