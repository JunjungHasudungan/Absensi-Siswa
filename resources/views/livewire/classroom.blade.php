<div>
    <div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md my-3 py-2 px-4">Tambah Data</button>
            @if ($isModal)
                @include('livewire.classrooms.create')
            @endif

            @if ($isUpdate)
                @include('livewire.classrooms.update')
            @endif

            @if ($is_detail)
                @include('livewire.classrooms.detail')
            @endif

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Nama Kelas
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Wali Kelas
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classrooms as $classroom)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$loop->iteration}}
                            </th>
                            <td class="px-6 text-center py-4">
                                {{ $classroom->name }}
                            </td>
                            @if ($classroom->user_id === 0)
                            <td class="px-6 py-4 text-center">
                                <span class="bg-yellow-500 text-center w-full text-white p-2 rounded shadow">
                                   {{__('Wali Kelas Belum Tersedia..')}}
                                </span>
                            </td>
                            @else
                            <td class="px-6 py-4 text-center">
                                {{ $classroom->homeTeacher->name }}
                            </td>
                            @endif
                            <td class="px-6 py-4 justify-center text-center">
                                <button wire:click="editClassroom( {{ $classroom->id }} )" class="text-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                                 <button wire:click="detailClassroom( {{ $classroom->id }} )" class="text-center justify-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Detail
                                </button>
                                <button  wire:click="deleteConfirmation( {{ $classroom->id }} )" class="text-center justify-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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


@push('scripts')
    <script>

        window.addEventListener('show-delete-confirmation', event => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteConfirmed');
                    }
                })
            });

    </script>
@endpush
