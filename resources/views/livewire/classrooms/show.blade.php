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
                   {{-- Jumlah Siswa --}}
                   <div class="divide-y">
                        <div class="flex items-center  justify-between mb-2 ">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Siswa</h5>
                            <p class="text-sm font-medium text-blue-600 dark:text-white">
                                Jumlah
                            </p>
                        </div>
                        <div class="flow-root divide-y">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-1 min-w-0 px-2">
                                            @forelse ($student_name as $name)
                                                <p class="text-sm text-gray-500 inline truncate dark:text-gray-400">
                                                    {{ $name->name }}
                                                </p>
                                            @empty
                                            <p class="text-sm text-yellow-500 inline truncate ">
                                                {{ __('Siswa Belum tersedia..') }}
                                            </p>
                                            @endforelse
                                        </div>
                                        @if ($student_amount == 0)
                                            <div class="justify-center items-center text-base font-semibold text-gray-900 dark:text-white">
                                                {{ $student_amount }}
                                            </div>
                                        @else
                                        <div class="justify-center items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $student_amount }}
                                        </div>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- end Jumlah Siswa --}}

                    {{-- Mata Pelajaran --}}
                    <div class="divide-y">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Mata Pelajaran</h5>
                            <p class="text-sm font-medium text-blue-600 dark:text-white">
                               Jumlah
                            </p>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0 px-2">
                                            @forelse ($subject_classroom as $subject)
                                                <p class="text-sm font-medium inline-block lowercase text-gray-900 truncate dark:text-white">
                                                    {{ $subject->name }} ,
                                                </p>
                                            @empty
                                                <p class="text-sm font-medium text-yellow-900 truncate dark:text-yellow-400">
                                                    {{ __('Mata Pelajaran Belum tersedia..') }}
                                                </p>
                                            @endforelse
                                        </div>
                                        <div class="justify-center items-center text-base font-semibold text-gray-900 dark:text-white">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $subject_amount }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- end Mata Pelajaran --}}
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





