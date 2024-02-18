<div>
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            {{-- validate notification message success --}}
            @if(session()->has('success'))
                <div class="bg-green-500 text-white p-3 rounded shadow-sm mb-3">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-3">
                    {{ session()->get('error') }}
                </div>
            @endif

                <div class="W-full px-2 py-1 gap-2 flex mb-2">
                    <p class="text-gray-500">
                        Kelas: {{ $classroom_name }} | Wali Kelas: {{ $home_teacher }}
                    </p>
                </div>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 justify-center">
                            No
                        </th>
                        <th class="col" class="px-6 py-3">
                            Kode Pelajaran
                        </th>
                        <th class="col" class="px-6 py-3">
                            Nama Pelajaran
                        </th>
                        <th class="col" class="px-6 py-3">
                            Nama Guru Pelajaran
                        </th>
                        <th class="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th class="col" class="px-6 py-3">
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($presences as $index => $presence)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$loop->iteration}}
                            </th>
                            <td class="px-6 py-4">
                                {{ $presence->subject->code_subject }}
                            </td>
                            <td class="px-4 py-4">
                                {{ $presence->subject->name }}
                            </td>
                            <td class="px-4 py-4">
                                {{ $presence->teacher->name }}
                            </td>
                            <td class="px-4 py-4 flex-inline">
                                {{ \Carbon\Carbon::parse($presence->created_at)->translatedFormat('d F Y') }}
                                - {{ \Carbon\Carbon::parse($presence->created_at)->format('H:i') }}
                            </td>
                            <td class="px-4 py-4">
                                {{ $presence->attendance->description }}
                            </td>
                        </tr>
                    @empty
                        <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>
            <div class="text-gray-600 bg-secondary-50 mt-2">
                {{-- {{ $classrooms->links() }} --}}
              </div>
        </div>

    </div>
</div>

