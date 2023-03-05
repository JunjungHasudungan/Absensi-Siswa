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

                @if ($is_review)
                    @include('livewire.administrations.review')
                @endif
            {{-- search --}}
                {{-- @if (!$is_search)
                    @include('livewire.users.search-user')
                @endif --}}
            {{-- end search --}}
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
                    Nama Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Pelajaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Guru
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($administrations as $administration)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $administration->classroom->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{  $administration->subject->name ?? ''}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $administration->user_id ?? '' }}
                    </td>
                    <td class="px-6 py-4 item-center justify-center">
                        <button wire:click="reviewAdministration({{ $administration->id }})"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Review
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
    {{-- end table --}}
</div>
