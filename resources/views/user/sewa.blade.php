@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 mt-8 bg-white">
        <a href="{{ route('user.homepage') }}" class="text-blue-500"><- Kembali</a>
                <div class="my-4 text-center">
                    <h4 class="font-bold text-gray-900 text-xl">Ajukan Sewa Mobil</h4>
                    <p>Mobil : {{ $mobil->merek }}</p>
                    <p>Plat : {{ $mobil->plat }}</p>
                    <span
                        class="@if ($mobil->status == 'disewa') bg-orange-100
                    @else bg-green-100 @endif px-3 py-1 my-2 ">
                        {{ $mobil->status }}</span>
                </div>
                <form class="max-w-lg mx-auto" method="POST" action="{{ route('user.sewa') }}">
                    @csrf

                    <div class="relative max-w-full mb-4">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="tanggal_mulai" name="tanggal_mulai" datepicker datepicker-autohide type="text"
                            autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Pilih tanggal mulai">
                    </div>

                    <div class="relative max-w-full mb-4">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="tanggal_selesai" name="tanggal_selesai" datepicker datepicker-autohide type="text"
                            autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="pilih tanggal selesai">
                    </div>


                    <div class="col-span-2 mb-4">
                        <label for="tarif_sewa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif
                            Sewa perhari</label>

                        <input id="tarif_sewa"name="tarif_sewa" type="number"
                            class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $mobil->tarif_sewa }}" readonly>

                    </div>

                    <input type="hidden" name="id_mobil" value="{{ $mobil->id }}">
                    <input type="hidden" name="status" value="{{ $mobil->status }}">


                    <div class="w-full justify-center text-center">
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sewa</button>
                    </div>
                </form>
    </div>
@endsection

@section('body-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
@endsection
