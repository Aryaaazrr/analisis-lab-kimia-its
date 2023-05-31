<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') | Lab KIMIA - Institut Teknologi Surabaya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="icon" href="/img/logo.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="w-full flex min-h-screen items-center justify-center bg-green-950">
        @yield('content');
    </div>
</body>

</html>
