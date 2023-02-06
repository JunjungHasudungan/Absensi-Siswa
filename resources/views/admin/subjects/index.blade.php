<x-app-layout>
    <x-slot name="header">
        <h6 class="font-semibold text-sm text-white leading-tight">
            {{ __('Mata Pelajaran') }}
        </h6>
    </x-slot>

    <div class="py-6 dark:bg-gray-900 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <livewire:show-subjects /> --}}
                @livewire('show-subjects')
            </div>
        </div>
    </div>
</x-app-layout>
