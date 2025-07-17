<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function toggleVisibility(id) {
        const input = document.getElementById(id);
        const iconShow = document.getElementById(id + '_show');
        const iconHide = document.getElementById(id + '_hide');

        if (input.type === 'password') {
            input.type = 'text';
            iconShow.classList.add('hidden');
            iconHide.classList.remove('hidden');
        } else {
            input.type = 'password';
            iconShow.classList.remove('hidden');
            iconHide.classList.add('hidden');
        }
    }
    </script>
    <title>@yield('title')</title>
    @yield('script')
</head>

<body>
    @yield('content')
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
