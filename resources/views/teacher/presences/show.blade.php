<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mata Pelajaran') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full px-2 py-2 border-lg mb-1 rounded-lg font-semibold text-white">
                        <p>Table Presensi Siswa Detail</p>
                    </div>
                    <div class="W-full px-2 py-2 gap-2 flex border-lg border-gray-900 bg-gray-900 mb-2 rounded-lg">
                        <p class="text-gray-500">
                            Mapel:  {{ $subject->name }} |
                        </p>
                        <p class="text-gray-500">
                            Kelas: {{ $classroom->name }}
                        </p>
                    </div>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                   No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterangan Presensi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presences as $presence)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                       {{ $presence->student->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($presence->created_at)->translatedFormat('d F Y') }}
                                        - {{ \Carbon\Carbon::parse($presence->created_at)->format('H:i') }}
                                     </td>
                                    <td class="px-6 py-4">
                                       {{ $presence->attendance->description  }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-2 py-2 mt-2">
                        <a href="{{ route('teacher.presences.index') }}" class="w-full bg-blue-900 hover:bg-blue-500 border-lg rounded-lg px-2 py-2 font-medium text-white">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
