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
                            Mata Pelajaran
                        </th>
                        <th class="px-6 py-3">
                            Guru
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hari
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mulai - Selesai
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$loop->iteration}}
                            </th>

                            <td class="px-6 py-4">
                                {{ $subject->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $subject->teacher->name ?? 'Guru Belum ada..' }}
                            </td>

                            <td class="px-6 py-4">
                                @forelse ($subject->classroomSubject as $mata_pelajaran)
                                <ul class="w-full px-2 py-2 divide-y divide-gray-100 hover:text-white list-none max-w-md tracking-tight text-gray-500 list-inside dark:text-gray-400">
                                    <li>
                                        {{ $mata_pelajaran->pivot->day }}
                                    </li>
                                </ul>
                                @empty
                                    <p class="text-yellow-900 font-bold">
                                        {{ __('Hari Belum tersedia..') }}
                                    </p>
                                @endforelse
                            </td>

                            <td class="px-6 py-4">
                                @forelse ($subject->classroomSubject as $mata_pelajaran)
                                    <ul class="w-full px-2 py-2 hover:text-white list-none max-w-md tracking-tight text-gray-500 list-inside dark:text-gray-400">
                                        <li>
                                            {{ \Carbon\Carbon::parse($mata_pelajaran->pivot->start_time)->format('H:i') }}
                                        -   {{ \Carbon\Carbon::parse($mata_pelajaran->pivot->end_time)->format('H:i') }}
                                        </li>
                                    </ul>
                                    @empty
                                        <p class="text-yellow-900 font-bold">
                                            {{ __('Jam Pelajaran Belum tersedia..') }}
                                        </p>
                                @endforelse
                            </td>
                        </tr>
                    @empty
                        <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Mata Pelajaran Belum Tersedia.
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

