@extends('admin.layouts.app')
@section('content')

<div class="sm:ml-64">
   <div class="p-4 py-10 mt-14">
    <h1 class="mb-2 text-gray-700 font-bold text-4xl">Data Petugas</h1>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex-auto mx-auto max-w-screen-xl">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">

                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                    @include('admin.petugas.create')

                </div>
            </div>
            <div class="px-4 py-4 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No</th>
                            <th scope="col" class="px-4 py-3">Username</th>
                            <th scope="col" class="px-4 py-3">Password</th>
                            <th scope="col" class="px-4 py-3">Nama Petugas</th>
                            <th scope="col" class="px-4 py-3">Level</th>
                            <th scope="col" class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($petugas as $item)

                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3">{{ $loop->iteration }}</th>
                            <td class="px-4 py-3">{{ $item->username }}</td>
                            <td class="px-4 py-3">{{ $item->password }}</td>
                            <td class="px-4 py-3">{{ $item->nama_petugas }}</td>
                            <td class="px-4 py-3">{{ $item->level }}</td>
                            <td class="flex px-6 py-4 items-center justify-center">
                                {{-- @include('admin.petugas.edit') --}}
                                @include('admin.petugas.delete')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- PAGINATION --}}
        {{ $petugas->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    </section>


   </div>
</div>


@endsection
