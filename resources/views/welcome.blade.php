@extends('layouts.app')
@section('content')

<section class="bg-white dark:bg-gray-900">
<div class="py-8 mt-5 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6 rounded-md bg-gray-100 shadow-xl">
      <div class="py-8 my-6 max-w-screen-xl sm:py-16
      flex flex-row items-center justify-between h-auto rounded mx-auto lg:py-0 bg-gray-50 shadow-lg">
        <img class="h-auto w-1/3 mx-auto drop-shadow-md" src="../images/animate1.gif">
    <div class="bg-gray-200 rounded-xl shadow-lg p-7 mx-3.5 space-y-4 md:space-y-2 drop-shadow-sm">
        <p class="text-gray-600 font-light text-6xl dark:text-white">Welcome to</p>
        <p class="text-gray-600 font-light text-6xl dark:text-white">Pembayaran Spp Vandydwisa</p>

    </div>
      </div>

    <div class="py-8 bg-gray-100">
   @include('welcome2')
   </div>

   <footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800 rounded-md shadow-xl">
    @include('footer')
   </footer>
</div>

@endsection
