    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            {{-- validation for natification --}}
            @if (session()->has('success'))
                <div class="bg-green-500 text-white p-3 rounded shadow-sm mb-3">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-3">
                    {{ session()->get('error') }}
                </div>
            @endif
            {{-- end validation --}}

            <div class=" inline-flex col-span-7 p-3 w-full">
                    @if ($is_detail)
                        @include('livewire.teacher.schedule.detail')
                    @endif
            </div>
        </div>
        {{-- table --}}
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pelajaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
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
                            {{ $subject->name }}
                        </td>
                        <td class="px-6 py-4">
                           @foreach ($subject->classroomSubject as $classroom)
                            <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                                <li>
                                    {{ $classroom->name }}
                                </li>
                            </ul>
                           @endforeach
                        </td>
                        <td class="px-6 py-4 item-center justify-center">
                            <button
                                    wire:click="detailSheduleSubject( {{ $subject->id }} )"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Detail
                            </button>
                        </td>
                    </tr>
                @empty
                    <div class="bg-yellow-500 text-white p-3 rounded shadow-sm mb-3">
                        {{ __('Data Mata Pelajaran Belum Tersedia..') }}
                    </div>
                @endforelse
            </tbody>
        </table>
        {{-- end table --}}
    </div>
