<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 w-full h-full">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-8/12"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline">
            <div class="bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="divide-y">
                        <div class="W-full px-1 py-1 gap-2 flex boder border-gray-900">
                            <p class="text-gray-500 font-semibold">
                                Kelas: {{ $classroom_name ?? 'Kelas Belum Tersedia..'}} | Mapel : {{ $subject_name }}
                            </p>
                        </div>
                    </div>
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
                                                            Hari
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Mulai
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Selesai
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                        <td class="px-4 py-4">
                                                            <ul class="max-w-md space-y-1 flex text-gray-500 list-none list-inside dark:text-gray-400">
                                                                <li>
                                                                    {{ $day }}
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="px-4 py-4">
                                                            <ul class="max-w-md space-y-1 flex text-gray-500 list-none list-inside dark:text-gray-400">
                                                                <li>
                                                                    {{ $start_time }}
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="px-4 py-4">
                                                            <ul class="max-w-md space-y-1 flex text-gray-500 list-none list-inside dark:text-gray-400">
                                                                <li>
                                                                    {{ $end_time }}
                                                                </li>
                                                            </ul>
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
                            <div class="bg-gray-900 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button wire:click="isCloseDetail()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-blue-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-blue-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Kembali
                                </button>
                            </span>
                    </div>
                </div>
                </div>
            </div>
        </div>
