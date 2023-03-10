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
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200 w-full dark:text-gray-400">                                                {{-- user name --}}
                                                {{-- subject name --}}
                                                <tr class="border-b">
                                                    <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                        Nama Pelajaran
                                                    </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                            {{ $name }}
                                                        </td>
                                                    </tr>
                                                    {{-- end Subject name --}}
                                                    {{-- Teacher name --}}
                                                    <tr class="border-b">
                                                        <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                            Nama Guru
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                        {{ $teacher_name }}
                                                        </td>
                                                    </tr>
                                                    {{-- end Teacher name --}}

                                                    {{-- classrooms --}}
                                                    <tr class="border-b">
                                                        <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                           Kelas
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm space-x-4 flex flex-inline text-gray-900 bg-gray-400">
                                                          @forelse ($subject_weekday as $classroom)
                                                              <p class="font-sm text-gray-900">
                                                                {{ $classroom->name }},
                                                              </p>
                                                          @empty
                                                              <p class="text-yellow-900 font-bold">
                                                                {{ __('Hari Pembelajaran Belum ada..') }}
                                                              </p>
                                                          @endforelse
                                                        </td>
                                                    </tr>
                                                    {{-- end classroom --}}

                                                    {{-- learning day --}}
                                                    <tr class="border-b">
                                                        <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                            Hari Pembelajaran
                                                        </th>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                              <p class="font-sm text-gray-900">
                                                                {{ $weekday }}
                                                              </p>
                                                            @empty($weekday)
                                                            <p class="font-sm text-gray-900">
                                                                {{ $weekday }}
                                                              </p>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    {{-- end learning day --}}

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








{{-- <div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 w-full h-full">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div> --}}

          <!-- This element is to trick the browser into centering the modal contents. -->
          {{-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true"
                aria-labelledby="modal-headline">

                card
                <div class="w-full p-4 bg-white  border border-gray-200 rounded-lg shadow sm:p-8 bg-gray-800 border-gray-700">
                   mata pelajaran
                   <div class="divide-y">
                    <div class="flex items-center  justify-center mb-2 ">
                        <h5 class="text-xl font-bold leading-none text-center text-gray-900 dark:text-white">
                            {{__('Data Mata Pelajaran')}}
                        </h5>
                    </div>

                    </div>
                    end mata pelajaran

                    table
                    subjects
                     <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Guru
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kelas
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    subject name
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p class="max-w-md space-y-1 tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                            {{ $name }}
                                        </p>
                                    </td>
                                    end subject name
                                    teacher name
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p class="max-w-md space-y-1 tracking-tight text-gray-500 list-disc list-inside dark:text-gray-400">
                                            {{ $teacher_name }}
                                        </p>
                                    </td>
                                    end teacher name
                                    classroom
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
                                    end classroom
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    end subject
                    end table
                   button
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
                   / button

                </div>
                end card
            </div>
          </div>
        </div>
      </div>


</div> --}}





