<div>
    {{-- @if ($classroom_id) --}}
    <div class="flex item-center mr-4 inline-block">
        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                @forelse ($subjects as $subject)
                    <div class="flex items-center pl-3">
                        <input  id="vue-checkbox-list"
                                type="checkbox"
                                wire:model="subject_id"
                                value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label  for="vue-checkbox-list"
                                class="w-38 py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ $subject->name }}
                        </label>
                    </div>
                @empty
                <option class="bg-yellow-300 font-normal text-yellow-500 hover:font-bold capitalize">
                    Data Jabatan Belum Tersedia..
                </option>
                @endforelse
            </li>
        </ul>
        {{-- @endif --}}
    </div>
</div>
