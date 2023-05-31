<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full pt-20 rounded-tr-3xl transition-transform shadow-md -translate-x-full bg-white sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full sm:h-full px-3 pb-4 overflow-y-auto bg-white">
        <img src="/img/logo.png" alt="logo" class="absolute -mt-32 w-44 -ml-5 opacity-20">
        <div class="flex flex-row mt-16 item-center">
            <img src="/img/logo.png" alt="logo" class="flex w-14 items-start">
            <h1 class="font-bold text-3xl text-center flex items-center justify-center ml-2 text-green-600">KIMIA ITS
            </h1>
        </div>
        @if (Auth::user()->role_id == 1)
            <ul class="space-y-2 mt-10 font-medium">
                <li class="">
                    <a href="{{ route('beranda') }}"
                        class="flex items-center p-5 text-green-800 rounded-lg hover:bg-gray-100 hover:text-green-800 duration-500"
                        @if (request()->route()->uri == 'admin/beranda') id="active" @endif>
                        <svg aria-hidden="true" class="flex-shrink w-6 h-6 stroke-none transition duration-75"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi') }}"
                        class="flex items-center p-5 text-green-800 rounded-lg hover:bg-gray-100 hover:text-green-800 duration-500"
                        @if (request()->route()->uri == 'admin/transaksi') id="active" @endif>
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" class="flex-shrink-0 w-6 h-6 stroke-none transition duration-75">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M13 3v1.27a.75.75 0 001.5 0V3h2.25A2.25 2.25 0 0119 5.25v2.628a.75.75 0 01-.5.707 1.5 1.5 0 000 2.83c.3.106.5.39.5.707v2.628A2.25 2.25 0 0116.75 17H14.5v-1.27a.75.75 0 00-1.5 0V17H3.25A2.25 2.25 0 011 14.75v-2.628c0-.318.2-.601.5-.707a1.5 1.5 0 000-2.83.75.75 0 01-.5-.707V5.25A2.25 2.25 0 013.25 3H13zm1.5 4.396a.75.75 0 00-1.5 0v1.042a.75.75 0 001.5 0V7.396zm0 4.167a.75.75 0 00-1.5 0v1.041a.75.75 0 001.5 0v-1.041zM6 10.75a.75.75 0 01.75-.75h3.5a.75.75 0 010 1.5h-3.5a.75.75 0 01-.75-.75zm0 2.5a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Transaksi</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-5 text-green-800 rounded-lg hover:bg-gray-100 hover:text-green-800 duration-500"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
                        @if (request()->route()->uri == 'admin/layanan-analisa') id="active" @endif
                        @if (request()->route()->uri == 'admin/layanan-sewa') id="active" @endif>
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 stroke-none transition duration-75 hover:text-primary">
                            <path
                                d="M13.92 3.845a19.361 19.361 0 01-6.3 1.98C6.765 5.942 5.89 6 5 6a4 4 0 00-.504 7.969 15.974 15.974 0 001.271 3.341c.397.77 1.342 1 2.05.59l.867-.5c.726-.42.94-1.321.588-2.021-.166-.33-.315-.666-.448-1.004 1.8.358 3.511.964 5.096 1.78A17.964 17.964 0 0015 10c0-2.161-.381-4.234-1.08-6.155zM15.243 3.097A19.456 19.456 0 0116.5 10c0 2.431-.445 4.758-1.257 6.904l-.03.077a.75.75 0 001.401.537 20.902 20.902 0 001.312-5.745 1.999 1.999 0 000-3.545 20.902 20.902 0 00-1.312-5.745.75.75 0 00-1.4.537l.029.077z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Layanan</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="{{ route('layanan-analisa') }}"
                                class="flex items-center p-4 text-green-800 rounded-lg pl-14 hover:bg-gray-100 hover:text-green-800 duration-500"
                                @if (request()->route()->uri == 'admin/layanan-analisa') id="active" @endif>Analisa</a>
                        </li>
                        <li>
                            <a href="{{ route('layanan-sewa') }}"
                                class="flex items-center p-4 text-green-800 rounded-lg pl-14 hover:bg-gray-100 hover:text-green-800 duration-500"
                                @if (request()->route()->uri == 'admin/layanan-sewa') id="active" @endif>Sewa</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-green-900">
                <li>
                    <a href="{{ route('pengaturan') }}"
                        class="flex items-center p-5 text-green-900 rounded-lg hover:bg-gray-100 hover:text-green-800 duration-500"
                        @if (request()->route()->uri == 'admin/pengaturan') id="active" @endif>
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-green-900 transition duration-500 group-hover:text-green-600">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Pengaturan</span>
                    </a>
                </li>
            </ul>
        @else
            <ul class="space-y-2 mt-10 font-medium">
                <li class="">
                    <a href="{{ route('layanan') }}"
                        class="flex items-center p-4 text-green-900 rounded-lg hover:bg-gray-100 hover:text-green-800 duration-500"
                        @if (request()->route()->uri == 'layanan') id="active" @endif
                        @if (request()->route()->uri == 'layanan/daftar-sampel') id="active" @endif
                        @if (request()->route()->uri == 'layanan/pembayaran') id="active" @endif>
                        <svg aria-hidden="true"
                            class="w-6 h-6 text-green-900 transition duration-500 group-hover:text-green-600"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('riwayat') }}"
                        class="flex items-center p-4 text-green-900 rounded-lg hover:bg-gray-100 hover:text-green-800 duration-500"
                        @if (request()->route()->uri == 'riwayat') id="active" @endif>
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-green-900 transition duration-500 group-hover:text-green-600"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Riwayat Layanan</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-green-900">
                <li>
                    <a href="{{ route('pengaturanUser') }}"
                        class="flex items-center p-4 text-green-900 rounded-lg hover:bg-gray-100 hover:text-green-800 duration-500"
                        @if (request()->route()->uri == 'pengaturan') id="active" @endif>
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-green-900 transition duration-500 group-hover:text-green-600">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Pengaturan</span>
                    </a>
                </li>
            </ul>
        @endif
    </div>
</aside>
