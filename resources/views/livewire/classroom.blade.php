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

    {{-- button for add New data classroom --}}
        <button wire:click.prevent="createClassroom()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md my-3 py-2 px-4">
            Tambah Data
        </button>
    {{-- create some check condition --}}
        @if ($is_create)
            {{-- include file subjectcreate --}}
            @include('livewire.classrooms.create')
        @endif

        @if ($is_edit)
            @include('livewire.classrooms.edit')
        @endif

        @if ($is_detail)
            @include('livewire.classrooms.detail')
        @endif

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th class="col" class="px-6 py-3">
                            Kode Kelas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kelas
                        </th>
                        <th class="px-6 py-3">
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
                                {{ $classroom['code_classroom'] }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $classroom['name'] }}
                            </td>

                            @if ($classroom->user_id == 0)
                                <td class="px-6 py-4">
                                    <p class="text-yellow-700 font-extrabold">
                                        Wali kelas Belum Tersedia..
                                    </p>
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    {{ $classroom->homeTeacher->name }}
                                </td>
                            @endif
                            <td class="px-6 py-4">
                                {{-- add button for edit and delete data classroom --}}
                                <button  wire:click="editClassroom( {{ $classroom->id }} )" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>

                                <button  wire:click="detailClassroom( {{ $classroom->id }} )" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Detail
                                </button>

                                <button wire:click.prevent="deleteConfirmation( {{ $classroom->id }}  )" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
                {{-- {{ $subjects->links() }} --}}
              </div>
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
