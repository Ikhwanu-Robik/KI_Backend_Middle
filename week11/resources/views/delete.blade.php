<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Agent</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main class="flex flex-col items-center justify-center w-screen h-screen">
        <div class="p-4 border">
            <h1 class="text-2xl font-bold">Delete {{ $agent->name }} ?</h1>
            <a href="/"  class="text-blue-700 underline">Back</a>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="/destroy/{{ $agent->id }}" method="post" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $agent->id }}">
                <button type="submit" class="p-2 m-2 text-red-400 bg-gray-500">Delete Agent!</button>
            </form>
        </div>
</body>
</html>