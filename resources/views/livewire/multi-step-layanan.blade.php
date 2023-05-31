<div class="p-10 -mt-4 sm:ml-64">
    <div class="p-4 rounded-lg h-auto bg-slate-50">
        @if ($currentStep == 1)
            <ol
                class="flex items-center w-full text-sm  font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
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
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="mr-2">2</span>
                         <span class="hidden sm:inline-flex sm:ml-2">Sampel</span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">3</span>
                    Pembayaran
                </li>
            </ol>
        @endif
        @if ($currentStep == 2)
            <ol
                class="flex items-center w-full text-sm  font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Pilih <span class="hidden sm:inline-flex sm:ml-2">Layanan</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">

                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                         <span class="hidden sm:inline-flex sm:ml-2">Sampel</span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">3</span>
                    Pembayaran
                </li>
            </ol>
        @endif
        @if ($currentStep == 3)
            <ol
                class="flex items-center w-full text-sm  font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Pilih <span class="hidden sm:inline-flex sm:ml-2">Layanan</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">

                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                         <span class="hidden sm:inline-flex sm:ml-2">Sampel</span>
                    </span>
                </li>
                <li class="flex items-center text-blue-600">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                         <span class="hidden sm:inline-flex sm:ml-2">Pembayaran</span>
                    </span>
                </li>
            </ol>
        @endif
    </div>

    <form wire:submit.prevent="multi-step-layanan">
        {{-- @csrf --}}

        @if ($currentStep == 1)
            {{-- STEP 1 --}}

            <div class="p-4 mt-4 rounded-lg h-auto bg-slate-50">

                <div class="mt-4">
                    <div class="mb-4 border-b border-green-200 dark:border-gray-700">
                        <ul class="flex -mb-px text-sm font-medium justify-between text-center w-full" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="w-full" role="presentation">
                                <button class="inline-block p-4 w-full border-b-2 rounded-t-lg" id="profile-tab"
                                    data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Analisa</button>
                            </li>
                            <li class="w-full" role="presentation">
                                <button class="inline-block p-4 w-full border-b-2 rounded-t-lg" id="dashboard-tab"
                                    data-tabs-target="#dashboard" type="button" role="tab"
                                    aria-controls="dashboard" aria-selected="false">Sewa</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="myTabContent">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-center text-gray-500">
                                <thead class="text-xs text-white uppercase bg-green-900">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Analisa
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Harga
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Pilih
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanan_analisa as $value)
                                        <tr class="bg-white border-b hover:bg-gray-50">

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $value->nama_layanan }}
                                            </td>
                                            @if ($jenis_customer == 'Internal KImia')
                                                <td class="px-6 py-4">
                                                    {{ currency_IDR($value->harga_internal_kimia) }}
                                                </td>
                                            @elseif ($jenis_customer == 'Internal ITS')
                                                <td class="px-6 py-4">
                                                    {{ currency_IDR($value->harga_internal_its) }}
                                                </td>
                                            @else
                                                <td class="px-6 py-4">
                                                    {{ currency_IDR($value->harga_umum) }}
                                                </td>
                                            @endif
                                            <td class="px-6 py-4">
                                                <input id="default-checkbox" type="checkbox" value="{{ $value->id }}"
                                                    name="{{ $value->id }}"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 hover:cursor-pointer border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-center text-gray-500">
                                <thead class="text-xs text-white uppercase bg-green-900">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Sewa
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Harga
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Pilih
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanan_sewa as $value)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $value->nama_layanan }}
                                            </td>
                                            @if ($jenis_customer == 'Internal KImia')
                                                <td class="px-6 py-4">
                                                    {{ currency_IDR($value->harga_internal_kimia) }}
                                                </td>
                                            @elseif ($jenis_customer == 'Internal ITS')
                                                <td class="px-6 py-4">
                                                    {{ currency_IDR($value->harga_internal_its) }}
                                                </td>
                                            @else
                                                <td class="px-6 py-4">
                                                    {{ currency_IDR($value->harga_umum) }}
                                                </td>
                                            @endif
                                            <td class="px-6 py-4">
                                                <input id="default-checkbox" type="checkbox"
                                                    value="{{ $value->id }}" name="{{ $value->id }}"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 hover:cursor-pointer border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- END STEP 1 --}}
        @endif

        @if ($currentStep == 2)
            {{-- STEP 2 --}}
            <div class="p-4 mt-4 rounded-lg h-auto bg-slate-50">
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="kode_transaksi" class="mb-2 text-gray-900">Kode Transaksi</label>
                        <input type="text" id="kode_transaksi" name="kode_transaksi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            readonly value="">
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="nama_sampel" class="mb-2 text-gray-900">Nama Sampel</label>
                        <input type="text" id="nama_sampel" name="nama_sampel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Nama Sampel">
                    </div>
                </div>
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="jenis_sampel" class="mb-2 text-gray-900">Jenis Sampel</label>
                        <select name="jenis_sampel" id="jenis_sampel"
                            class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                            {{-- @foreach ($jenis_sampel as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="wujud_sampel" class="mb-2 text-gray-900">Wujud Sampel</label>
                        <select name="wujud_sampel" id="wujud_sampel"
                            class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                            {{-- @foreach ($wujud_sampel as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="flex justify-evenly my-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="jumlah" class="mb-2 text-gray-900">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            min="0" value="0">
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="jadwal" class="mb-2 text-gray-900">Tentukan Jadwal</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker datepicker-autohide datepicker-buttons type="text" id="jadwal"
                                name="jadwal" datepicker-orientation="bottom left" datepicker-format="dd/mm/yyyy"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5"
                                placeholder="Select date">
                        </div>
                    </div>
                </div>
            </div>

            {{-- END STEP 2 --}}
        @endif


        @if ($currentStep == 3)
            {{-- STEP 3 --}}
            <div class="p-4 mt-4 rounded-lg h-auto bg-slate-50">
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="jenis_pembayaran" class="mb-2 text-gray-900">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" id="jenis_pembayaran"
                            class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                            {{-- @foreach ($jenis_pembayaran as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="Pembayan" class="mb-2 text-gray-900">Pembayaran</label>
                        <select name="pembayaran" id="pembayaran"
                            class="w-full h-10 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-600 active:cursor-pointer hover:cursor-pointer duration-500">
                            {{-- @foreach ($pembayaran as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="informasi_pembayaran" class="mb-2 text-gray-900">Informasi Transfer</label>
                        <input type="text" id="informasi_pembayaran" name="informasi_pembayaran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Contoh : 1673015902 BNI An. Riris Kurniarina">
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="jenis_customer" class="mb-2 text-gray-900">Jenis Customer</label>
                        <input type="text" id="jenis_customer" name="jenis_customer"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            value="" readonly>
                    </div>
                </div>
                <div class="flex justify-evenly mt-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="total_biaya" class="mb-2 text-gray-900">Total Biaya</label>
                        <input type="text" id="total_biaya" name="total_biaya"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            value="" readonly>
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="status_pembayaran" class="mb-2 text-gray-900">Status Pembayaran</label>
                        <input type="text" id="status_pembayaran" name="status_pembayaran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            value="" readonly>
                    </div>
                </div>
                <div class="flex justify-evenly my-4">
                    <div class="flex mt-4 mr-2 items-start w-full flex-col">
                        <label for="jumlah_bayar" class="mb-2 text-gray-900">Nominal Bayar</label>
                        <input type="text" id="jumlah_bayar" name="jumlah_bayar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 duration-500"
                            placeholder="Masukkan Nominal Pembayaran">
                    </div>
                    <div class="flex mt-4 ml-2 items-start w-full flex-col">
                        <label for="bukti_bayar" class="mb-2 text-gray-900 flex text-end">Upload Bukti
                            Pembayaran</label>
                        <input type="file" name="bukti_bayar" id="bukti_bayar"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    </div>
                </div>
            </div>
        @endif

        <div class="flex my-4 justify-between bg-slate-50 p-4 rounded-lg">
            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3)
                <button type="button" wire:click="decreaseStep"
                    class="text-blue-700 bg-transparent mr-2 border-2 border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</button>
            @endif

            @if ($currentStep == 1 || $currentStep == 2)
                <button type="button" wire:click="increaseStep"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">Next</button>
            @endif

            @if ($currentStep == 3)
                <button type="submit"
                    class="text-white bg-green-600 ml-2 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
            @endif
        </div>

        {{-- END STEP 3 --}}
    </form>
</div>
