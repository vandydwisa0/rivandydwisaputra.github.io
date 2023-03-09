<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('frontendicons.flowbite')
    @include('frontendicons.boxicons')

    <title>Welcome</title>
</head>

<body>
@include('layouts.navbar')
    <main>
        @yield('content')
    </main>

</body>
</html>
