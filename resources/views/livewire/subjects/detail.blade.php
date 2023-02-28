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
                   {{-- mata pelajaran --}}
                   <div class="divide-y">
                    <div class="flex items-center  justify-center mb-2 ">
                        <h5 class="text-xl font-bold leading-none text-center text-gray-900 dark:text-white">
                            {{__('Data Mata Pelajaran')}}
                        </h5>
                    </div>
                        <div class="flow-root divide-y">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-3 sm:py-4">
                                    {{-- nama --}}
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-1 min-w-0 px-2">
                                            <p class="text-sm font-bold text-gray-900 truncate dark:text-white">
                                                Nama
                                            </p>
                                        </div>
                                            <div class="justify-center items-left text-base font-medium text-gray-900 dark:text-white">
                                                {{ $name }}
                                            </div>
                                    </div>
                                    {{-- end nama --}}
                                    {{-- kelas --}}
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-1 min-w-0 px-2">
                                            <p class="text-sm font-bold text-gray-900 truncate dark:text-white">
                                                Guru
                                            </p>
                                        </div>

                                        <div class="justify-center items-left text-base font-medium text-gray-900 dark:text-white">
                                            {{ $teacher_name }}
                                        </div>
                                    </div>
                                    {{-- end kelas --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- end mata pelajaran --}}
                    {{-- Kelas --}}
                   <div class="divide-y">
                    <div class="flex items-center  justify-center mb-2 ">
                        <h5 class="text-xl font-bold leading-none text-center text-gray-900 dark:text-white">
                            {{__('Data Kelas')}}
                        </h5>
                    </div>
                        {{-- table --}}
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Kelas
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @forelse ($classroom_subject as $classroom)
                                            <ul class="max-w-md space-y-1 tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                               <li>
                                                    {{ $classroom->name }}
                                                </li>
                                            </ul>
                                            @empty
                                            <span class="font-bold text-yellow-400">{{ __('Data Kelas Belum dipilih..')}} </span>
                                            @endforelse
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- end table --}}
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





