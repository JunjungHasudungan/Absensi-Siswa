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

    <div class=" inline-flex col-span-7 p-3 w-full">
        {{-- @if (!$is_search)
            @include('livewire.classrooms.search')
        @endif --}}
    </div>
    {{-- create some check condition --}}


        @if ($is_detail)
            @include('livewire.teacher.shedule_subject.detail')
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
                    {{-- @forelse ($classrooms as $classroom) --}}
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{-- {{$loop->iteration}} --}}
                            </th>
                            <td class="px-6 py-4">
                                {{-- {{ $classroom['code_classroom'] }} --}}
                            </td>

                            <td class="px-6 py-4">
                                {{-- {{ $classroom['name'] }} --}}
                            </td>

                            <td class="px-6 py-4 item-center justify-center">

                                <button
                                        {{-- wire:click="detailSheduleSubject( {{ $classroom->id }} )" --}}
                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    {{-- @empty --}}
                        <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Belum Tersedia.
                        </div>
                    {{-- @endforelse --}}
                </tbody>
            </table>
            <div class="text-gray-600 bg-secondary-50 mt-2">
                {{-- {{ $classrooms->links() }} --}}
              </div>
        </div>

    </div>
</div>

