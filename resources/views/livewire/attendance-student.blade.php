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

            @if ($is_create)
                @include('livewire.teacher.attendances.create')
            @endif

            @if ($is_edit)
                @include('livewire.teacher.attendances.edit')
            @endif

            @if ($is_detail)
                @include('livewire.teacher.attendances.detail')
            @endif

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
                    @forelse ($subjects as $index => $subject)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$loop->iteration}}
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
                                        <button wire:click="addAttendance( {{ $classroom->id }} )"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Tambah
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
                                <div class="w-full px-2 py-2">
                                    <p>
                                        Data Siswa Belum ada...
                                    </p>
                                </div>
                                @endforelse
                                {{-- {{ $classroom['name'] }} --}}
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

