@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">

        <table class="mt-6 w-full text-sm text-center justify-center items-center text-gray-500 dark:text-gray-400">
            <div class="relative w-[90%] mx-auto overflow-x-auto shadow-md sm:rounded-lg">

                <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Penyewa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No SIM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
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
                    </tr>
                </thead>
                <tbody>
                    @if (count($sewas) < 1)
                        <p>Data Penyewaan Mobil Belum ada</p>
                    @endif
                    @foreach ($sewas as $sewa)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $sewa->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $sewa->no_sim }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $sewa->alamat }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $sewa->merek }}
                            </td>
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
                                @currency($sewa->harga_sewa)
                            </td>

                        </tr>
                    @endforeach
                </tbody>
        </table>

    </div>
@endsection
