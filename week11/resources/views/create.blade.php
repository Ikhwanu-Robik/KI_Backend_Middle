<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Agent</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="flex flex-col items-center justify-center w-screen h-screen">
        <div class="p-4 border">
            <h1 class="text-2xl font-bold">Create New Agent</h1>
            <a href="/" class="text-blue-700 underline">Back</a>
            @session('create_status')
                @if ($value === 'success')
                    <h2 class="text-center text-white bg-yellow-500">
                        Agent successfully created
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
            <form action="/store" method="post" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="border">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="border"></textarea>
                <label for="avatar">Avatar</label>
                <input type="file" name="image" id="avatar">
                <button type="submit" class="p-2 m-2 text-blue-400 bg-gray-500">Create Agent!</button>
            </form>
        </div>
    </main>
</body>

</html>
