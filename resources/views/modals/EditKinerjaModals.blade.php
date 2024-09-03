<div id="editKinerjaModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form id="editKinerjaForm" action="" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            @csrf
            @method('PUT')

            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Kinerja</h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editKinerjaModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_kegiatan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan" value=""
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="tim_kerja_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tim Kerja</label>
                        <select id="tim_kerja_id" name="tim_kerja_id"
                            class="border border-gray-300 rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                            @foreach ($timKerjaOptions as $timKerja)
                                <option value="{{ $timKerja->id }}">
                                    {{ $timKerja->nama_tim }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="start_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Mulai</label>
                        <input type="date" name="start_date" id="start_date"
                            value="{{ \Carbon\Carbon::parse($kinerja->start_date)->format('Y-m-d') }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="end_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Selesai</label>
                        <input type="date" name="end_date" id="end_date"
                            value="{{ \Carbon\Carbon::parse($kinerja->end_date)->format('Y-m-d') }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="target"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target</label>
                        <input type="number" name="target" id="target" value="{{ $kinerja->target }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="satuan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                        <input type="text" name="satuan" id="satuan" value="{{ $kinerja->satuan }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Simpan
                    Perubahan</button>

            </div>
        </form>
    </div>
</div>
