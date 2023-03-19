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
                <!-- card -->
                 <div class="w-full p-4 bg-white  border border-gray-200 rounded-lg shadow sm:p-8 bg-gray-800 border-gray-700">
                    <!-- subject name -->
                    <div class="divide-y mb-2">
                        <div class="flex items-left mb-2 ">
                            <h6 class="text-medium font-semibold leading-none text-left text-gray-900 dark:text-white">
                                {{ $subject_name }}
                            </h6>
                        </div>
                    </div>
                    <!-- end subject name -->
                     <!-- table -->
                      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                         <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                 <tr>
                                     <th scope="col" class="px-2 py-3">
                                         Hari
                                     </th>
                                     <th scope="col" class="px-1 py-3">
                                         Mulai
                                     </th>
                                     <th scope="col" class="px-4 py-3">
                                         Selesai
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                        Siswa
                                    </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                     <!-- subject name -->
                                    <td scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         <p class="max-w-md space-y-1 tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                             {{ $subject_name }}
                                         </p>
                                    </td>
                                     <!-- end subject name -->
                                     <!-- teaching day -->
                                    <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         <p class="max-w-md space-y-1 text-center tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                             {{ $day }}
                                         </p>
                                    </td>
                                     <!-- end teaching day -->
                                     <!-- start time -->
                                    <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p class="max-w-md space-y-1 text-center tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                            {{ \Carbon\Carbon::parse($start_time)->format('H:i') }}
                                        </p>
                                    </td>
                                     <!-- end start time -->
                                     <!-- end time -->
                                    <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p class="max-w-md space-y-1 text-center tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                            {{ \Carbon\Carbon::parse($end_time)->format('H:i') }}
                                        </p>
                                    </td>
                                    <!-- end time  -->
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     <!-- end table -->
                    <!-- end button -->
                     <div class="divide-y">
                        <div class=" px-4 py-3 item-center justify-center w-full sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="mt-3 flex w-full item-center rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button wire:click="closeModalDetail()"
                                type="button" class="item-center inline-flex bg-green-600 justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gren-300 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                 Kembali
                                 </button>
                             </span>
                         </div>
                     </div>
                    <!-- end button -->
                 </div>
                 <!-- end card -->
            </div>
          </div>
        </div>
    </div>
</div>
