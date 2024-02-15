<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Pengelolaan Mobil Sewa</h2>

                </div>

            </div>

        </div>
    </div>
    <a
        href="{{ route('admin.tambahMobil') }}"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
        Mobil</a>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <div class="relative w-[90%] mx-auto overflow-x-auto shadow-md sm:rounded-lg">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        Taruf/Hari
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
                            {{ $mobil->tarif_sewa }}
                            {{-- {{ $mobil->sewa->id_mobil }} --}}
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
</x-app-layout>
