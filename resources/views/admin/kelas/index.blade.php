@extends('admin.layouts.app')
@section('content')

<div class="sm:ml-64">
   <div class="p-4 py-10 mt-14">
    <h1 class="mb-2 text-gray-700 font-bold text-4xl">Data Kelas</h1>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex-auto mx-auto max-w-screen-xl">
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
                            <input type="text" id="cari" name="cari" value="{{request('cari')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                    @include('admin.kelas.create')

                </div>
            </div>
            <div class="px-4 py-4 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No</th>
                            <th scope="col" class="px-4 py-3">Kelas</th>
                            <th scope="col" class="px-4 py-3">Kompetensi Keahlian</th>
                            <th scope="col" class="px-4 py-3">Singkatan</th>
                            <th scope="col" class="px-4 py-3">Created</th>
                            <th scope="col" class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($kelas as $item)

                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3">{{$loop->iteration}}</th>
                            <td class="px-4 py-3">{{$item->nama_kelas}}</td>
                            <td class="px-4 py-3">{{$item->kompetensi_keahlian}}</td>
                            <td class="px-4 py-3">{{$item->singkatan}}</td>
                            <td class="px-4 py-3">{{$item->created}}</td>
                            <td class="flex px-6 py-4 items-center justify-center">
                                @include('admin.kelas.edit')
                                @include('admin.kelas.delete')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- PAGINATION --}}
        {{ $kelas->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    </section>


   </div>
</div>



@endsection
