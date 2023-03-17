<div class="block space-y-4 md:flex md:space-y-0 md:space-x-4">
    <!-- Modal toggle -->
    <button data-modal-target="tambah-pembayaran" data-modal-toggle="tambah-pembayaran" type="button" class="flex items-center justify-center focus:ring-4 font-medium rounded-lg text-sm px-4 py-2 text-white bg-dwisa-400 hover:bg-dwisa-300 focus:ring-dwisa-300 dark:bg-dwisa-400 dark:hover:bg-dwisa-200 dark:focus:ring-dwisa-300">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Tambah Data
    </button>

</div>

<!-- Main Modal -->
<div id="tambah-pembayaran" tabindex="-1" data-modal-backdrop="static" data-te-keyboard="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Tambah Pembayaran
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah-pembayaran">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/admin/pembayaran" method="POST">
                    @csrf
                    <div class="grid gap-6 md:grid-rows-2">
                        <div class="grid gap-4  sm:grid-cols-2">
                        <div>
                            <label for="siswa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required data-live-search="true">
                                <option value="" selected>Pilih Nama Siswa</option>
                                @foreach ($siswa as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="spp_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Spp</label>
                                <select name="spp_id" id="spp_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                @foreach ($spp as $item)
                                <option value="{{$item->id}}">{{$item->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        {{-- <div>
                            <label for="users_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas</label>
                                <select name="users_id" id="users_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                @foreach ($user as $item)
                                <option value="{{$item->id}}">{{$item->nama_petugas}}</option>
                                <option value="{{ $item->id }}" hidden></option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div>
                            <label for="bulan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan</label>
                                <select id="bulan" name="bulan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" required>
                                    <option value="" selected>Pilih Bulan</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                </select>
                        </div>

                        {{-- <div>
                            <label for="nominal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal Pembayaran</label>
                            <input type="number" name="nominal" id="nominal" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" readonly>
                        </div> --}}

                        <div>
                            <label for="jumlah_bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" id="jumlah_bayar" value="{{}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nominal pembayaran spp (100.000) ..." required>
                        </div>


                    <!-- Modal footer -->
                    <div class="flex items-end justify-end pt-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" class="block w-full md:w-auto font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white bg-dwisa-400 hover:bg-dwisa-300 focus:ring-dwisa-300 dark:bg-dwisa-400 dark:hover:bg-dwisa-200 dark:focus:ring-dwisa-300">Tambah Data</button>
                    </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



{{-- untuk select siswa agar bisa melakukan search --}}
<script>
$(document).ready(function() {
    $('#siswa_id').select2({
        placeholder: 'Pilih Nama Siswa',
        tags: true, // menampilkan inputan user yang tidak ada dalam daftar pilihan
        tokenSeparators: [' '], // memungkinkan user untuk memasukkan opsi yang dipisahkan oleh spasi
        ajax: {
            url: '/search/siswa',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term // term adalah nilai keyword search yang dimasukkan user
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.nama,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
});
</script>

