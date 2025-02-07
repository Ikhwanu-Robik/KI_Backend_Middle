<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Agent</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main class="flex flex-col items-center justify-center w-screen h-screen">
        <div class="p-4 border">
            <h1 class="text-2xl font-bold">Edit {{ $agent->name }}</h1>
            <a href="/"  class="text-blue-700 underline">Back</a>
            @session('create_status')
                @if ($value === 'success')
                    <h2 class="text-center text-white bg-yellow-500">
                        Agent successfully edited
                    </h2>
                @endif
            @endsession
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="/update" method="post" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $agent->id }}">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="border" value="{{ $agent->name }}">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="border">{{ $agent->description }}</textarea>
                <label for="avatar">Avatar</label>
                <input type="file" name="image" id="avatar">
                <button type="submit" class="p-2 m-2 text-yellow-400 bg-gray-500">Edit Agent!</button>
            </form>
        </div>
</body>
</html>