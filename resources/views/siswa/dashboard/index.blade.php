@extends('siswa.layouts.app')
@section('content')

<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex flex-row items-center justify-between h-auto rounded mx-auto md:h-screen lg:py-0 bg-gray-50 shadow-lg">
        <img class="h-auto w-1/3 mx-auto drop-shadow-md" src="../images/splash.png">
    <div class="p-7 mx-8 space-y-4 md:space-y-20 drop-shadow-sm">
        <p class="text-gray-600 font-light text-6xl dark:text-white">Selamat Datang</p>
        <p class="text-gray-600 font-light text-6xl dark:text-white">

            {{$siswa->nama}}
        </p>
    </div>
      </div>

   </div>
</div>

@endsection
