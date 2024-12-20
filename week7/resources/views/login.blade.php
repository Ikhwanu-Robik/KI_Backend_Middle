<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col items-center justify-center w-screen h-screen gap-4 text-white bg-pink-500">
    <h1 class="text-xl">Login</h1>
    @error('username')
        <div id="err-message" class="p-4 bg-red-600">
            {{ $message }}
        </div>
    @enderror
    <form action="/login" method="post">
        @csrf
        <label for="username">Username : </label>
        <input type="text" name="username" id="username">
        <button type="submit">Login</button> 
    </form>
</body>
</html>