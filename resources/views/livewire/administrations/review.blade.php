<div>

    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="">
                {{-- table --}}
                <div class="max-w-6xl mx-auto mt-5 mb-2">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full dark:text-gray-400">
                                        {{-- teacher administration --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Nama Guru
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                {{ $teacher->name }}
                                            </td>
                                        </tr>
                                        {{-- end teacher administration --}}

                                        {{-- classroom administration --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Kelas
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                {{ $classroom->name}}
                                            </td>
                                        </tr>
                                        {{-- end classroom administration --}}

                                        {{-- administration subject name --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Mata Pelajaran
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-gray-700 bg-white bg-gray-400 divide-y divide-gray-200">
                                                {{ $subject->name }}
                                            </td>
                                        </tr>
                                        {{-- end administration subject name --}}

                                        {{-- administration title subject name --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Materi
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap bg-gray-400 text-sm text-gray-700 divide-y divide-gray-200">
                                                {{ $title }}
                                            </td>
                                        </tr>
                                        {{-- end administration title subject name --}}

                                        {{-- method_learing --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Metode Pelajaran
                                            </th>
                                            @if ($method_learning == 1)
                                            <td class="px-6 py-4 whitespace-nowrap bg-gray-400 text-sm text-blue-700 divide-y divide-gray-200">
                                                {{ __('Teori') }}
                                            </td>
                                            @endif
                                            @if ($method_learning == 2)
                                            <td class="px-6 py-4 whitespace-nowrap bg-gray-400 text-sm text-green-700 divide-y divide-gray-200">
                                                {{ __('Praktek') }}
                                            </td>
                                            @endif
                                            @if ($method_learning == 3)
                                            <td class="px-6 py-4 whitespace-nowrap bg-gray-400 text-sm text-yellow-700 divide-y divide-gray-200">
                                                {{ __('Penugasan') }}
                                            </td>
                                            @endif
                                        </tr>
                                        {{-- end method_learing --}}

                                        {{-- completeness --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Ketuntasan
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                @if ($completeness === 1)
                                                    <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-emerald-600 bg-yellow-200 capitalize last:mr-0 mr-1">
                                                        {{ __('Tuntas')}}
                                                    </span>
                                                @else
                                                    <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-blueGray-600 bg-emerald-200 capitalize last:mr-0 mr-1">
                                                        {{ __('Bersambung') }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- end completeness --}}

                                        {{-- status check --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Check Status
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                Masih dalam perbaikan
                                            </td>
                                        </tr>
                                        {{-- end status check --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Tanggal
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                {{ date('l, d F Y', strtotime( $created_at )) }}
                                            </td>
                                        </tr>


                                        {{-- @if ( $teacherAdministration->method === 3 )
                                            <tr class="border-b">
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                    Keterangan Materi Penugasan
                                                </th>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                                    {{ $teacherAdministration->description ?? ''}}
                                                </td>
                                            </tr>
                                        @endif --}}


                                        {{-- <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap mt-2 text-sm text-gray-900 bg-white divide-y divide-gray-200">

                                                @livewire('toggle-switch',[
                                                    'model'     => $teacherAdministration,
                                                    'field'     => 'statusCheck',
                                                ])
                                            </td>
                                        </tr> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- end table --}}
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="#" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Update
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                <button wire:click="closeModalReview()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Kembali
                </button>
              </span>
              </form>
            </div>

          </div>
        </div>
      </div>


</div>
