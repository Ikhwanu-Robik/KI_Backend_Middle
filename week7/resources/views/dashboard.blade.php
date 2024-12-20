<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col items-center justify-center w-screen h-screen gap-4 text-black bg-yellow-400">
    <h1 class="text-xl">Welcome, <span class="p-2 font-bold bg-white">{{ session()->get('user_name') }}</span></h1>
    <a href="/logout" class="text-white underline">Log Out</a>
</body>
</html>