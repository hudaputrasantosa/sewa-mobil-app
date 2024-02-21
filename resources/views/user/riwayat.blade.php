@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="text-center">
            <h4 class="font-bold text-xl text-gray-900">Sewa Berlangsung</h4>
        </div>
        <div class="mt-6 relative overflow-x-auto">
            <div class="mb-4 flex gap-12">
                <a href="{{ route('user.homepage') }}" class="text-blue-500"><- Kembali</a>
                        <button data-modal-target="detail" data-modal-toggle="detail"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Pengembalian
                        </button>


                        <!-- Main modal -->
                        <div id="detail" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Form Pengembalian Mobil
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="detail">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="POST" action="{{ route('user.pengembalian') }}" class="p-4 md:p-5">
                                        @csrf
                                        <div class="mb-5">
                                            <label for="plat"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan
                                                Plat</label>
                                            <input type="text" id="plat" name="plat"
                                                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Cek Plat dan Pengembalian
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>
            <table class="w-full text-sm text-center justify-center items-center text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Merek
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Plat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Mulai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Selesai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Sewa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($sewas as $sewa)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $sewa->merek }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $sewa->plat }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $sewa->tanggal_mulai }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $sewa->tanggal_selesai }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $sewa->harga_sewa }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $sewa->status }}
                            </td>

                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

    </div>
@endsection
