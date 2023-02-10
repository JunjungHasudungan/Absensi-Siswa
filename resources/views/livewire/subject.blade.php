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
    <button wire:click.prevent="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md my-3 py-2 px-4">
        Tambah Data
    </button>
{{-- create some check condition --}}
    @if ($isModal)
        {{-- include file subjectcreate --}}
        @include('livewire.subjects.create')
    @endif

    @if ($isModal && $isUpdate)
        @include('livewire.subjects.edit')
    @endif

    @if ($is_detail)
        @include('livewire.subjects.show')
    @endif

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Mata Pelajaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Mata Pelajaran
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
                            {{ $subject['code_subject'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $subject['name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{-- add button for edit and delete data classroom --}}
                            <button  wire:click="edit( {{ $subject->id }} )" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </button>

                            <button  wire:click="detailSubject( {{ $subject->id }} )" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Detail
                            </button>

                            <button wire:click.prevent="deleteConfirmation( {{ $subject->id }} )" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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

    {{-- add script for delete --}}
    <script>
        function deleteSubject(id){
            if(confirm('Yakin untuk menghapus??'))
            window.livewire.emit('deleteSubjectListener', id);
        }
    </script>


</div>
