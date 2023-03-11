<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 w-full h-full">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    {{-- table --}}
                <div class="max-w-6xl mx-auto mb-2">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">

                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-3 py-3">
                                                            Nama
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Guru
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Kelas
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Hari
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Mulai
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Mulai
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                        <td class="px-4 py-4">
                                                            {{ $name }}
                                                        </td>
                                                        <td class="px-4 py-4">
                                                            {{ $teacher_name }}
                                                        </td>
                                                        <td class="px-4 py-4">
                                                            @forelse ($subject_weekday as $classroom)
                                                                <p class="">
                                                                    {{ $classroom->name }}
                                                                </p>
                                                            @empty
                                                                <p class="text-yellow-900 font-bold">
                                                                    {{ __('Kelas Belum ada..') }}
                                                                </p>
                                                            @endforelse
                                                        </td>
                                                        <td class="px-4 py-4">
                                                            @forelse ($subject_weekday as $weekday)
                                                                <p>
                                                                    {{ $weekday->pivot->day }}
                                                                </p>
                                                            @empty
                                                            <p class="text-yellow-900 font-bold">
                                                                {{ __('Kelas Belum ada..') }}
                                                            </p>
                                                            @endforelse
                                                        </td>
                                                        <td class="px-4 py-4">
                                                           @forelse ($subject_weekday as $start_time)
                                                               <p>
                                                                    {{ date('H:i',  strtotime( $start_time->pivot->start_time )) }}
                                                               </p>
                                                           @empty
                                                            <p class="text-yellow-900 font-bold">
                                                                {{ __('Kelas Belum ada..') }}
                                                            </p>
                                                           @endforelse
                                                        </td>
                                                        <td class="px-4 py-4">
                                                            @forelse ($subject_weekday as $end_time)
                                                                <p>
                                                                    {{ date('H:i',  strtotime( $end_time->pivot->end_time )) }}
                                                                </p>
                                                            @empty
                                                                <p class="text-yellow-900 font-bold">
                                                                    {{ __('Kelas Belum ada..') }}
                                                                </p>
                                                            @endforelse

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- end table --}}
                            </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button wire:click="closeDetailModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Kembali
                                </button>
                            </span>
                    </div>
                </div>
                </div>
            </div>
        </div>
