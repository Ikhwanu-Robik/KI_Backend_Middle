<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center w-screen h-screen">
    <div class="flex flex-col items-center justify-center w-2/5 pt-0 border rounded-lg p-7 h-1/2 bg-ktp">
        <h1 class="pb-5 font-bold">TANDA VALIDITAS KEHIDUPAN</h1>
        <div class="flex gap-2">
            <div class="w-3/4">
                <table class="mb-5">
                    <tr >
                        <td class="w-1/5">
                            Nama
                        </td>
                        <td >
                            {{ $name }}
                        </td>
                    </tr>
                    <tr >
                        <td >
                            Alamat
                        </td>
                        <td >
                            {{ $address }}
                        </td>
                    </tr>
                    <tr >
                        <td >
                            Sekolah
                        </td>
                        <td >{{ $school }}</td>
                    </tr>
                </table>
                <p>
                    {{ $bio }}
                </p>
            </div>
            <figure class="self-start w-1/4 bg-blue-700">
                <img src="{{ asset($photo_url) }}" alt="" class="w-full">
            </figure>
        </div>
    </div>
</body>
</html>
