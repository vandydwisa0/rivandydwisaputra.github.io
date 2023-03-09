<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2">


         <li>
            <a href="{{route('dashboard.index')}}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
            {{request()->is('admin/dashboard')? 'bg-dwisa-100 text-white ':''}}">
               <box-icon type='solid' name='dashboard'></box-icon>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>

         @can('access-admin')
         <li>
            <a href="{{route('siswa.index')}}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
            {{request()->is('admin/siswa')? 'bg-dwisa-100 text-white ':''}}">
               <box-icon type='solid' name='user'></box-icon>
               <span class="flex-1 ml-3 whitespace-nowrap">Siswa</span>
            </a>
         </li>

         <li>
            <a href="{{route('petugas.index')}}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
            {{request()->is('admin/petugas')? 'bg-dwisa-100 text-white':''}}">
               <box-icon type='solid' name='user'></box-icon>
               <span class="flex-1 ml-3 whitespace-nowrap">Petugas</span>
            </a>
         </li>
         <li>
            <a href="{{route('kelas.index')}}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
            {{request()->is('admin/kelas')? 'bg-dwisa-100 text-white':''}}">
               <box-icon type='solid' name='server'></box-icon>
               <span class="flex-1 ml-3 whitespace-nowrap">Kelas</span>
            </a>
         </li>
         {{-- <li>
            <a href="{{route('jurusan.index')}}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
            {{request()->is('admin/jurusan')? 'bg-dwisa-100 text-white':''}}">
               <box-icon type='solid' name='server'></box-icon>
               <span class="flex-1 ml-3 whitespace-nowrap">Jurusan</span>
            </a>
         </li> --}}
         <li>
            <a href="{{route('spp.index')}}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
            {{request()->is('admin/spp')? 'bg-dwisa-100 text-white':''}}">
               <box-icon type='solid' name='notepad'></box-icon>
               <span class="flex-1 ml-3 whitespace-nowrap">Spp</span>
            </a>
         </li>
         @endcan

         @can('access-petugas')
         <li>
             <a href="{{route('pembayaran.index')}}"
             class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
             {{request()->is('admin/pembayaran')? 'bg-dwisa-100 text-white':''}}">
             <box-icon type='solid' name='server'></box-icon>
             <span class="flex-1 ml-3 whitespace-nowrap">Pembayaran</span>
            </a>
        </li>
        @elsecan('access-admin')
        <li>
             <a href="{{route('pembayaran.index')}}"
             class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
             {{request()->is('admin/pembayaran')? 'bg-dwisa-100 text-white':''}}">
             <box-icon type='solid' name='server'></box-icon>
             <span class="flex-1 ml-3 whitespace-nowrap">Pembayaran</span>
            </a>
        </li>
        @endcan

      </ul>
   </div>
</aside>
