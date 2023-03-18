<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrasi') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @livewire('administration') --}}

                    <div class="w-full mb-2">
                        <h4 class="rounded-lg border-gray-900 text-gray-400 font-semibold px-2 py-2">
                            Tabel Histori Presensi
                        </h4>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kelas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mata Pelajaran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Lanjutkan</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($presences as $presence)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$presence->classroom->name ?? ''}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Carbon\Carbon::parse($presence->created_at)->translatedFormat('d F Y') }}
                                            - {{ Carbon\Carbon::parse($presence->created_at)->format('H:i') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $presence->subject->code_subject }} - {{ $presence->subject->name ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 space-x-2 justify-center item-center mx-2">
                                            <a href="{{ route('teacher.presences.index') }}" class="px-2 py-2 border-gray-600 bg-blue-500 w-full rounded-lg text-gray-900 hover:bg-blue-300">
                                                Kembali
                                            </a>
                                            <a href="{{route('teacher.historyPresenceSubject', $presence->subject->id)}}" class="px-2 py-2 border-gray-600 bg-gray-500 w-full rounded-lg text-gray-900 hover:bg-gray-300">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-2">
                                       Belum ada presensi Absen Mata Pelajaran Siswa..
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
