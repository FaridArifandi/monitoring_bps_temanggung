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
        <button id="add-button" data-modal-target="addKinerjaModal" data-modal-show="addKinerjaModal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">add</button>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-2 py-2 w-12">
                    No
                </th>
                <th scope="col" class="px-8 py-3 w-12">
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
                    Realisasi
                </th>
                <th scope="col" class="px-6 py-3">
                    Satuan
                </th>
                <th scope="col" class="px-6 py-3">
                    Link Bukti Dukung
                </th>
                <th scope="col" class="px-6 py-3 w-64">
                    Ket.
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kinerjaData as $kinerja)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-2 py-3 w-12">{{ $kinerja->id }}</td>
                    <td class="px-8 py-3">{{ $kinerja->nama_kegiatan }}</td>
                    <td class="px-6 py-3">{{ $kinerja->timKerja->nama_tim }}</td>
                    <td class="px-6 py-3">
                        {{ \Carbon\Carbon::parse($kinerja->start_date)->translatedFormat('d F Y') }} -
                        {{ \Carbon\Carbon::parse($kinerja->end_date)->translatedFormat('d F Y') }}
                    </td>
                    <td class="px-6 py-3">{{ $kinerja->target }}</td>
                    <td class="px-6 py-3">{{ $kinerja->realisasi }}</td>
                    <td class="px-6 py-3">{{ $kinerja->satuan }}</td>
                    <td class="px-6 py-3">{{ $kinerja->link_bukti_dukung }}</td>
                    <td class="px-6 py-3 w-64 truncate">
                        <details>
                            <summary class="cursor-pointer">Lihat</summary>
                            <p>{{ $kinerja->keterangan }}</p>
                        </details>
                    </td>
                    <td class="px-6 py-3">
                        <a href="#" type="button" data-modal-target="editRealisasiModal"
                            data-modal-show="editRealisasiModal"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
                <a href="{{ $kinerjaData->previousPageUrl() }}"
                    class="px-3 py-2 mr-3 bg-blue-600 text-white rounded hover:bg-blue-700">
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
                        <a href="{{ $url }}"
                            class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-blue-700 hover:text-white">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Tombol Next -->
            @if ($kinerjaData->hasMorePages())
                <a href="{{ $kinerjaData->nextPageUrl() }}"
                    class="px-3 py-2 ml-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Next
                </a>
            @else
                <span class="px-3 py-2 ml-3 bg-gray-300 text-gray-700 cursor-not-allowed rounded">
                    Next
                </span>
            @endif
        </nav>
    </div>
    @include('modals.EditRealisasiModals')
    @include('modals.AddKinerjaModals')
</div>

<script>
    document.getElementById('filter-button').addEventListener('click', function() {
        const year = document.getElementById('year-filter').value;
        const month = document.getElementById('month-filter').value;
        window.location.href = `?year=${year}&month=${month}`;
    });
</script>
