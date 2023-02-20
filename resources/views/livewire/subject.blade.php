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
<div class=" inline-flex col-span-7 p-3 w-full">
    <button wire:click.prevent="createSubject()"
            class="bg-blue-500 hover:bg-blue-700 w-40
            text-white font-bold rounded-md my-3 inline-flex py-2 px-5">
        <svg class="w-5 h-6 -ml-1 inline-flex"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="currentColor">
        <path fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
          clip-rule="evenodd" />
      </svg>
        <span class="m-auto">
            Add data
        </span>
    </button>

    @if (!$is_search)
        @include('livewire.subjects.search-subject')
    @endif
</div>
{{-- create some check condition --}}
    @if ($is_create)
        {{-- include file subjectcreate --}}
        @include('livewire.subjects.create')
    @endif

    @if ($is_edit)
        @include('livewire.subjects.edit')
    @endif

    @if ($is_detail)
        @include('livewire.subjects.detail')
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
                            <button  wire:click="editSubject( {{ $subject->id }} )" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </button>

                            <button  wire:click="detailSubject( {{ $subject->id }} )" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Detail
                            </button>

                            <button wire:click.prevent="deleteConfirmation( {{ $subject->id }} )" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
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
            {{ $subject_paginate->links('pagination::tailwind') }}
          </div>
    </div>

    {{-- add script for delete --}}
    @push('scripts')
    <script>
        // eventListener confirm delete mata pelajaran
        window.addEventListener('swal:confirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: false,
                })
                .then( will_delete => {
                    if(will_delete){
                        window.livewire.emit('deleteSubject', event.detail.id);
                    }else{
                        swal("Data Mata Pelajaran masih ada..");
                    }
                })
            });
    </script>
    @endpush


</div>
