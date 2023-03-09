<div class="w-full flex-inline bg-gray-400">
    @forelse ($classroom->subjectClassroom as $subject)
        <div class="flex items-center pl-8 mb-2">
            <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ $subject->name }} </label>
        </div>
    @empty
        <div class="p-1">
            <label for="" class="pl-8 px-4 text-yellow-400 py-4">
                {{ __('Data Mata Pelajaran Belum ada..') }}
            </label>
        </div>
    @endforelse
</div>
