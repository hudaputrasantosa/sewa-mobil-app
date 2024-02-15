<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Masukkan data Mobil</h2>

                </div>



                <form class="max-w-sm mx-auto" method="POST" action="{{ route('admin.kirimDataMobil') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="merek"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">merek</label>
                        <input type="text" id="merek" name="merek"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." required />
                    </div>
                    <div class="mb-5">
                        <label for="model"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">model</label>
                        <input type="text" id="model" name="model"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." required />
                    </div>
                    <div class="mb-5">
                        <label for="plat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">plat</label>
                        <input type="text" id="plat" name="plat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." required />
                    </div>
                    <div class="mb-5">
                        <label for="tarif_sewa"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tarif_sewa</label>
                        <input type="number" id="tarif_sewa" name="tarif_sewa"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan data.." required />
                    </div>


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
