<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('frontendicons.flowbite')
    <title>Print Invoice</title>
</head>
<body>
    <div class="flex justify-center items-center border-b-2 dark:border-gray-600 mb-10">
        <div class="items-center justify-center">
            <img src="https://www.dbl.id/uploads/school/3960/115-SMKN_1_KATAPANG.png" class="w-48">
        </div>
        <div class="w-10/12">
            <div class="header text-center my-3">
                <h4 class="mb-0 font-bold text-sm">PEMERINTAH DAERAH PROVINSI JAWA BARAT </h4>
                <h4 class="mb-0 font-bold text-sm">DINAS PENDIDIKAN</h4>
                <h4 class="mb-0 font-bold text-lg">CABANG DINAS PENDIDIKAN WILAYAH VIII</h4>
                <h4 class="mb-0 font-bold text-lg">SEKOLAH MENEGAH KEJURUSAN NEGERI 1 KATAPANG</h4>
                <h6 class="mb-0 text-xs">NSS: 341020828004 NPSN : 20206214</h6>
                <p class="mb-0 text-sm text-gray-700 font-medium">Jln. Ceuri Terusan Kopo KM. 13,5 Telepon: (022) 589-3737</p>
                <p class="mb-0 text-xs text-gray-700 font-medium">
                    Faksimil: (022) 589-3636 Website: http://smkn1katapang.sch.id e-mail : smkn1katapang@bdg.centrin.net.id
                    Kabupatan Bandung - 40921
                </p>
            </div>
        </div>
    </div>

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

            <div class="flex items-center py-7 rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500 mr-3">Pembayaran Bulan</p>
                <p class="flex ml-20 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->bulan}}</p>
            </div>
            <div class="flex items-center py-7 border-t rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex text-gray-500">Nominal</p>
                <p class="flex ml-40 text-gray-500">:</p>
                </div>
                    <p class="space-x-10 ml-2">{{$item->spp->nominal_perbulan}}</p>
            </div>

            <div class="flex items-end py-7 border-t rounded-t dark:border-gray-600">
                <div class="flex flex-row">
                <p class="flex font-bold text-gray-500 ml-72">Jumlah Bayar</p>
                <p class="flex font-bold ml-32 text-gray-500">:</p>
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
