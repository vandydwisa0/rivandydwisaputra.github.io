<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('frontendicons.flowbite')
    <title>Document</title>
</head>
<body>
<div class="p-6 space-y-6">
    @foreach ($pembayaran as $item )


                <form id="edit">
            <div class="flex items-center justify-between rounded-t dark:border-gray-600">
                        <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Invoice</p>
                        <div class="flex justify-between">
                        <p class="flex flex-row text-gray-500">Tanggal Pembuatan :</p>
                        <p class="space-x-10 ml-2">{{$item->tgl_bayar}}</p>
                        </div>
                    </div>

            <div class="flex items-center pt-7 border-t rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500">Nama</p>
                <p class="flex ml-44 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->siswa->nama}}</p>
            </div>

            <div class="flex items-center pt-2 rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500 mr-1">NISN</p>
                <p class="flex ml-44 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->siswa->nisn}}</p>
            </div>

            <div class="flex items-center pt-2 rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500 mr-3.5">NIS</p>
                <p class="flex ml-44 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->siswa->nis}}</p>
            </div>

            <div class="flex items-center pt-2 rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500 mr-1">Kelas</p>
                <p class="flex ml-44 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2"> {{$item->siswa->kelas->nama_kelas}} - {{$item->siswa->kelas->kompetensi_keahlian}}</p>
            </div>

            <div class="flex items-center pt-7 rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500 mr-1">Petugas</p>
                <p class="flex ml-40 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->users->nama_petugas}}</p>
            </div>

            <div class="flex items-center py-2 rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500">Status</p>
                <p class="flex ml-44 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->status}}</p>
            </div>

            <div class="flex items-center py-7 border-t rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500">Nominal</p>
                <p class="flex ml-40 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->spp->nominal}}</p>
            </div>

            <div class="flex items-end py-7 border-t rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex font-bold text-gray-500 mr-2">Jumlah Bayar</p>
                <p class="flex font-bold ml-28 text-gray-500">:</p>
                </div>
                    <p class=" font-bold space-x-10 ml-2">{{$item->jumlah_bayar}}</p>
            </div>
                </form>
                @endforeach
            </div>
            <script type="text/javascript">
            window.print();
            </script>
</body>
</html>
