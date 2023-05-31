<nav class="fixed top-0 z-50 w-full bg-transparent">
    <div class="px-3 py-9 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/" class="flex md:mr-24">
                    {{-- <img src="/img/Logo_ToSepatu_no_bg.png" class="h-20" alt="ToSepatu Logo" />
                    <span
                        class="self-center text-xl font-semibold text-primary hidden md:block whitespace-nowrap ">TOSEPATU.KC</span> --}}
                </a>
                <div class="font-medium md:ml-48 text-white text-2xl hidden lg:block">
                    @yield('title')
                </div>
                {{-- <div class="flex ml-72 md:mr-24">
                    <span
                        class="self-center text-xl text-white font-semibold sm:text-2xl whitespace-nowrap">@yield('title')</span>
                </div> --}}
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3 md:mr-12 lg:mr-3">
                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                        data-dropdown-delay="500" data-dropdown-placement="bottom-end"
                        class="flex items-center text-end justify-end text-sm font-medium text-white rounded-full md:mr-0 focus:ring-2 focus:ring-gray-100 duration-500"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        @if (Auth::user()->foto)
                            <img src="{{ asset('uploads/photo/' . Auth::user()->foto) }}" class="w-8 h-8 mr-2 rounded-full"
                                alt="Foto Pengguna">
                        @else
                            <img src="{{ asset('img/default.jpg') }}" class="w-8 h-8 mr-2 rounded-full"
                                alt="Foto Default">
                        @endif

                        {{-- <img class="w-8 h-8 mr-2 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo"> --}}
                        {{ Auth::user()->username }}
                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownAvatarName"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-auto">
                        <div class="px-4 py-3 text-sm">
                            <div class="font-medium ">{{ Auth::user()->username }}</div>
                            <div class="truncate">{{ Auth::user()->email }}</div>
                        </div>
                        @if (Auth::user()->role_id == 1)
                            <ul class="py-2 text-sm text-gray-700"
                                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="{{ route('beranda') }}"
                                        class="block px-4 py-2 hover:bg-green-600 hover:text-white duration-200">Beranda</a>
                                </li>
                                <li>
                                    <a href="{{ route('transaksi') }}"
                                        class="block px-4 py-2 hover:bg-green-600 hover:text-white duration-200">Transaksi</a>
                                </li>
                                <li>
                                    <a href="{{ route('layanan-analisa') }}"
                                        class="block px-4 py-2 hover:bg-green-600 hover:text-white duration-200">Layanan
                                        Analisa</a>
                                </li>
                                <li>
                                    <a href="{{ route('layanan-sewa') }}"
                                        class="block px-4 py-2 hover:bg-green-600 hover:text-white duration-200">Layanan
                                        Sewa</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-green-600 hover:text-white duration-200">Sign
                                    out</a>
                            </div>
                        @else
                            <ul class="py-2 text-sm text-gray-700"
                                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="{{ route('layanan') }}"
                                        class="block px-4 py-2 hover:bg-green-600 hover:text-white">Layanan</a>
                                </li>
                                <li>
                                    <a href="{{ route('riwayat') }}"
                                        class="block px-4 py-2 hover:bg-green-600 hover:text-white">Riwayat Lamaran</a>
                                </li>
                                <li>
                                    <a href="{{ route('pengaturanUser') }}"
                                        class="block px-4 py-2 hover:bg-green-600 hover:text-white">Pengaturan</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-green-600 hover:text-white">Sign
                                    out</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
</nav>
