<div class="block space-y-4 md:flex md:space-y-0 md:space-x-4">
    <!-- Modal toggle -->

    <form action="/admin/kelas/{{ $item->id }}/edit/" class="badge bg-warning" method="POST">
        @method('edit')
        @csrf
    <button data-modal-target="edit-kelas{{ $item->id }}" id="button-edit" data-modal-toggle="edit-kelas{{ $item->id }}" class="px-2 py-2" type="button">
        <box-icon type='solid' color="green" name='edit'></box-icon>
    </button>
    </form>

</div>

<!-- Main Modal -->
<div id="edit-kelas{{ $item->id }}" tabindex="-1" data-modal-backdrop="static" data-te-keyboard="false" class="modal-edit hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Kelas
                </h3>
                <button type="button" onclick="reset()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-kelas{{ $item->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/admin/kelas/{{ $item->id }}" id="edit" method="POST">
                    @method('put')
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-rows-2">
                        <div>
                            <label for="nama_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                            <input type="number" name="nama_kelas" id="nama_kelas" value="{{$item->nama_kelas}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nama anda..." required>
                        </div>
                        <div>
                            <label for="kompetensi_keahlian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                            <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" value="{{$item->kompetensi_keahlian}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nama anda..." required>
                        </div>
                        <div>
                            <label for="singkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Singkatan</label>
                            <input type="text" name="singkatan" id="singkatan" value="{{$item->singkatan}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nama anda..." required>
                        </div>

                        {{-- <div>
                            <label for="nama_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                <select id="nama_kelas" name="nama_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500">
                                    <option selected>Pilih Kelas</option>
                                    <option value="13" {{$item->nama_kelas == '13' ? 'selected' : ''}}>13</option>
                                    <option value="12" {{$item->nama_kelas == '12' ? 'selected' : ''}}>12</option>
                                    <option value="11" {{$item->nama_kelas == '11' ? 'selected' : ''}}>11</option>
                                    <option value="11" {{$item->nama_kelas == '10' ? 'selected' : ''}}>10</option>

                                </select>
                        </div>
                        <div>
                            <label for="kompetensi_keahlian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                <select id="kompetensi_keahlian" name="kompetensi_keahlian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" required>
                                    <option value="" selected>Pilih Jurusan</option>
                                    <option value="RPL" {{$item->kompetensi_keahlian == 'RPL' ? 'selected' : ''}}>Rekayasa Perangkat Lunak</option>
                                    <option value="MM" {{$item->kompetensi_keahlian == 'MM' ? 'selected' : ''}}>Multimedia</option>
                                    <option value="TKJ" {{$item->kompetensi_keahlian == 'TKJ' ? 'selected' : ''}}>Teknik Komputer Jaringan</option>
                                    <option value="TEKSTIL" {{$item->kompetensi_keahlian == 'TEKSTIL' ? 'selected' : ''}}>Tekstil</option>
                                    <option value="MEKA" {{$item->kompetensi_keahlian == 'MEKA' ? 'selected' : ''}}>Mekatronika</option>
                                    <option value="MESIN" {{$item->kompetensi_keahlian == 'MESIN' ? 'selected' : ''}}>Mesin</option>
                                    <option value="TKR" {{$item->kompetensi_keahlian == 'TKR' ? 'selected' : ''}}>Teknik Kendaraan Ringan</option>
                                    <option value="ELECTRO" {{$item->kompetensi_keahlian == 'ELECTRO' ? 'selected' : ''}}>Electro</option>
                                    <option value="TGM" {{$item->kompetensi_keahlian == 'TGM' ? 'selected' : ''}}>Teknik Gambar Mesin</option>

                                </select>
                        </div> --}}
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-end justify-end pt-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" class="block w-full md:w-auto font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white bg-dwisa-400 hover:bg-dwisa-300 focus:ring-dwisa-300 dark:bg-dwisa-400 dark:hover:bg-dwisa-200 dark:focus:ring-dwisa-300">Simpan Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    function reset() {
        document.getElementById('edit').reset()
    }
</script>
