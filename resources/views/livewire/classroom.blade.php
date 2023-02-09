<div>
    <div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md my-3 py-2 px-4">Tambah Data</button>
            @if ($isModal)
                @include('livewire.classrooms.create')
            @endif
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kelas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Wali Kelas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classrooms as $classroom)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$loop->iteration}}
                            </th>
                            <td class="px-6 py-4">
                                {{ $classroom->name }}
                            </td>
                            @if ($classroom->teacher_id === 0)
                            <td class="px-6 py-4">
                                <span class="bg-yellow-500 w-full text-white p-2 rounded shadow">
                                   {{__('Wali Kelas Belum Tersedia..')}}
                                </span>
                            </td>
                            @else
                            <td class="px-6 py-4">
                                {{ $classroom->homeTeacher->name ?? ' Wali Kelas Belum ada.. '}}
                            </td>
                            @endif
                            <td class="px-6 py-4">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
        </div>



    </div>

</div>
