<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('frontendicons.flowbite')
    @include('frontendicons.boxicons')

    <title>Pembayaran Spp</title>
</head>

<body>

@include('admin.layouts.sidebar')
@include('admin.layouts.navbar')
    <main>
        @yield('content')
    </main>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
@include('sweetalert::alert')
</body>
</html>
