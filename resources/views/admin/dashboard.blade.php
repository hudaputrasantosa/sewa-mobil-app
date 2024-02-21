@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">

        <a
            href="{{ route('admin.tambahMobil') }}"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 mb-2">Tambah
            Mobil</a>
        <table class="mt-6 w-full text-sm text-center justify-center items-center text-gray-500 dark:text-gray-400">
            <div class="relative w-[90%] mx-auto overflow-x-auto shadow-md sm:rounded-lg">

                <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Merek
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Model
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Plat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tarif/Hari
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobils as $mobil)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $mobil->merek }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $mobil->model }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $mobil->plat }}
                            </td>
                            <td class="px-6 py-4">
                                @currency($mobil->tarif_sewa)
                            </td>
                            <td class="px-6 py-4">
                                {{ $mobil->status }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>

    </div>
@endsection
