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
                        <th scope="col" class="px-6 py-3">
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
                            Action
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
                                    <button wire:click="addAttendance( {{ $classroom->id }} )"
                                            class="bg-blue-500 hover:bg-blue-700 w-24
                                            text-white font-bold rounded-md my-3 inline-flex py-2 px-5">
                                        <p class="text-center item-center font-semibold">
                                            {{ $classroom->name }}
                                        </p>
                                    </button>

                                @empty

                                @endforelse
                                {{-- {{ $classroom['name'] }} --}}
                            </td>

                            <td class="px-6 py-4 item-center justify-center">
                                {{-- add button for edit and delete data classroom --}}
                                <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>

                                <button
                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Detail
                                </button>

                                <button
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Hapus
                                </button>
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

