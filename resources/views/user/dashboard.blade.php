@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        {{-- <a
            href=""class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 mb-2">Sewa
            yang berlangsung</a> --}}

        <div class="mt-6 relative overflow-x-auto">
            <table id="tbl_list"
                class="w-full text-sm text-center justify-center items-center text-gray-500 dark:text-gray-400">
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
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    {{-- @foreach ($mobils as $mobil)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
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
                            <td class="px-6 py-4 justify-center text-center">
                                <button data-modal-target="detail-{{ $mobil->id }}"
                                    data-modal-toggle="detail-{{ $mobil->id }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Sewa
                                </button>

                                    // <!-- Main modal -->
                    <div id="detail-{{ $mobil->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Form Sewa
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="detail-{{ $mobil->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="POST" action="{{ route('user.sewa') }}" class="p-4 md:p-5">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-1 justify-center items-center">


                                        <div class="relative max-w-sm">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>
                                            <input id="tanggal_mulai" name="tanggal_mulai" datepicker datepicker-autohide
                                                type="text" autocomplete="off"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Pilih tanggal mulai">
                                        </div>

                                        <div class="relative max-w-sm">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>
                                            <input id="tanggal_selesai" name="tanggal_selesai" datepicker
                                                datepicker-autohide type="text" autocomplete="off"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="pilih tanggal selesai">
                                        </div>


                                        <div class="col-span-2">
                                            <label for="tarif_sewa"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif
                                                Sewa perhari</label>

                                            <input id="tarif_sewa"name="tarif_sewa" type="number"
                                                class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $mobil->tarif_sewa }}" readonly>

                                        </div>

                                        <input type="hidden" name="id_mobil" value="{{ $mobil->id }}">
                                        <input type="hidden" name="status" value="{{ $mobil->status }}">
                                    </div>
                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Ajukan Sewa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                            </td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('body-script')
    <script type="text/javascript">
        $(document).ready(function() {

            let table = $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{{ route('getData') }}',
                    "type": "get"
                },
                columns: [{
                        data: 'merek',
                        name: 'merek'
                    },
                    {
                        data: 'model',
                        name: 'model'
                    },
                    {
                        data: 'plat',
                        name: 'plat'
                    },
                    {
                        data: 'tarif_sewa',
                        name: 'tarif_sewa'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },


                ]
            });

            $('#tbl_list').on('click', '.lihat-detail', function() {
                var data = table.row($(this).parents('tr')).data();
                var id_mobil = data.id;
                console.log(id_mobil);
                window.location.href = 'sewa/' + id_mobil;

            });

            $('#tanggal_mulai, #tanggal_selesai').on('input', function() {
                let tgl_mulai = $('#tanggal_mulai').val();
                let tgl_selesai = $('#tanggal_selesai').val();
                let tarif = $('#tarif_sewa').val();
                console.log(tgl_mulai, tgl_selesai, tarif);

                $.ajax({
                    url: '{{ route('getHargaSewa') }}',
                    type: 'POST',
                    data: {
                        tanggal_mulai: tgl_mulai,
                        tanggal_selesai: tgl_selesai,
                        tarif_sewa: tarif
                    },
                    success: function(data) {
                        alert(data);
                        $('#tarif_sewa').val(data);
                    },
                    error: function(request, status, error) {
                        alert(request.statusText + "[" + request.status + "]");
                        alert(request.responseText);
                    }
                });
            });

        })
    </script>
@endsection
