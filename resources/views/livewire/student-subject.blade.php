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

        @if ($is_detail)
            @include('livewire.student.subjects.detail')
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
                        <th class="col" class="px-6 py-3">
                            Kode Mata Pelajaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Mata Pelajaran
                        </th>
                        <th class="px-6 py-3">
                            Guru
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
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
                                {{ $subject->code_subject }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $subject->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $subject->teacher->name }}
                            </td>
                            <td class="px-6 py-4 item-center justify-center">

                                <button wire:click="detailClassroom( {{ $subject->id }} )"
                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Detail
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

