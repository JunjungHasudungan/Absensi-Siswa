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
                                {{__('Data Kelas')}}
                            </h5>
                        </div>
                    </div>
                     {{-- table --}}
                     {{-- subjects --}}
                      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                         <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                 <tr>
                                     <th scope="col" class="px-2 py-3">
                                         Nama
                                     </th>
                                     <th scope="col" class="px-1 py-3">
                                         Guru
                                     </th>
                                     <th scope="col" class="px-4 py-3">
                                         Mapel
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                        Siswa
                                    </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                     {{-- classroom name --}}
                                     <td scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         <p class="max-w-md space-y-1 tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                             {{ $classroom }}
                                         </p>
                                     </td>
                                     {{-- end classroom name --}}
                                     {{-- teacher name --}}
                                     <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         <p class="max-w-md space-y-1 text-left tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                             {{ $teacher->name }}
                                         </p>
                                     </td>
                                     {{-- end teacher name --}}
                                     {{-- subject name --}}
                                     <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         @forelse ($subject_classroom as $subject)
                                         <ul class="max-w-md space-y-1 tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                 {{ $subject->name }}
                                             </li>
                                         </ul>
                                         @empty
                                             <span class="font-bold text-yellow-400">
                                                {{ __('Data Belum ada..')}}
                                            </span>
                                         @endforelse
                                     </td>
                                     {{-- end subject name --}}
                                     {{-- student name --}}
                                     <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @forelse ($student_name as $student)
                                        <ul class="max-w-md space-y-1 tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
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





