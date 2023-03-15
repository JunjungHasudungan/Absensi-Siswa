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
                                        @forelse ($subject->classroomSubject as $classroom)
                                    <ul class="max-w-md border rounded-lg border-gray-400 mb-2 justify-center item-center  w-full space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                                        <li class="px-2 py-2 item-center">
                                            <label for="" class="px-2 py-2 mr-2 m-2 flex-inline">
                                                {{ $classroom->name }}
                                            </label>

                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                <a href="/presations/{{ $subject->id }}">
                                                    Tambah
                                                </a>
                                            </button>

                                            <button wire:click="detailAttendance( {{ $subject->id }} )"
                                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                                Detail
                                            </button>

                                            <button
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Hapus
                                            </button>

                                        </li>
                                    </ul>
                                        @empty

                                        @endforelse
                                            </td>
                                        </tr>
                                    @empty

                                @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
