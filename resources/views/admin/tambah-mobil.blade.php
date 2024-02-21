@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 mt-8 bg-white">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-500"><- Kembali</a>
                <div class="my-4 text-center">
                    <h4 class="font-bold text-gray-900 text-xl">Masukkan Data Mobil</h4>
                </div>
                <form class="max-w-lg mx-auto" method="POST" action="{{ route('admin.kirimDataMobil') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="merek"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">merek</label>
                        <input type="text" id="merek" name="merek"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." :value="old('merek')" required autofocus />
                    </div>
                    <div class="mb-5">
                        <label for="model"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">model</label>
                        <input type="text" id="model" name="model"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." :value="old('model')" required autofocus />
                    </div>
                    <div class="mb-5">
                        <label for="plat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">plat</label>
                        <input type="text" id="plat" name="plat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." :value="old('plat')" required autofocus />
                    </div>
                    <div class="mb-5">
                        <label for="tarif_sewa"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tarif_sewa</label>
                        <input type="text" id="tarif_sewa" name="tarif_sewa"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." :value="old('tarif_sewa')" required autofocus />
                    </div>

                    {{-- <input type="text"> --}}

                    <div class="w-full justify-center text-center">
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
    </div>
@endsection

@section('body-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tarif_sewa').mask('000.000.000.000.000,00');
        })
    </script>
@endsection
