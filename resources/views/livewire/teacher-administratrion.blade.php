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
            {{-- button --}}
            <button wire:click.prevent="createAdministration()"
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
            {{-- end button --}}
                @if ($is_create)
                    @include('livewire.teacher.administrations.create')
                @endif
            {{-- search --}}
                @if (!$is_search)
                    @include('livewire.teacher.administrations.search-administration')
                @endif
            {{-- end search --}}
        </div>
    </div>
</div>
