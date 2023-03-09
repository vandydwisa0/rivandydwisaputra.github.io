<div class="block space-y-4 md:flex md:space-y-0 md:space-x-4">
    <!-- Modal toggle -->

    <form action="/admin/siswa/{{$item->id}}/edit/" class="badge bg warning">
        @method('edit')
        @csrf
    <button data-modal-target="edit-siswa{{$item->id}}" id="button-edit" data-modal-toggle="edit-siswa{{$item->id}}" class="px-2 py-2" type="button">
        <box-icon type='solid' color="green" name='edit'></box-icon>
    </button>
    </form>

</div>

<!-- Main Modal -->
<div id="edit-siswa{{$item->id}}" tabindex="-1" data-modal-backdrop="static" data-te-keyboard="false" data-modal-backdrop="static" data-te-keyboard="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit siswa
                </h3>
                <button type="button" onclick="reset()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-siswa{{$item->id}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
               <form action="/admin/siswa/{{ $item->id }}" id="edit" method="POST">
                @method('put')
                @csrf

                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="nisn" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nisn</label>
                            <input type="number" name="nisn" id="nisn" value="{{$item->nisn}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nisn anda..." required>
                        </div>
                        <div>
                            <label for="nis" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nis</label>
                            <input type="number" name="nis" id="nis" value="{{$item->nis}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nis anda..." required>
                        </div>
                        <div>
                            <label for="nama" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{$item->nama}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nama anda..." required>
                        </div>
                        <div>
                            <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" value="{{$item->password}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan nama anda..." required>
                        </div>


                        <div>
                            <label for="kelas_id" class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                <select name="kelas_id" id="kelas_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                @foreach ($kelas as $items)
                                <option value="{{$items->id}}">{{$items->nama_kelas}} - {{$items->kompetensi_keahlian}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="no_telp" class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                            <input type="number" name="no_telp" id="no_telp" value="{{$item->no_telp}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Masukan no telepon anda..." required>
                        </div>
                    </div>

                    <div class="mb-6 mt-3">
                         <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                         <textarea name="alamat" id="alamat"
                         rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan alamat anda..." required>{{$item->alamat}}
                         </textarea>
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
