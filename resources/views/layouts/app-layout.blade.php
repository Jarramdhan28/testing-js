<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body class="font-sans">
    <div class="bg-yellow-50 max-w-7xl h-screen mx-auto rounded-lg p-6">
         <nav class="flex gap-6">
            <a href="{{ route('users.index')}}" class="bg-blue-200 p-2">Data User</a>
            <a href="{{ route('article.index')}}" class="bg-blue-200 p-2">Data Article</a>
        </nav>
        <div class="mt-6">
            {{ $slot }}
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</html>
