<div>

    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

          <div  class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline">
            <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="">
                {{-- table --}}
                <div class="max-w-6xl mx-auto mb-2">
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
                                                {{ $teacher->name ?? ''}}
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
                                                {{ $subject->name ?? ''}}
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

                                                    @livewire('toggle-switch',[
                                                        'model' => $administration,
                                                        'field' => 'status'
                                                    ])
                                            </td>
                                        </tr>

                                        {{-- comment --}}
                                        <tr class="border-b w-full">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Komentar
                                            </th>
                                            <td class="px-5 py-3 whitespace-nowrap text-sm text-gray-900 bg-gray-400 divide-y divide-gray-200">
                                                <form>
                                                    <label for="chat" class="sr-only">Your message</label>
                                                    <div class="flex items-center px-4 py-2 w-full rounded-lg bg-gray-50 dark:bg-gray-700">
                                                        <textarea   wire:model="description"
                                                                    id="chat" rows="1" class="block text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis Komentar..."></textarea>
                                                            <button type="submit"
                                                                    wire:click.prevent="comment({{ $id_administration }})"
                                                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                            <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        {{-- end comment --}}


                                        {{-- created_at --}}
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-400 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                               Waktu Pembuatan
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap bg-gray-400 text-sm text-gray-700 divide-y divide-gray-200">
                                                {{ $created_at }}
                                            </td>
                                        </tr>
                                        {{-- end created_at --}}
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
