<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 w-full h-full">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true"
                aria-labelledby="modal-headline">

                {{-- card --}}
                <div class="w-full p-4 bg-white  border border-gray-200 rounded-lg shadow sm:p-8 bg-gray-800 border-gray-700">
                   {{-- guru mata pelajaran --}}
                   <div class="divide-y">
                        <div class="flex items-center  justify-between mb-2 ">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Guru Mata Pelajaran</h5>
                            <p class="text-sm font-medium text-blue-600 dark:text-white">
                                Jumlah Kelas
                            </p>
                        </div>
                        <div class="flow-root divide-y">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-1 min-w-0 px-2">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $teacher_name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $name }}
                                            </p>
                                        </div>
                                        <div class="justify-center items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $classroom_amount ?? 'Kelas Belum Tersedia..'}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- end guru mata pelajaran --}}

                    {{-- Kelas --}}
                    <div class="divide-y">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Kelas</h5>
                        <p class="text-sm font-medium text-blue-600 dark:text-white">
                            Jam Pelajaran
                        </p>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0 px-2">
                                        @forelse ($classroom_subject as $classroom)
                                            <p class="text-sm font-medium lowercase text-gray-900 truncate dark:text-white">
                                                {{ $classroom['name'] }}
                                            </p>
                                        @empty
                                            <p class="text-sm font-medium text-yellow-900 truncate dark:text-yellow-400">
                                                {{ __('Data Kelas Belum tersedia..') }}
                                            </p>
                                        @endforelse
                                    </div>
                                    <div class="justify-center items-center text-base font-semibold text-gray-900 dark:text-white">
                                        @if ($classroom_amount == 0)
                                            <p class="text-sm font-bold text-yellow-900 truncate dark:text-yellow-400">
                                                {{__('Data Jam Pelajaran Belum Tersedia..')}}
                                            </p>
                                        @else
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                10:00 - 11:00
                                            </p>
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                11:00 - 12:00
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                    {{-- end Kelas --}}

                   {{-- button --}}
                    <div class="divide-y">
                       <div class=" px-4 py-3 item-center justify-center w-full sm:px-6 sm:flex sm:flex-row-reverse">
                           <span class="mt-3 flex w-full item-center rounded-md shadow-sm sm:mt-0 sm:w-auto">
                               <button wire:click="closeDetailModal()"
                               type="button" class="item-center inline-flex bg-green-600 justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gren-300 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Kembali
                                </button>
                            </span>
                        </div>
                    </div>
                   {{-- / button --}}

                </div>
                {{-- end card --}}








            </div>
          </div>
        </div>
      </div>


</div>





