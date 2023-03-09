@extends('admin.layouts.app')
@section('content')


<div class="sm:ml-64">
   <div class="p-4 py-10 mt-14">
    <h1 class="mb-2 text-gray-700 font-bold text-4xl">Data Pembayaran</h1>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="mx-auto max-w-screen-xl">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex flex-row">
                            <input type="text" id="cari" name="cari" value="{{request('cari') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" name="search">
                            {{-- <button type="submit" class=" ml-4 block w-full md:w-auto font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white bg-dwisa-400 hover:bg-dwisa-300 focus:ring-dwisa-300 dark:bg-dwisa-400 dark:hover:bg-dwisa-200 dark:focus:ring-dwisa-300">Cari</button> --}}
                        </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                    @include('admin.pembayaran.create')

                    {{-- <div class="flex items-center space-x-3 w-full md:w-auto">
                        <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                            </div>
                        </div>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                <li class="flex items-center">
                                    <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">10</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">11</label>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

                </div>
            </div>
            <div class="px-4 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No</th>
                            <th scope="col" class="px-4 py-3">Nama Siswa</th>
                            <th scope="col" class="px-4 py-3">Kelas</th>
                            <th scope="col" class="px-4 py-3">Tahun Spp</th>
                            <th scope="col" class="px-4 py-3">Nominal</th>
                            <th scope="col" class="px-4 py-3">Jumlah Bayar</th>
                            <th scope="col" class="px-4 py-3">Petugas</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Tanggal Bayar</th>
                            <th scope="col" class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $item)

                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3">{{$loop->iteration}}</th>
                            <td class="px-4 py-3">{{$item->siswa->nama}}</td>
                            <td class="px-4 py-3">{{$item->siswa->kelas->nama_kelas}} - {{$item->siswa->kelas->kompetensi_keahlian}}</td>
                            <td class="px-4 py-3">{{$item->spp->tahun}}</td>
                            <td class="px-4 py-3">Rp {{$item->spp->nominal}}</td>
                            <td class="px-4 py-3">Rp {{$item->jumlah_bayar}}</td>
                            <td class="px-4 py-3">{{$item->users->nama_petugas}}</td>
                            <td class="px-4 py-3">{{$item->status}}</td>
                            <td class="px-4 py-3">{{$item->tgl_bayar}}</td>
                            <td class="flex px-6 py-4 items-center justify-center">
                                @if ($item->spp->nominal-$item->jumlah_bayar)
                                @include('admin.pembayaran.edit')
                                @include('admin.pembayaran.delete')
                                @else
                                @include('admin.pembayaran.edit')
                                @include('admin.pembayaran.invoice')
                                @include('admin.pembayaran.delete')
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- PAGINATION --}}
        {{ $pembayaran->links() }}
        </div>
    </div>
    </section>


   </div>
</div>

@endsection
