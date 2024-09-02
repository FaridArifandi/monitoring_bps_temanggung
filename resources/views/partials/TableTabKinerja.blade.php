<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div
        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <div class="flex items-center space-x-4">
            <label for="year-filter" class="text-sm font-medium text-gray-900 dark:text-white">Tahun:</label>
            <select id="year-filter" name="year"
                class="border border-gray-300 rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                <option value="">Semua Tahun</option>
                @foreach ($years as $yearOption)
                    <option value="{{ $yearOption }}" {{ $year == $yearOption ? 'selected' : '' }}>{{ $yearOption }}
                    </option>
                @endforeach
            </select>

            <label for="month-filter" class="text-sm font-medium text-gray-900 dark:text-white">Bulan:</label>
            <select id="month-filter" name="month"
                class="border border-gray-300 rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                <option value="">Semua Bulan</option>
                @foreach ($months as $monthOption)
                    <option value="{{ $monthOption['number'] }}"
                        {{ $month == $monthOption['number'] ? 'selected' : '' }}>{{ $monthOption['name'] }}</option>
                @endforeach
            </select>
            <button id="filter-button"
                class="flex items-center justify-center w-10 h-10 rounded-full focus:ring-4 focus:outline-bold focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
            </button>
        </div>
        <button id="add-button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">add</button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Kegiatan
                </th>
                <th scope="col" class="px-6 py-3">
                    Tim Kerja
                </th>
                <th scope="col" class="px-6 py-3">
                    Periode Kegiatan
                </th>
                <th scope="col" class="px-6 py-3">
                    Target
                </th>
                <th scope="col" class="px-6 py-3">
                    Satuan
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($kinerjaData as $kinerja)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $kinerja->id  }}</td>
                <td class="px-6 py-4">{{ $kinerja->nama_kegiatan }}</td>
                <td class="px-6 py-4">{{ $kinerja->timKerja->nama_tim }}</td>
                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($kinerja->start_date)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($kinerja->end_date)->translatedFormat('d F Y') }}
                </td>
                <td class="px-6 py-4">{{ $kinerja->target }}</td>
                <td class="px-6 py-4">{{ $kinerja->satuan }}</td>
                <td class="px-6 py-4">
                    <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-4">
        <nav class="flex justify-between items-center">
            <!-- Tombol Previous -->
            @if ($kinerjaData->onFirstPage())
                <span class="px-3 py-2 mr-3 bg-gray-300 text-gray-700 cursor-not-allowed rounded">
                    Previous
                </span>
            @else
                <a href="{{ $kinerjaData->previousPageUrl() }}" class="px-3 py-2 mr-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Previous
                </a>
            @endif

            <!-- Link Halaman -->
            <div class="space-x-2">
                @foreach ($kinerjaData->getUrlRange(1, $kinerjaData->lastPage()) as $page => $url)
                    @if ($page == $kinerjaData->currentPage())
                        <span class="px-3 py-2 bg-blue-600 text-white rounded">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-blue-700 hover:text-white">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Tombol Next -->
            @if ($kinerjaData->hasMorePages())
                <a href="{{ $kinerjaData->nextPageUrl() }}" class="px-3 py-2 ml-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Next
                </a>
            @else
                <span class="px-3 py-2 ml-3 bg-gray-300 text-gray-700 cursor-not-allowed rounded">
                    Next
                </span>
            @endif
        </nav>
    </div>

    <div class="py-4">
        {{ $kinerjaData->links() }}
    </div>
    <!-- Edit user modal -->
    <div id="editUserModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <form id="editUserForm" action=""
                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                @csrf
                @method('PUT')

                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Kinerja</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editUserModal">
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
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                value=""
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
<script>
    document.getElementById('filter-button').addEventListener('click', function() {
        const year = document.getElementById('year-filter').value;
        const month = document.getElementById('month-filter').value;
        window.location.href = `?year=${year}&month=${month}`;
    });
</script>
