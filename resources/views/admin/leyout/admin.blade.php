<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/44678bafea.js" crossorigin="anonymous"></script>
</head>
<body class="font-['Poppins'] bg-[###FAF5FF]">
    <header>
            <nav class="w-[100%] h-[70px] flex fixed border-b-[2px] justify-end border-[black] text-[black] transition-all z-[100]" id="nav">
                <ul class="w-[600px] flex justify-between p-[25px] gap-[40px] pr-[100px]">
                    <a href="{{ route("home") }}"><li>Home</li></a>
                    <a href="{{ route("admin.new_video") }}"><li>Add video</li></a>
                    <a href="{{ route("admin.index") }}"><li>All videos</li></a>
                </ul>
            </nav>
    </header>
    <main class="min-h-[100vh] pt-[90px]">
    @yield('main_content')
    </main>
    <footer class="w-[100%] flex justify-center bg-[#313638] h-[70px] pt-[30px]">
            <p class="text-[white]">&copy; Made by Richard Kucmen</p>
    </footer>
    <script src="{{ asset('../resources/js/main.js') }}"></script>
</body>
</html>
