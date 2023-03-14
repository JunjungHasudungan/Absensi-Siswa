<div class="flex flex-inline w-full space-x-1">
    @foreach ($attendances as $key => $attendance)
        <div class=" w-full flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1" class="w-full py-4 ml-2 text-sm font-bold text-gray-900">
               {{ $attendance }}
            </label>
        </div>
    @endforeach
</div>
@if ($attendance == 'izin' || $attendance == 'sakit')
<div class="mt-1">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan: </label>
    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
</div>
@endif
