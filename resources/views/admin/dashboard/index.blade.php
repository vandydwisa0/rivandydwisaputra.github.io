@extends('admin.layouts.app')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <section class="bg-gray-50 dark:bg-gray-900">
  <div class="max-w-screen-xl px-4 p-8 mx-auto text-center lg:px-6">
      <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-4 dark:text-white">
          <div class="flex flex-col items-center justify-center">
              <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{$jumlah_siswa}}</dt>
              <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah Siswa</dd>
          </div>
          <div class="flex flex-col items-center justify-center">
              <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{$jumlah_petugas}}</dt>
              <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah Petugas</dd>
          </div>
          <div class="flex flex-col items-center justify-center">
              <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{$jumlah_kelas}}</dt>
              <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah Kelas</dd>
          </div>
          <div class="flex flex-col items-center justify-center">
              <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{$jumlah_spp}}</dt>
              <dd class="font-light text-gray-500 dark:text-gray-400">Jumlah Spp</dd>
          </div>
      </dl>
  </div>
</section>
      <div class="flex flex-row items-center justify-between h-auto rounded mx-auto lg:py-10 bg-gray-50 shadow-lg">
        <img class="h-auto w-1/3 mx-auto drop-shadow-md" src="../images/image1.png">
    <div class="p-7 mx-8 space-y-4 md:space-y-5 drop-shadow-sm">
        <p class="text-gray-600 font-light text-6xl dark:text-white">Selamat Datang</p>
        <p class="text-gray-600 font-light text-6xl dark:text-white">{{auth()->user()->nama_petugas}}</p>
    </div>
      </div>
   </div>
</div>

@endsection
