<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2">


         <li>
            <a href="{{route('siswa.dashboard')}}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
            {{request()->is('siswa/dashboard')? 'bg-dwisa-100 text-white ':''}}">
               <box-icon type='solid' name='dashboard'></box-icon>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>
         <li>
             <a href="{{route('siswa.pembayaran')}}"
             class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700
             {{request()->is('siswa/pembayaran')? 'bg-dwisa-100 text-white':''}}">
             <box-icon type='solid' name='server'></box-icon>
             <span class="flex-1 ml-3 whitespace-nowrap">Pembayaran</span>
            </a>
        </li>

      </ul>
   </div>
</aside>
