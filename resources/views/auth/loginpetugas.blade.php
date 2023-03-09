@extends('auth.app')
@section('content')

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-row items-center justify-between p-12 py-8 mx-auto md:h-screen lg:py-0 bg-gray-200">

            <img class="h-auto w-1/3 mx-auto drop-shadow-md" src="../images/image2.png">

      <div class="w-1/3 bg-white rounded-lg shadow dark:border my-24 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 drop-shadow-xl">
          <div class="p-6 space-y-4 md:space-y-20 sm:p-8 drop-shadow-lg">
              <a href="{{route('login.siswa')}}" class="flex justify-center drop-shadow-lg items-center text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-2/12 h-2/12 drop-shadow-lg" src="../images/logo.png">
                Log in
              </a>
              <form class="space-y-4 md:space-y-6" action="{{route('login.post')}}" method="POST">
                @csrf

                  <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                      <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div class="py-4">
                        <button type="submit" class="w-full text-white bg-dwisa-400 hover:bg-dwisa-300 focus:ring-4 focus:outline-none focus:ring-dwisa-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-dwisa-400 dark:hover:bg-dwisa-200 dark:focus:ring-dwisa-300">Log in</button>
                </div>
            </form>
          </div>
      </div>
  </div>
</section>

@endsection
