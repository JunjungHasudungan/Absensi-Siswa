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
            <div class="bg-white px-4 pt-5 pb-2 sm:p-6 sm:pb-4">
              <div class="border">

                    {{-- student name--}}
                    @forelse ($students as $student)
                    <ul class="max-w-md border rounded-lg border-gray-400 mb-2 justify-center item-center  w-full space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                        <li class="px-2 py-2 item-center w-full flex flex-inline">
                            <label for="" class="px-2 py-2 ml-20 m-2 font-semibold flex-inline ">
                                {{ $student->name }}
                            </label>

                            <select

                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400 font-semibold dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" class="item-center justify-center">-- Pilih Absensi --</option>
                                @forelse ($attendances as $key => $attendance)
                                    <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $key }}"> {{ $attendance }} </option>
                                @empty
                                    <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Data Guru Belum Tersedia..</option>
                                @endforelse
                            </select>
                            @if ($attendances === 'izin')
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                            @endif
                        </li>
                    </ul>
                    @empty

                    @endforelse
                    {{-- end input code classroom --}}



            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="#"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Simpan
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                <button wire:click="closeModalCreate()"
                        type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base  text-white leading-6 font-medium text-whiteshadow-sm hover:bg-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Cancel
                </button>
              </span>
              </form>
            </div>

          </div>
        </div>
      </div>


</div>
