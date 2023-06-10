<div class="p-10 mt-20 sm:ml-64">
    <div class="p-4 rounded-lg h-auto bg-slate-50">
        <ol
            class="flex items-center w-full text-sm  font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
            <li
                class="flex md:w-full items-center text-green-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Pilih <span class="hidden sm:inline-flex sm:ml-2">Layanan</span>
                </span>
            </li>
            <li
                class="flex md:w-full items-center text-green-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">

                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Input <span class="hidden sm:inline-flex sm:ml-2">Sampel</span>
                </span>
            </li>
            <li class="flex items-center text-gray-400">
                <span class="mr-2">3</span>
                Pembayaran
            </li>
        </ol>
    </div>

    <form wire:submit.prevent="save">
        {{-- @csrf --}}
        <div class=" p-6 mt-4 rounded-lg h-auto bg-slate-50" id="form">
            <div class="flex justify-between self-center">
                <div class="flex text-base font-medium md:font-medium md:text-xl items-center">
                    {{ __('Daftar Sampel') }}
                </div>
                <div class="flex justify-center">
                    <button wire:click="add()" type="button"
                        class="p-2 text-xs md:text-sm flex items-center rounded-lg bg-blue-200 text-blue-800 border border-blue-800"
                        id="tambah-entri">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" class="w-6">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z">
                            </path>
                        </svg>
                        Tambah Entri</button>
                </div>
            </div>


            {{-- @if (session('status'))
                <div id="alert-1"
                    class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif --}}

            {{-- @if ($errors->any())
                <div id="alert-1"
                    class="flex items-center mt-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Danger</span>
                    <ul class="mt-1.5 ml-4 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif --}}

        </div>


        @foreach ($sampel as $index => $sampel)
            <div class=" p-8 mt-4 rounded-lg h-auto bg-slate-50">
                <div class="flex justify-end">
                    <button type="button" wire:click="delete({{ $index }})"
                        wire:key="sampel.{{ $index }}.button"
                        class="p-2 ml-4 text-sm flex items-center rounded-lg bg-red-700 hover:bg-red-800 text-white "
                        id="hapus-entri">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" class="w-6">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="flex mb-4 flex-col rounded-md">
                    <div class="flex justify-evenly flex-col md:flex-row w-full">
                        <div class="flex mt-4 md:mr-2 w-full flex-col">
                            {{-- <input type="text" value="{{ $pilihanLayanan }}" wire:model="sampel.{{ $index }}.layanan_id"> --}}
                            <label for="nama_sampel"
                                class="mb-2 text-sm text-gray-900 @error('sampel.' . $index . '.nama_sampel') text-red-500 text-sm @enderror">Nama
                                Sampel</label>
                            <input wire:model="sampel.{{ $index }}.nama_sampel"
                                wire:key="sampel.{{ $index }}.nama_sampel" type="text" id="nama_sampel"
                                name="nama_sampel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500 
                                @error('sampel.' . $index . '.nama_sampel') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 @enderror">
                            @error('sampel.' . $index . '.nama_sampel')
                                <span class="pt-2 text-xs text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex mt-4 md:ml-2 items-start w-full flex-col">
                            <label for="jumlah"
                                class="mb-2 text-sm text-gray-900 @error('sampel.' . $index . '.jumlah') text-red-500 text-sm @enderror">Jumlah</label>
                            <input wire:model="sampel.{{ $index }}.jumlah"
                                wire:key="sampel.{{ $index }}.jumlah" type="number" id="jumlah"
                                name="jumlah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500 @error('sampel.' . $index . '.jumlah') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 @enderror"
                                min="0" value="0">
                            @error('sampel.' . $index . '.jumlah')
                                <span class="pt-2 text-xs text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-evenly flex-col md:flex-row w-full">
                        <div class="flex mt-4 md:mr-2 items-start w-full flex-col">
                            <label for="jenis_sampel"
                                class="mb-2 text-sm text-gray-900 @error('sampel.' . $index . '.jenis_sampel') text-red-500 text-sm @enderror">Jenis
                                Sampel</label>
                            <select name="jenis_sampel" id="jenis_sampel"
                                wire:model="sampel.{{ $index }}.jenis_sampel"
                                wire:key="sampel.{{ $index }}.jenis_sampel"
                                class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500 @error('sampel.' . $index . '.jenis_sampel') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 @enderror">
                                <option @readonly(true)>- Pilih Jenis Sampel -</option>
                                @foreach ($jenis_sampel as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('sampel.' . $index . '.jenis_sampel')
                                <span class="pt-2 text-xs text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex mt-4 md:ml-2 items-start w-full flex-col">
                            <label for="wujud_sampel"
                                class="mb-2 text-sm text-gray-900 @error('sampel.' . $index . '.wujud_sampel') text-red-500 text-sm @enderror">Wujud
                                Sampel</label>
                            <select name="wujud_sampel" id="wujud_sampel"
                                wire:model="sampel.{{ $index }}.wujud_sampel"
                                wire:key="sampel.{{ $index }}.wujud_sampel"
                                class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500 @error('sampel.' . $index . '.wujud_sampel') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 @enderror">
                                <option @readonly(true)>- Pilih Wujud Sampel -</option>
                                @foreach ($wujud_sampel as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('sampel.' . $index . '.wujud_sampel')
                                <span class="pt-2 text-xs text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="flex my-4 justify-between bg-slate-50 p-4 rounded-lg">
            <a href="{{ route('layanan') }}"
                class="text-blue-700 bg-transparent mr-2 border-2 border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs md:text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z">
                    </path>
                </svg>
                Cancel
            </a>
            <button wire:click="save()" type="submit"
                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs md:text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Simpan
                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </form>
</div>
