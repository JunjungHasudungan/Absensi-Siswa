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
                    Kelas: {{ $classroom_name }} |  Wali Kelas:  {{ $home_teacher }}
                </p>
            </div>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hari
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mulai - Selesai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Mata Pelajaran
                        </th>
                        <th class="px-6 py-3">
                            Guru
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$loop->iteration}}
                            </th>
                            @foreach ($subject->classroomSubject as $mata_pelajaran)
                                <td class="px-6 py-4">
                                    {{ $mata_pelajaran->pivot->day }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($mata_pelajaran->pivot->start_time)->format('H:i') }}
                                -   {{ \Carbon\Carbon::parse($mata_pelajaran->pivot->end_time)->format('H:i') }}
                                </td>
                            @endforeach

                            <td class="px-6 py-4">
                                {{ $subject->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $subject->teacher->name ?? '' }}
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

