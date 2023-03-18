<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrasi') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full">
                    @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @livewire('attendance-student') --}}


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
                                <th scope="col" class="px-6 py-3">
                                    Nama Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   Lanjut
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $subject->code_subject }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $subject->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $subject->classroom->name ?? ''}}
                                    </td>
                                    <td class="px-6 py-4 space-x-2 justify-center item-center mx-2">
                                        <a href="/presences/{{ $subject->id }}/create " class="px-2 py-2 border-gray-600 bg-green-500 w-full rounded-lg text-gray-900 hover:bg-green-300">
                                            Pilih
                                        </a>
                                        <a href="/teacher/historiesPresences" class="px-2 py-2 border-gray-600 bg-gray-500 w-full rounded-lg text-gray-900 hover:bg-gray-300">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                    @empty
                                    <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-2">
                                        Data Mata Pelajaran Belum tersedia..
                                    </div>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- script --}}
    {{-- end script --}}
</x-app-layout>
