<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 w-full h-full">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-8/12"
                role="dialog" aria-modal="true"
                aria-labelledby="modal-headline">
                 {{-- card --}}
                 <div class="w-full p-4 bg-white  border border-gray-200 rounded-lg shadow sm:p-8 bg-gray-800 border-gray-700">
                    {{-- mata pelajaran --}}
                    <div class="divide-y">
                        <div class="W-full px-1 py-1 gap-2 flex boder border-gray-900">
                            <p class="text-gray-500 font-semibold">
                                Kelas :  {{ $classroom_name }} | Wali Kelas: {{ $teacher }}
                            </p>
                        </div>
                    </div>
                     {{-- table --}}
                     {{-- subjects --}}
                      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                         <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                 <tr>
                                     <th scope="col" class="px-4 py-3">
                                         Mata Pelajaran
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                        Siswa
                                    </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                     <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         @forelse ($classroom->subjects as $subject)
                                         <ul class="w-full px-6 hover:bg-gray-400 py-2 hover:text-white list-none max-w-md space-y-1 tracking-tight text-gray-500 list-inside dark:text-gray-400">
                                            <li class="">
                                                 {{ $subject->name }}
                                             </li>
                                         </ul>
                                         @empty
                                             <span class="font-bold px-2 py-2 text-yellow-400">
                                                {{ __('Data Belum ada..')}}
                                            </span>
                                         @endforelse
                                     </td>
                                     {{-- end subject name --}}
                                     {{-- student name --}}
                                     <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @forelse ($classroom->students as $student)
                                        <ul class="w-full hover:bg-gray-400 hover:text-white px-6 py-2 list-none max-w-md space-y-1 tracking-tight text-gray-500 list-inside dark:text-gray-400">
                                           <li>
                                                {{ $student->name }}
                                            </li>
                                        </ul>
                                        @empty
                                            <span class="font-bold text-yellow-400">
                                                {{ __('Data Belum ada..')}}
                                            </span>
                                        @endforelse
                                    </td>
                                    {{-- end student name --}}
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     {{-- end subject --}}
                     {{-- end table --}}
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





