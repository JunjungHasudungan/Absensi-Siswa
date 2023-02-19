<div>

    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 w-full">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">


            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="w-full ml-2 mr-2 p-2 m-2 my-2 justify-center py-4 px-4 text-center">
                        <thead class=" bg-white">
                          <tr>
                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                                Nama Pelajaran
                              </th>
                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                              Guru Mata Pelajaran
                            </th>
                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                              Hari
                            </th>
                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                              Start Time
                            </th>
                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                                End Time
                              </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                {{ $name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                {{ $teacher_name }}
                            </td>
                            @forelse ($subject_weekday as $weekday)
                            <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                    {{ $weekday['name'] }}
                            </td>
                            <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                {{-- {{ $weekday->start_time }} --}}
                                10:00
                            </td>
                            <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                12:00
                              </td>
                            @empty
                                <td class="text-sm text-yellow-700 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ __('Belum Tersedia...') }}
                                </td>
                            @endforelse
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              {{-- button --}}

              <div class=" px-4 py-3 item-center justify-center w-full sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="mt-3 flex w-full item-center rounded-md shadow-sm sm:mt-0 sm:w-auto">
                  <button wire:click="closeDetailModal()" type="button" class="item-center inline-flex bg-green-600 justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gren-300 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Kembali
                  </button>
                </span>
                </form>
              </div>

              {{-- / button --}}

            </div>
          </div>
        </div>
      </div>


</div>
